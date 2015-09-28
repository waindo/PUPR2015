<?php
/*
|--------------------------------------------------------------------------
| Controller Sungai
|--------------------------------------------------------------------------
| Sesuaikan nama class dengan nama file 
*/
class SungaiController extends \BaseController {

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

	$daftar =DB::table('dasxxx as a')	 
	    ->select('b.id','a.dasxxxkodedas','a.dasxxxnamadas','b.sungaikodesng','b.sungainamasng')   
        ->Join('sungai as b', 'a.dasxxxkodedas', '=', 'b.sungaikodedas')
        ->paginate(5);

		# Tetukan Judul
		$judul = 'Selamat Datang, ' . Auth::user()->usersxusernam;

		# Tampilkan View Beranda Sungai
		return View::make('sungai.index', compact('daftar', 'judul'));
	}

	/*
	|--------------------------------------------------------------------------
	| Form Buat Sungai Baru | GET | localhost/pupr15/sungai/buat
	|-------------------------------------------------------------------------- */
	public function buat() {
	
	$daftar = DB::table('dasxxx as a')
     	->select('a.*')
	    ->orderBy('a.id', 'ASC')	     
	    ->get();

		//load data to dropdown
		$kddas = array('' => '');
		foreach($daftar as $row)
			$kddas[$row->dasxxxkodedas] = $row->dasxxxnamadas;

		# Tentukan Judul
		$judul = 'Tambah Data Sungai';
		
		# Langsung tampilkan view
		return View::make('sungai.tambah', compact('kddas'));

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan Sungai Baru | POST | localhost/pupr15/sungai
	|-------------------------------------------------------------------------- */
	public function postBuat() {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan  wajib diisi
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

			# Kembali kehalaman dengan masing-masing pesan error
			return Redirect::back()->withErrors($v)->withInput();

		# Bila sukses, simpan data dalam database
		Sungai::create(array(
			'sungaikodedas' 	=> Input::get('sungaikodedas'),
			'sungaikodesng' 	=> Input::get('sungaikodesng'),
			'sungainamasng'		=> Input::get('sungainamasng')
		));

		# Setelah disimpan kembali kehalaman beranda dengan pesan sukses
		return Redirect::route('beranda')->withPesan('Istilah baru berhasil ditambahkan.');

	}

	/*
	|--------------------------------------------------------------------------
	| Form Ubah Informasi Sungai | GET | localhost/assets/sungai/{id}/ubah
	|-------------------------------------------------------------------------- */
	public function ubah($id) {
		

	$daftar = DB::table('dasxxx as a')
     	->select('a.*')
	    ->orderBy('a.id', 'ASC')	     
	    ->get();

		//load data to dropdown
		$kddas = array('' => '');
		foreach($daftar as $row)
			$kddas[$row->dasxxxkodedas] = $row->dasxxxnamadas;

		# Temukan id sungai yang dimaksud
		$sungai = Sungai::find($id);

		# Tentukan judul
		$judul = 'Ubah Informasi Sungai';

		# Kirim isi variabel bersama view
		return View::make('sungai.ubah', compact('sungai', 'kddas'));

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
	| Proses Hapus Data Sungai | DELETE | localhost/pupr15/assets/sungai/cari/sungai
	|-------------------------------------------------------------------------- */
	public function cari() {

		# Ambil nilai inputan dari form
		$keyword = Input::get('cari');

		# Buatkan daftar yang sama persis dengan kata kunci
		$cari =DB::table('dasxxx as a')	 
	    ->select('b.id','a.dasxxxkodedas','a.dasxxxnamadas','b.sungaikodesng','b.sungainamasng')   
        ->Join('sungai as b', 'a.dasxxxkodedas', '=', 'b.sungaikodedas')
        ->where('sungaikodedas', $keyword)->orWhere('sungaikodesng', $keyword)->orWhere('sungainamasng', $keyword)->get();

		//$cari = Sungai::where('sungaikodedas', $keyword)->orWhere('sungaikodesng', $keyword)->orWhere('sungainamasng', $keyword)->get();

        $daftar =DB::table('dasxxx as a')	 
	    ->select('b.id','a.dasxxxkodedas','a.dasxxxnamadas','b.sungaikodesng','b.sungainamasng')   
        ->Join('sungai as b', 'a.dasxxxkodedas', '=', 'b.sungaikodedas')
        ->where('sungaikodedas', 'LIKE', "%$keyword%")->orWhere('sungaikodesng', 'LIKE', "%$keyword%")->orWhere('sungainamasng', 'LIKE', "%$keyword%")->get();
		
		# Buatkan daftar yang mendekati dengan kata kunci yang dicari
		#$daftar = Sungai::where('sungaikodedas', 'LIKE', "%$keyword%")->orWhere('sungaikodesng', 'LIKE', "%$keyword%")->orWhere('sungainamasng', 'LIKE', "%$keyword%")->get();

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
