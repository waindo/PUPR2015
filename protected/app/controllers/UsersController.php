<?php
/*
|--------------------------------------------------------------------------
| Controller User
|--------------------------------------------------------------------------
| Sesuaikan nama class dengan nama file 
*/
class UsersController extends \BaseController {
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
	| Halaman Index | GET | localhost/pupr/User/
	|-------------------------------------------------------------------------- */
	public function index()
	{
		# Ambil semua data users yang ada
		$daftar = User::orderBy('created_at', 'DESC')->paginate(5);

		# Tetukan Judul
		$judul = 'Selamat Datang, ' . Auth::user()->usersxusernam;

		# Tampilkan View Beranda users
		return View::make('user.index', compact('daftar', 'judul'));
	}

	/*
	|--------------------------------------------------------------------------
	| Form Buat users Baru | GET | localhost/pupr15/users/buat
	|-------------------------------------------------------------------------- */
	public function buat() {

		# Tentukan Judul
		$judul = 'Tambah Data users';
		
		# Langsung tampilkan view
		return View::make('user.tambah', compact('judul'));

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan users Baru | POST | localhost/pupr15/users
	|-------------------------------------------------------------------------- */
	public function postBuat() {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan  wajib diisi
		$aturan = array(
			'usersxusersid'	=> 'required', 
			'usersxusersxx'	=> 'required'			
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(
			'usersxusersid.required'	=> 'users ID masih kosong.',
			'usersxusersxx.required'	=> 'users masih kosong.',			
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman dengan masing-masing pesan error
			return Redirect::back()->withErrors($v)->withInput();

		# Bila sukses, simpan data dalam database
		users::create(array(
			'usersxusersid' 	=> Input::get('usersxusersid'),
			'usersxusersxx' 	=> Input::get('usersxusersxx')
		));

		# Setelah disimpan kembali kehalaman beranda dengan pesan sukses
		return Redirect::route('berandausers')->withPesan('users baru berhasil ditambahkan.');

	}

	/*
	|--------------------------------------------------------------------------
	| Form Ubah Informasi users | GET | localhost/pupr15/users/{id}/ubah
	|-------------------------------------------------------------------------- */
	public function ubah($id) {
		
		# Temukan id users yang dimaksud
		$user = User::find($id);

		

		# Tentukan judul
		$judul = 'Ubah Informasi users';

		# Kirim isi variabel bersama view
		return View::make('user.ubah', compact('user', 'judul'));

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Ubah Informasi users | POST | localhost/pupr15/users/{id}
	|-------------------------------------------------------------------------- */
	public function postUbah($id) {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan wajib diisi
		$aturan = array(
		    'usersxuseridx'       => 'required',
			'usersxusernam'       => 'required',
			'passwordv'           => 'required',
			'usersxemailxx'       => 'required|email',	
			'usersxlevelxx'       => 'required'							
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(
			'usersxusersid.required'	=> 'users ID   masih kosong.',
			'usersxusersxx.required'	=> 'User Name  masih kosong.',
			'passwordv.required'	    => 'Password   masih kosong.',
			'usersxemailxx.required'	=> 'Email      masih kosong.',
			'usersxlevelxx.required'	=> 'Level      masih kosong.'
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails()){

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v)->withInput();
		} else {
			# Temukan ID users yang ingin diubah
			$temp =  User::find($id);

			# Lakukan perubahan berdasarkan field
			$temp-> usersxuseridx 	= Input::get('usersxuseridx');
			$temp-> usersxusernam   = Input::get('usersxusernam');
			$temp-> password    	= Hash::make(Input::get('passwordv'));
			$temp-> usersxemailxx   = Input::get('usersxemailxx');
			$temp-> usersxlevelxx 	= Input::get('usersxlevelxx');		

			# Simpan perubahan
			$temp->save();

			return Redirect::to('user');  
			# Kembali kehalaman beranda admin dengan pesan sukses
			#return Redirect::route('berandauser')->withPesan('Salah satu data users berhasil diubah.');
		}
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data users | DELETE | localhost/pupr15/users/{id}/hapus
	|-------------------------------------------------------------------------- */
	public function hapus($id) {
		
		# Hapus berdasarkan id
		$hapus = User::destroy($id);

		# Kembali kehalaman index dengan pesan sukses
		return Redirect::route('berandauser')->withPesan('Data users berhasil dihapus.');

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data users | DELETE | localhost/pupr15/users/cari/users
	|-------------------------------------------------------------------------- */
	public function cari() {

		# Ambil nilai inputan dari form
		$keyword = Input::get('cari');

		# Buatkan daftar yang sama persis dengan kata kunci
		$cari = User::where('usersxuseridx', $keyword)->orWhere('usersxusernam', $keyword)->orWhere('usersxemailxx', $keyword)->orWhere('usersxlevelxx', $keyword)->get();

		# Buatkan daftar yang mendekati dengan kata kunci yang dicari
		$daftar = User::where('usersxuseridx', 'LIKE', "%$keyword%")->orWhere('usersxusernam', 'LIKE', "%$keyword%")->orWhere('usersxemailxx', 'LIKE', "%$keyword%")->orWhere('usersxlevelxx', 'LIKE', "%$keyword%")->get();

		# Buat judul pencarian
		$judul = 'Hasil Pencarian "'. $keyword . '"';

		# Tampilkan halaman pencarian
		return View::make('user.cari', compact('judul', 'daftar', 'cari'));

	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Index Sorting Daftar | GET | localhost/pupr15/users
	|-------------------------------------------------------------------------- */
	public function urut($jenis) {

		# Jika jenis yang diterima adalah usersxusersid
		if($jenis === 'usersxuseridx') {

			# Tarik semua data users dan urutkan sesuai abjat banjar
			$daftar = User::orderBy('usersxuseridx', 'ASC')->paginate(5);

		# Jika jenis yang diterima usersxusersxx
		} elseif($jenis === 'usersxusernam') {

			# Tarik semua data kamus dan urutkan sesuai abjat usersxusersxx
			$daftar = User::orderBy('usersxusernam', 'ASC')->paginate(5);
		# Jika jenis yang diterima usersxusersxx
		} elseif($jenis === 'usersxemailxx') {

			# Tarik semua data kamus dan urutkan sesuai abjat usersxusersxx
			$daftar = User::orderBy('usersxemailxx', 'ASC')->paginate(5);
		# Jika jenis yang diterima usersxusersxx
		} elseif($jenis === 'usersxlevelxx') {

			# Tarik semua data kamus dan urutkan sesuai abjat usersxusersxx
			$daftar = User::orderBy('usersxlevelxx', 'ASC')->paginate(5);
		
		# Selain kedua jenis diatas
		} else {

			# Buat judul error
			$judul = '';

			# Tampilkan halaman error
			return Response::view('404', compact('judul'));

		}

		# Tentukan Judul
		$judul = 'Selamat Datang, ' . Auth::user()->usersxusernam;

		# Tampilkan View Beranda users
		return View::make('user.index', compact('daftar', 'judul'));

	}
	

}
