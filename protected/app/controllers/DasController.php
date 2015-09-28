<?php
/*
|--------------------------------------------------------------------------
| Controller Das
|--------------------------------------------------------------------------
| Sesuaikan nama class dengan nama file 
*/
class DasController extends \BaseController {
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
	| Halaman Index | GET | localhost/admin/das/
	|-------------------------------------------------------------------------- */
	public function index()
	{

	$daftar =DB::table('wilsng as a')
	    ->select('b.id','b.dasxxxkodedas','b.dasxxxnamadas','a.wilsngkodewsx','a.wilsngnamawsx')
        ->Join('dasxxx as b', 'a.wilsngkodewsx', '=', 'b.dasxxxkodewsx')
        ->paginate(5);

		# Tetukan Judul
		$judul = 'Selamat Datang, ' . Auth::user()->usersxusernam;

		# Tampilkan View Beranda Das
		return View::make('das.index', compact('daftar', 'judul'));
		#return dd($daftar);
	}


	/*
	|--------------------------------------------------------------------------
	| Form Buat Das Baru | GET | localhost/pupr15/Das/buat
	|-------------------------------------------------------------------------- */
	public function buat() {

  	$daftar = DB::table('wilsng as a')
     	->select('a.*')
	    ->orderBy('a.id', 'ASC')	     
	    ->get();

		//load data to dropdown
		$kdws = array('' => '');
		foreach($daftar as $row)
			$kdws[$row->wilsngkodewsx] = $row->wilsngnamawsx;
		
        return View::make('das.tambah', array(
			'kdws' => $kdws
		));	

	}

	
	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan Das Baru | POST | localhost/pupr15/das
	|-------------------------------------------------------------------------- */
	public function postBuat() {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan  wajib diisi
		$aturan = array(
			'dasxxxkodewsx'	=> 'required', 
			'dasxxxkodedas'	=> 'required', 
			'dasxxxnamadas'	=> 'required'
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(
			'dasxxxkodewsx.required'	=> 'Kode Ws masih kosong.',
			'dasxxxkodedas.required'	=> 'Kode Das masih kosong.',
			'dasxxxnamadas.required'	=> 'Nama Das masih kosong.'
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman dengan masing-masing pesan error
			return Redirect::back()->withErrors($v)->withInput();

		# Bila sukses, simpan data dalam database
		Das::create(array(
			'dasxxxkodewsx' 	=> Input::get('dasxxxkodewsx'),
			'dasxxxkodedas' 	=> Input::get('dasxxxkodedas'),
			'dasxxxnamadas'		=> Input::get('dasxxxnamadas')
		));

		# Setelah disimpan kembali kehalaman beranda dengan pesan sukses
		return Redirect::route('berandadas')->withPesan('Data baru berhasil ditambahkan.');

	}
	/*
	|--------------------------------------------------------------------------
	| Form Ubah Informasi Das | GET | localhost/pupr15/das/{id}/ubah
	|-------------------------------------------------------------------------- */
	public function ubah($id) {
		 

		$daftar = DB::table('wilsng as a')
     	->select('a.*')
	    ->orderBy('a.id', 'ASC')	     
	    ->get();

		//load data to dropdown
		$kdws = array('' => '');
		foreach($daftar as $row)
			$kdws[$row->wilsngkodewsx] = $row->wilsngnamawsx;

		# Temukan id sungai yang dimaksud
		$das = Das::find($id);

		# Tentukan judul
		$judul = 'Ubah Informasi Das';

		# Kirim isi variabel bersama view
		//return View::make('das.ubah', compact('das'));
		return View::make('das.ubah', compact('das', 'kdws'));

	}
	/*
	|--------------------------------------------------------------------------
	| Proses Ubah Informasi Das | POST | localhost/pupr15/das/{id}
	|-------------------------------------------------------------------------- */
	public function postUbah($id) {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan wajib diisi
		$aturan = array(
			'dasxxxkodewsx'	=> 'required', 
			'dasxxxkodedas'	=> 'required', 
			'dasxxxnamadas'	=> 'required'
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(
			'dasxxxkodewsx.required'	=> 'Kode Ws masih kosong.',
			'dasxxxkodedas.required'	=> 'Kode Das masih kosong.',
			'dasxxxnamadas.required'	=> 'Nama Das masih kosong.'
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v)->withInput();

		# Temukan ID Das yang ingin diubah
		$temp =  Das::find($id);

		# Lakukan perubahan berdasarkan field
		$temp-> dasxxxkodewsx 	= Input::get('dasxxxkodewsx');
		$temp-> dasxxxkodedas   = Input::get('dasxxxkodedas');
		$temp-> dasxxxnamadas   = Input::get('dasxxxnamadas');
	
		# Simpan perubahan
		$temp->save();

		# Kembali kehalaman beranda admin dengan pesan sukses
		return Redirect::route('berandadas')->withPesan('Salah satu data Das berhasil diubah.');
	}
	/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data Das | DELETE | localhost/pupr15/das/{id}/hapus
	|-------------------------------------------------------------------------- */
	public function hapus($id) {
		
		# Hapus berdasarkan id
		$hapus = Das::destroy($id);

		# Kembali kehalaman index dengan pesan sukses
		return Redirect::route('berandadas')->withPesan('Data Kamus berhasil dihapus.');

	}
	/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data Das | DELETE | localhost/pupr15/das/cari/das
	|-------------------------------------------------------------------------- */
	public function cari() {

		# Ambil nilai inputan dari form
		$keyword = Input::get('cari');

		# Buatkan daftar yang sama persis dengan kata kunci
		$cari = Das::where('dasxxxkodewsx', $keyword)->orWhere('dasxxxkodedas', $keyword)->orWhere('dasxxxnamadas', $keyword)->get();

		# Buatkan daftar yang mendekati dengan kata kunci yang dicari
		$daftar = Das::where('dasxxxkodewsx', 'LIKE', "%$keyword%")->orWhere('dasxxxkodedas', 'LIKE', "%$keyword%")->orWhere('dasxxxnamadas', 'LIKE', "%$keyword%")->get();

		# Buat judul pencarian
		$judul = 'Hasil Pencarian "'. $keyword . '"';

		# Tampilkan halaman pencarian
		return View::make('das.cari', compact('judul', 'daftar', 'cari'));

	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Index Sorting Daftar | GET | localhost/das/
	|-------------------------------------------------------------------------- */
	public function urut($jenis) {

		# Jika jenis yang diterima adalah dasxxxkodewsx
		if($jenis === 'dasxxxkodewsx') {

			# Tarik semua data kamus dan urutkan sesuai abjat banjar
			$daftar = Das::orderBy('dasxxxkodewsx', 'ASC')->paginate(5);

		# Jika jenis yang diterima indonesia
		} elseif($jenis === 'dasxxxkodedas') {

			# Tarik semua data kamus dan urutkan sesuai abjat indonesia
			$daftar = Das::orderBy('dasxxxkodedas', 'ASC')->paginate(5);

		# Jika jenis yang diterima indonesia
		} elseif($jenis === 'dasxxxnamadas') {

			# Tarik semua data kamus dan urutkan sesuai abjat indonesia
			$daftar = Das::orderBy('dasxxxnamadas', 'ASC')->paginate(5);

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
		return View::make('das.index', compact('daftar', 'judul'));

	}
	

}
