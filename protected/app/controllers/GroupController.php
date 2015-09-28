<?php
/*
|--------------------------------------------------------------------------
| Controller Group
|--------------------------------------------------------------------------
| Sesuaikan nama class dengan nama file 
*/
class GroupController extends \BaseController {

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
	| Halaman Index | GET | localhost/pupr/group/
	|-------------------------------------------------------------------------- */
	public function index()
	{
		# Ambil semua data group yang ada
		$daftar = Group::orderBy('created_at', 'DESC')->paginate(5);

		# Tetukan Judul
		$judul = 'Selamat Datang, ' . Auth::user()->usersxusernam;

		# Tampilkan View Beranda group
		return View::make('group.index', compact('daftar', 'judul'));
	}

	/*
	|--------------------------------------------------------------------------
	| Form Buat Group Baru | GET | localhost/pupr15/Group/buat
	|-------------------------------------------------------------------------- */
	public function buat() {

		# Tentukan Judul
		$judul = 'Tambah Data Group';
		
		# Langsung tampilkan view
		return View::make('group.tambah', compact('judul'));

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan Group Baru | POST | localhost/pupr15/group
	|-------------------------------------------------------------------------- */
	public function postBuat() {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan  wajib diisi
		$aturan = array(
			'groupxgroupid'	=> 'required', 
			'groupxgroupxx'	=> 'required'			
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(
			'groupxgroupid.required'	=> 'Group ID masih kosong.',
			'groupxgroupxx.required'	=> 'Group masih kosong.'			
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman dengan masing-masing pesan error
			return Redirect::back()->withErrors($v)->withInput();

		# Bila sukses, simpan data dalam database
		Group::create(array(
			'groupxgroupid' 	=> Input::get('groupxgroupid'),
			'groupxgroupxx' 	=> Input::get('groupxgroupxx')
		));

		# Setelah disimpan kembali kehalaman beranda dengan pesan sukses
		return Redirect::route('berandagroup')->withPesan('Group baru berhasil ditambahkan.');

	}

	/*
	|--------------------------------------------------------------------------
	| Form Ubah Informasi Group | GET | localhost/pupr15/group/{id}/ubah
	|-------------------------------------------------------------------------- */
	public function ubah($id) {
		
		# Temukan id group yang dimaksud
		$group = Group::find($id);

		# Tentukan judul
		$judul = 'Ubah Informasi Group';

		# Kirim isi variabel bersama view
		return View::make('group.ubah', compact('group', 'judul'));

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Ubah Informasi Group | POST | localhost/pupr15/group/{id}
	|-------------------------------------------------------------------------- */
	public function postUbah($id) {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan wajib diisi
		$aturan = array(
			'groupxgroupid'	=> 'required', 
			'groupxgroupxx'	=> 'required'			
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(
			'groupxgroupid.required'	=> 'Group ID masih kosong.',
			'groupxgroupxx.required'	=> 'Group  masih kosong.'
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v)->withInput();

		# Temukan ID group yang ingin diubah
		$temp =  Group::find($id);

		# Lakukan perubahan berdasarkan field
		$temp-> groupxgroupid 	= Input::get('groupxgroupid');
		$temp-> groupxgroupxx   = Input::get('groupxgroupxx');

		# Simpan perubahan
		$temp->save();

		# Kembali kehalaman beranda admin dengan pesan sukses
		return Redirect::route('berandagroup')->withPesan('Salah satu data group berhasil diubah.');
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data Group | DELETE | localhost/pupr15/group/{id}/hapus
	|-------------------------------------------------------------------------- */
	public function hapus($id) {
		
		# Hapus berdasarkan id
		$hapus = Group::destroy($id);

		# Kembali kehalaman index dengan pesan sukses
		return Redirect::route('berandagroup')->withPesan('Data Group berhasil dihapus.');

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data Group | DELETE | localhost/pupr15/Group/cari/Group
	|-------------------------------------------------------------------------- */
	public function cari() {

		# Ambil nilai inputan dari form
		$keyword = Input::get('cari');

		# Buatkan daftar yang sama persis dengan kata kunci
		$cari = Group::where('groupxgroupid', $keyword)->orWhere('groupxgroupxx', $keyword)->get();

		# Buatkan daftar yang mendekati dengan kata kunci yang dicari
		$daftar = Group::where('groupxgroupid', 'LIKE', "%$keyword%")->orWhere('groupxgroupxx', 'LIKE', "%$keyword%")->get();

		# Buat judul pencarian
		$judul = 'Hasil Pencarian "'. $keyword . '"';

		# Tampilkan halaman pencarian
		return View::make('group.cari', compact('judul', 'daftar', 'cari'));

	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Index Sorting Daftar | GET | localhost/pupr15/group
	|-------------------------------------------------------------------------- */
	public function urut($jenis) {

		# Jika jenis yang diterima adalah groupxgroupid
		if($jenis === 'groupxgroupid') {

			# Tarik semua data group dan urutkan sesuai abjat banjar
			$daftar = Group::orderBy('groupxgroupid', 'ASC')->paginate(5);

		# Jika jenis yang diterima groupxgroupxx
		} elseif($jenis === 'groupxgroupxx') {

			# Tarik semua data kamus dan urutkan sesuai abjat groupxgroupxx
			$daftar = Group::orderBy('groupxgroupxx', 'ASC')->paginate(5);
		
		# Selain kedua jenis diatas
		} else {

			# Buat judul error
			$judul = '';

			# Tampilkan halaman error
			return Response::view('404', compact('judul'));

		}

		# Tentukan Judul
		$judul = 'Selamat Datang, ' . Auth::user()->usersxusernam;

		# Tampilkan View Beranda group
		return View::make('group.index', compact('daftar', 'judul'));

	}	


}
