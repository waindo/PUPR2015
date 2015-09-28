<?php
/*
|--------------------------------------------------------------------------
| Controller Sungai
|--------------------------------------------------------------------------
| Sesuaikan nama class dengan nama file 
*/
class WsController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| Koleksi Filter Controller
	|-------------------------------------------------------------------------- */
	public function __construct() {

		# Filter Auth keseluruh method. Baca 'filters.php' baris 22
		$this->beforeFilter('auth');

	}
	/*
	|--------------------------------------------------------------------------
	| Halaman Index | GET | localhost/pupr/sungai/
	|-------------------------------------------------------------------------- */
	public function index()
	{
		
	  $daftar= DB::table('dasxxx as d')
		->select('w.id','w.wilsngkodewsx', 'w.wilsngnamawsx', 'w.wilsngpulauxx' ,'w.wilsngkategri', 'd.dasxxxnamadas', 's.sungainamasng')
		->leftjoin ('wilsng as w', 'w.wilsngkodewsx','=','d.dasxxxkodewsx')
		->join ('sungai as s', 's.sungaikodedas','=','d.dasxxxkodedas')
		->orderBy('w.id', 'ASC')						     
	    ->paginate(5);
	    
	    //DB::raw('count(*) as user_count, status')
	    $jml= DB::table('dasxxx as d')
		->select(DB::raw('count(*) as jmlcount','w.wilsngkodewsx', 'w.wilsngnamawsx', 'w.wilsngpulauxx' , 'w.wilsngkategri', 'd.dasxxxnamadas', 's.sungainamasng'))
		->leftjoin ('wilsng as w', 'w.wilsngkodewsx','=','d.dasxxxkodewsx')
		->join ('sungai as s', 's.sungaikodedas','=','d.dasxxxkodedas')
		->groupBy('w.wilsngkodewsx', 'w.wilsngnamawsx','w.wilsngkategri','d.dasxxxnamadas','s.sungainamasng')					     
	    ->first();

		# Tetukan Judul
		$judul = 'Selamat Datang, ' . Auth::user()->usersxusernam;
	    //return dd($jml);
		# Tampilkan View Beranda Sungai
		return View::make('ws.index', compact('daftar', 'jml','judul'));
	}

	/*
	|--------------------------------------------------------------------------
	| Form Buat Sungai Baru | GET | localhost/pupr15/sungai/buat
	|-------------------------------------------------------------------------- */
	public function buat() {

	//Pulau
	$pul = DB::table('codesx as a')
     	->select('a.codesxdesc1xx')
	    ->where('a.codesxstatusx', '=', 1)	
	    ->where('a.codesxheadxxx', '=', 5)  
	    ->orderBy('a.id', 'ASC')	     
	    ->get();

		//load data to dropdown
		$pulau = array('' => '');
		foreach($pul as $row)
			$pulau[$row->codesxdesc1xx] = $row->codesxdesc1xx;

	//Kategori
  	$daftar = DB::table('codesx as a')
     	->select('a.codesxdesc1xx')
	    ->where('a.codesxstatusx', '=', 1)	
	    ->where('a.codesxheadxxx', '=', 6)  
	    ->orderBy('a.id', 'ASC')	     
	    ->get();

		//load data to dropdown
		$kategori = array('' => '');
		foreach($daftar as $row)
			$kategori[$row->codesxdesc1xx] = $row->codesxdesc1xx;

		//Provinsi
  	$prov = DB::table('codesx as a')
     	->select('a.codesxdesc1xx')
	    ->where('a.codesxstatusx', '=', 1)	
	    ->where('a.codesxheadxxx', '=', 4)  
	    ->orderBy('a.id', 'ASC')	     
	    ->get();

		//load data to dropdown
		$provinsi = array('' => '');
		foreach($prov as $row)
			$provinsi[$row->codesxdesc1xx] = $row->codesxdesc1xx;
	
    // Tampil Data Provinsi
	$prov = DB::table('wlsdtl as a')
     	->select('a.*')
	    ->orderBy('a.id', 'ASC')	     
	    ->get();

        return View::make('ws.tambah', array(
			'kategori' => $kategori, 'pulau' => $pulau,  'provinsi' => $provinsi, 'prov' => $prov
		));

	}
	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan ws Baru | POST | localhost/pupr15/ws
	|-------------------------------------------------------------------------- */
	public function postBuat() {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan  wajib diisi
		$aturan = array(
			'wilsngkodewsx'	=> 'required', 
			'wilsngpulauxx'	=> 'required', 
			'wilsngnamawsx'	=> 'required',
			'wilsngkategri'	=> 'required'
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(
			'wilsngkodewsx.required'	=> 'Kode Ws masih kosong.',
			'wilsngpulauxx.required'	=> 'Pulau masih kosong.',
			'wilsngnamawsx.required'	=> 'Nama Ws masih kosong.',
			'wilsngkategri.required'	=> 'Lintas masih kosong.'
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman dengan masing-masing pesan error
			return Redirect::back()->withErrors($v)->withInput();

		# Bila sukses, simpan data dalam database
		Ws::create(array(
			'wilsngkodewsx' 	=> Input::get('wilsngkodewsx'),
			'wilsngpulauxx' 	=> Input::get('wilsngpulauxx'),
			'wilsngnamawsx'		=> Input::get('wilsngnamawsx'),
			'wilsngkategri'		=> Input::get('wilsngkategri')
		));

		# Setelah disimpan kembali kehalaman beranda dengan pesan sukses
		return Redirect::route('berandaws')->withPesan('Istilah baru berhasil ditambahkan.');

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan Provinsi Baru | POST | localhost/pupr15/ws
	|-------------------------------------------------------------------------- */
	public function postBuatProv() {
		
		// # Simpan semua inputan kedalam variabel input
		 $input = Input::all();

		// # Aturan Validasi dengan syarat :
		// # - Inputan  wajib diisi
		$aturan = array(
			'wlsdtlkodewsx'	=> 'required',
			'wlsdtlkodprov'	=> 'required'
		);

		// # Keterangan validasi untuk setiap syarat
		$keterangan = array(
			'wlsdtlkodewsx.required'	=> 'Kode WS masih kosong.',
			'wlsdtlkodprov.required'	=> 'Provinsi masih kosong.'
		);

		// # Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		 $v = Validator::make($input, $aturan, $keterangan);

		// # Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman dengan masing-masing pesan error
			return Redirect::back()->withErrors($v)->withInput();
		
		// sukses, simpan data dalam database

		$seq = DB::table('wlsdtl')->count()+1;

		Wsdtl::create(array(
			'wlsdtlkodewsx' 	=> Input::get('wlsdtlkodewsx'),
			'wlsdtlkodprov' 	=> Input::get('wlsdtlkodprov'),
			'wlsdtlseqxxxx'		=> $seq
		));

		# Setelah disimpan kembali kehalaman beranda dengan pesan sukses
		return Redirect::back();		

	}

	/*
	|--------------------------------------------------------------------------
	| Form Ubah Informasi Sungai | GET | localhost/assets/sungai/{id}/ubah
	|-------------------------------------------------------------------------- */
	public function ubah($id) {
		
		# Temukan id sungai yang dimaksud
		$sungai = Sungai::find($id);

		# Tentukan judul
		$judul = 'Ubah Informasi Sungai';

		# Kirim isi variabel bersama view
		return View::make('sungai.ubah', compact('sungai', 'judul'));

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Ubah Informasi Sungai | POST | localhost/pupr15/assets/assets/sungai/{id}
	|-------------------------------------------------------------------------- */
	public function postUbah($id) {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan wajib diisi
		$aturan = array(
			'sungaikodedas'	=> 'required', 
			'sungaikodesng'	=> 'required', 
			'sungainamasng'	=> 'required'
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(
			'sungaikodedas.required'	=> 'Kode Das masih kosong.',
			'sungaikodesng.required'	=> 'Kode Sungai masih kosong.',
			'sungainamadas.required'	=> 'Nama Sungai masih kosong.'
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v)->withInput();

		# Temukan ID Sungai yang ingin diubah
		$temp =  Sungai::find($id);

		# Lakukan perubahan berdasarkan field
		$temp-> sungaikodedas 	= Input::get('sungaikodedas');
		$temp-> sungaikodesng   = Input::get('sungaikodesng');
		$temp-> sungainamasng   = Input::get('sungainamasng');
	

		# Simpan perubahan
		$temp->save();

		# Kembali kehalaman beranda admin dengan pesan sukses
		return Redirect::route('beranda')->withPesan('Salah satu data kamus berhasil diubah.');
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data Sungai | DELETE | localhost/pupr15/assets/sungai/{id}/hapus
	|-------------------------------------------------------------------------- */
	public function hapus($id) {
		
		# Hapus berdasarkan id
		$hapus = Sungai::destroy($id);

		# Kembali kehalaman index dengan pesan sukses
		return Redirect::route('beranda')->withPesan('Data Kamus berhasil dihapus.');

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data Sungai | DELETE | localhost/pupr15/assets/sungai/{id}/hapus
	|-------------------------------------------------------------------------- */
	public function hapusProv($id) {
		
		# Hapus berdasarkan id
		$hapus = Wsdtl::destroy($id);

		# Kembali kehalaman index dengan pesan sukses
		return Redirect::route('buatws')->withPesan('Data Kamus berhasil dihapus.');

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data Sungai | DELETE | localhost/pupr15/assets/sungai/cari/sungai
	|-------------------------------------------------------------------------- */
	public function cari() {

		# Ambil nilai inputan dari form
		$keyword = Input::get('cari');

		# Buatkan daftar yang sama persis dengan kata kunci
		$cari = Sungai::where('sungaikodedas', $keyword)->orWhere('sungaikodesng', $keyword)->orWhere('sungainamasng', $keyword)->get();

		# Buatkan daftar yang mendekati dengan kata kunci yang dicari
		$daftar = Sungai::where('sungaikodedas', 'LIKE', "%$keyword%")->orWhere('sungaikodesng', 'LIKE', "%$keyword%")->orWhere('sungainamasng', 'LIKE', "%$keyword%")->get();

		# Buat judul pencarian
		$judul = 'Hasil Pencarian "'. $keyword . '"';

		# Tampilkan halaman pencarian
		return View::make('sungai.cari', compact('judul', 'daftar', 'cari'));

	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Index Sorting Daftar | GET | localhost/assets/
	|-------------------------------------------------------------------------- */
	public function urut($jenis) {

		# Jika jenis yang diterima adalah sungaikodedas
		if($jenis === 'sungaikodedas') {

			# Tarik semua data kamus dan urutkan sesuai abjat banjar
			$daftar = Sungai::orderBy('sungaikodedas', 'ASC')->paginate(5);

		# Jika jenis yang diterima indonesia
		} elseif($jenis === 'sungaikodesng') {

			# Tarik semua data kamus dan urutkan sesuai abjat indonesia
			$daftar = Sungai::orderBy('sungaikodesng', 'ASC')->paginate(5);

		# Jika jenis yang diterima indonesia
		} elseif($jenis === 'sungainamasng') {

			# Tarik semua data kamus dan urutkan sesuai abjat indonesia
			$daftar = Sungai::orderBy('sungainamasng', 'ASC')->paginate(5);

		# Selain kedua jenis diatas
		} else {

			# Buat judul error
			$judul = '';

			# Tampilkan halaman error
			return Response::view('404', compact('judul'));

		}

		# Tentukan Judul
		$judul = 'Selamat Datang, ' . Auth::user()->usersxusernam;

		# Tampilkan View Beranda Admin
		return View::make('sungai.index', compact('daftar', 'judul'));

	}


}
