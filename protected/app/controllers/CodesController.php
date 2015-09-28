<?php
/*
|--------------------------------------------------------------------------
| Controller codes
|--------------------------------------------------------------------------
| Sesuaikan nama class dengan nama file 
*/
class CodesController extends \BaseController {

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
	| Halaman Index | GET | localhost/pupr/codes/
	|-------------------------------------------------------------------------- */
	public function index()
	{
		# Ambil semua data codes yang ada
		$daftar = Codes::Where('codesxcodexxx', '=', 0)->orderBy('created_at', 'DESC')->paginate(5);

		# Tetukan Judul
		$judul = 'Selamat Datang, ' . Auth::user()->usersxusernam;

		# Tampilkan View Beranda codes
		return View::make('codes.index', compact('daftar', 'judul'));
	}
	/*
	|--------------------------------------------------------------------------
	| Halaman Index Detail| GET | localhost/pupr/codes/
	|-------------------------------------------------------------------------- */
	public function indexdetail($id)
	{
		// Show All Where
		$codes = Codes::Where('codesxheadxxx', '=', $id)->Where('codesxstatusx', '=', 1)->orderBy('codesxcodexxx', 'ASC')->paginate(5);		
		
		$daftar = Codes::Where('codesxheadxxx', '=', $id)->first();

		$judul = 'Selamat Datang, ' . Auth::user()->usersxusernam;	   

		return View::make('codes.indexdetail', compact('codes', 'daftar'));
	}

	/*
	|--------------------------------------------------------------------------
	| Form Buat codes Baru | GET | localhost/pupr15/codes/buat
	|-------------------------------------------------------------------------- */
	public function buat() {

		# Tentukan Judul
		$judul = 'Tambah Data Codes';
		
		# Langsung tampilkan view
		return View::make('codes.tambah', compact('judul'));

	}

	/*
	|--------------------------------------------------------------------------
	| Form Buat codes Baru | GET | localhost/pupr15/codes/buatcodedetail
	|-------------------------------------------------------------------------- */
	public function buatDetail($id) {

		// # Temukan id Codes yang dimaksud	
		$codes = Codes::Where('codesxheadxxx', '=', $id)->first();

		return View::make('codes.tambahdetail')->with('codes', $codes);
	}
	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan Codes Baru | POST | localhost/pupr15/codes
	|-------------------------------------------------------------------------- */
	public function postBuatDetail() {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan  wajib diisi
		$aturan = array(			
			'codesxheadxxx'	=> 'required',
			'codesxdesc1xx'	=> 'required',
			'codesxdesc2xx'	=> 'required'
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(			
			'codesxheadxxx.required'	=> 'Head masih kosong.',
			'codesxdesc1xx.required'	=> 'Desc 1 masih kosong.',
			'codesxdesc2xx.required'	=> 'Desc 2 masih kosong.'
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman dengan masing-masing pesan error
			return Redirect::back()->withErrors($v)->withInput();	

			$tempId = Input::get('codesxheadxxx');

		$tot2 = DB::table('codesx')->where('codesxheadxxx',$tempId)->max('codesxcodexxx')+1;
		//echo $tot2;
		# Bila sukses, simpan data dalam database
		Codes::create(array(	
			'codesxheadxxx' 	=> Input::get('codesxheadxxx'),
			'codesxcodexxx' 	=> $tot2,
			'codesxdesc1xx' 	=> Input::get('codesxdesc1xx'),
			'codesxdesc2xx' 	=> Input::get('codesxdesc2xx'),
			'codesxstatusx' 	=> '1' //permanen
		));

		# Tampilkan View Beranda codes
		$tmp =Input::get('codesxheadxxx');

		$codes = Codes::Where('codesxheadxxx', '=', $tmp)->Where('codesxstatusx', '=', 1)->orderBy('codesxcodexxx', 'ASC')->paginate(5);				
		$daftar = Codes::Where('codesxheadxxx', '=', $tmp)->first();
		return View::make('codes.indexdetail', compact('codes', 'daftar'));
	}
	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan Codes Baru | POST | localhost/pupr15/codes
	|-------------------------------------------------------------------------- */
	public function postBuat() {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan  wajib diisi
		$aturan = array(			
			'codesxdesc1xx'	=> 'required',
			'codesxdesc2xx'	=> 'required'
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(			
			'codesxdesc1xx.required'	=> 'Desc 1 masih kosong.',
			'codesxdesc2xx.required'	=> 'Desc 2 masih kosong.'
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman dengan masing-masing pesan error
			return Redirect::back()->withErrors($v)->withInput();


		$tot = DB::table('codesx')->max('codesxheadxxx') + 1;

		# Bila sukses, simpan data dalam database
		Codes::create(array(	
			'codesxheadxxx' 	=> $tot,	 
			'codesxcodexxx' 	=> '0', //permanen
			'codesxdesc1xx' 	=> Input::get('codesxdesc1xx'),
			'codesxdesc2xx' 	=> Input::get('codesxdesc2xx'),
			'codesxstatusx' 	=> '0' //permanen
		));

		# Setelah disimpan kembali kehalaman beranda dengan pesan sukses
		return Redirect::route('berandacodes')->withPesan('Codes baru berhasil ditambahkan.');

	}

	/*
	|--------------------------------------------------------------------------
	| Form Ubah Informasi Codes | GET | localhost/pupr15/codes/{id}/ubah
	|-------------------------------------------------------------------------- */
	public function ubah($id) {
		
		# Temukan id Codes yang dimaksud
		$codes = Codes::find($id);

		# Tentukan judul
		$judul = 'Ubah Informasi Codes';

		# Kirim isi variabel bersama view
		return View::make('codes.ubah', compact('codes', 'judul'));

	}

	/*
	|--------------------------------------------------------------------------
	| Form Ubah Informasi Codes | GET | localhost/pupr15/codes/{id}/ubah
	|-------------------------------------------------------------------------- */
	public function ubahDetail($id) {
		
		# Temukan id Codes yang dimaksud
		$codes = Codes::find($id);

		# Tentukan judul
		$judul = 'Ubah Informasi Codes';

		# Kirim isi variabel bersama view
		return View::make('codes.ubahDetail', compact('codes', 'judul'));

	}

	/*
	|--------------------------------------------------------------------------
	| Proses Ubah Informasi Codes | POST | localhost/pupr15/Codes/{id}
	|-------------------------------------------------------------------------- */
	public function postUbahDetail($id) {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan wajib diisi
		$aturan = array(			
			'codesxdesc1xx'	=> 'required',
			'codesxdesc2xx'	=> 'required'
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(						
			'codesxdesc1xx.required'	=> 'Desc 1 masih kosong.',
			'codesxdesc2xx.required'	=> 'Desc 2 masih kosong.' 
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v)->withInput();

		# Temukan ID codes yang ingin diubah
		$temp =  Codes::find($id);

		# Lakukan perubahan berdasarkan field					
			$temp-> codesxdesc1xx 	= Input::get('codesxdesc1xx');
			$temp-> codesxdesc2xx 	= Input::get('codesxdesc2xx');	
			 
		# Simpan perubahan
		$temp->save();
		
		$tmp =Input::get('codesxheadxxx');

		$codes = Codes::Where('codesxheadxxx', '=', $tmp)->Where('codesxstatusx', '=', 1)->orderBy('codesxcodexxx', 'ASC')->paginate(5);				
		$daftar = Codes::Where('codesxheadxxx', '=', $tmp)->first();
		return View::make('codes.indexdetail', compact('codes', 'daftar'));
	}


	/*
	|--------------------------------------------------------------------------
	| Proses Ubah Informasi Codes | POST | localhost/pupr15/Codes/{id}
	|-------------------------------------------------------------------------- */
	public function postUbah($id) {
		
		# Simpan semua inputan kedalam variabel input
		$input = Input::all();

		# Aturan Validasi dengan syarat :
		# - Inputan wajib diisi
		$aturan = array(			
			'codesxdesc1xx'	=> 'required',
			'codesxdesc2xx'	=> 'required'
		);

		# Keterangan validasi untuk setiap syarat
		$keterangan = array(						
			'codesxdesc1xx.required'	=> 'Desc 1 masih kosong.',
			'codesxdesc2xx.required'	=> 'Desc 2 masih kosong.' 
		);

		# Koleksi semua aturan beserta keterangan kedalam variabel 'v'
		$v = Validator::make($input, $aturan, $keterangan);

		# Bila validasi gagal
		if($v->fails())

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v)->withInput();

		# Temukan ID codes yang ingin diubah
		$temp =  Codes::find($id);

		# Lakukan perubahan berdasarkan field		
			$temp-> codesxdesc1xx 	= Input::get('codesxdesc1xx');
			$temp-> codesxdesc2xx 	= Input::get('codesxdesc2xx');	
		# Simpan perubahan
		$temp->save();

		# Kembali kehalaman beranda admin dengan pesan sukses
		return Redirect::route('berandacodes')->withPesan('Salah satu data codes berhasil diubah.');
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data Codes | DELETE | localhost/pupr15/codes/{id}/hapus
	|-------------------------------------------------------------------------- */
	public function hapus($id) {
		
		# Hapus berdasarkan id
		// $hapus = Codes::destroy($id);
		$hapus = Codes::where('codesxheadxxx', '=', $id)->delete();

		# Kembali kehalaman index dengan pesan sukses
		return Redirect::route('berandacodes')->withPesan('Data Codes berhasil dihapus.');

	}

		/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data Codes | DELETE | localhost/pupr15/codes/{id}/hapus
	|-------------------------------------------------------------------------- */
	public function hapusDetail($id1, $id2) {
		
		# Hapus berdasarkan id
		$hapus = Codes::destroy($id1);
		//$hapus = Codes::find($id)->delete();

		$codes  = Codes::Where('codesxheadxxx', '=', $id2)->Where('codesxstatusx', '=', 1)->orderBy('codesxcodexxx', 'ASC')->paginate(5);				
		$daftar = Codes::Where('codesxheadxxx', '=', $id2)->first();
		return View::make('codes.indexdetail', compact('codes', 'daftar'));		
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Hapus Data Codes | DELETE | localhost/pupr15/Codes/cari
	|-------------------------------------------------------------------------- */
	public function cari() {

		# Ambil nilai inputan dari form
		$keyword = Input::get('cari');

		# Buatkan daftar yang sama persis dengan kata kunci
		$cari = Codes::where('codesxcodexxx', '=', 0)->orwhere('codesxdesc1xx', $keyword)->orWhere('codesxdesc2xx', $keyword)->get();

		# Buatkan daftar yang mendekati dengan kata kunci yang dicari
		$daftar = Codes::where('codesxheadxxx', '=', 0)->orwhere('codesxdesc1xx', 'LIKE', "%$keyword%")->orWhere('codesxdesc2xx', 'LIKE', "%$keyword%")->get();

		# Buat judul pencarian
		$judul = 'Hasil Pencarian "'. $keyword . '"';

		# Tampilkan halaman pencarian
		return View::make('codes.cari', compact('judul', 'daftar', 'cari'));

	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Index Sorting Daftar | GET | localhost/pupr15/codes
	|-------------------------------------------------------------------------- */
	public function urut($jenis) {
		# Jika jenis yang diterima codesxcodesxx
		if($jenis === 'codesxdesc1xx') {
			# Tarik semua data codes dan urutkan sesuai abjat codesxdesc1xx
			$daftar = Codes::where('codesxcodexxx', '=', 0)->orderBy('codesxdesc1xx', 'ASC')->paginate(5);
		# Jika jenis yang diterima codesxdesc2xx
		} elseif($jenis === 'codesxdesc2xx') {
			# Tarik semua data codes dan urutkan sesuai abjat codesxdesc2xx
			$daftar = Codes::where('codesxcodexxx', '=', 0)->orderBy('codesxdesc2xx', 'ASC')->paginate(5);
		# Selain kedua jenis diatas
		} else {
			# Buat judul error
			$judul = '';

			# Tampilkan halaman error
			return Response::view('404', compact('judul'));
		}
		# Tentukan Judul
		$judul = 'Selamat Datang, ' . Auth::user()->usersxusernam;

		# Tampilkan View Beranda codes
		return View::make('codes.index', compact('daftar', 'judul'));

	}	

	
}
