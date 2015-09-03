<?php

class WsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$ws= DB::table('dasxxx as d')
		->select('w.id','w.wilsngkodewsx', 'w.wilsngnamawsx', 'w.wilsngkategri', 'd.dasxxxnamadas', 's.sungainamasng')
		->leftjoin ('wilsng as w', 'w.wilsngkodewsx','=','d.dasxxxkodewsx')
		->join ('sungai as s', 's.sungaikodedas','=','d.dasxxxkodedas')
		->orderBy('w.id', 'ASC')	     
	    ->get();

		return View::make('ws.index')->with('ws',$ws);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//load All data detail ws
		//$wsdtl= Wsdtl::all(); 
		$wsdtl = DB::table('provxx')
     	->select('wlsdtl.id','provxx.provxxnamprov')
	    ->join('wlsdtl', 'provxx.provxxkodprov', '=', 'wlsdtl.wlsdtlkodprov')	  
	    ->orderBy('wlsdtl.id', 'ASC')	     
	    ->get();

		//load data to dropdown
		$propinsi = array('' => '');
		foreach(Propinsi::all() as $row)
			$propinsi[$row->provxxkodprov] = $row->provxxnamprov;
		
        return View::make('ws.create', array(
			'propinsi' => $propinsi
		))->with('wsdtl',$wsdtl);
	}


    public function tambahPropinsi()
	{
		// // validasi parameter
	$rules =array(			
			'wlsdtlkodewsx'    => 'required',
			'wlsdtlkodprov'    => 'required'			
			);

		// // cek validasi input
		 $validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()){
			return Redirect::to('ws/create')->withErrors($validator);
		} else {
			// if valid save to database
			$wsdtl = new Wsdtl();
			$wsdtl->wlsdtlkodewsx  = Input::get('wlsdtlkodewsx');
			$wsdtl->wlsdtlkodprov  = Input::get('wlsdtlkodprov');
			$wsdtl->wlsdtlseqxxxx  = Input::get('wlsdtlkodprov');
			$wsdtl->save();

			//redirect to index
			//Session::flash('message', 'Succesfully cerated Ws !');
			return Redirect::to('ws/create');  
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// // validasi parameter
		// $rules =array(
		// 	'kodedas' => 'required',			
		// 	'kodesungai' => 'required',
		// 	'namasungai'    => 'required'			
		// 	);

		// // cek validasi input
		// $validator = Validator::make(Input::all(),$rules);

		// if ($validator->fails()){
		// 	return Redirect::to('ws/create')->withErrors($validator);
		// } else {
		// 	// if valid save to database
		// 	$ws = new Ws();
		// 	$ws->sungaikodedas  = Input::get('kodedas');
		// 	$ws->sungaikodesng  = Input::get('kodesungai');
		// 	$ws->sungainamasng  = Input::get('namasungai');
		// 	$ws->save();

		// 	//redirect to index
		// 	Session::flash('message', 'Succesfully cerated Ws !');
		// 	return Redirect::to('ws');  
		// }

		//Tambah Propinsi
		// $rules =array(			
		// 	'wlsdtlkodewsx'    => 'required',
		// 	'wlsdtlkodprov'    => 'required'			
		// 	);

		// // // cek validasi input
		//  $validator = Validator::make(Input::all(),$rules);

		// if ($validator->fails()){
		// 	return Redirect::to('ws/create')->withErrors($validator);
		// } else {
		// 	// if valid save to database
		// 	$wsdtl = new Wsdtl();
		// 	$wsdtl->wlsdtlkodewsx  = Input::get('wlsdtlkodewsx');
		// 	$wsdtl->wlsdtlkodprov  = Input::get('wlsdtlkodprov');
		// 	$wsdtl->wlsdtlseqxxxx  = Input::get('wlsdtlkodprov');
		// 	$wsdtl->save();

		// 	//redirect to index
		// 	//Session::flash('message', 'Succesfully cerated Ws !');
		// 	return Redirect::to('ws/create');  
		// }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//show single record
		$ws= Ws::find($id);
		//load view tamplate show.blade.php and fill variable band
		return View::make('ws.show')->with('ws',$ws);
	}
	


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function edit($id)
	{
		//show sungle record
		$ws = Ws::find($id);

		//load view tamplate edit.blade.php and fill
		return View::make('ws.edit')->with('ws',$ws);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//validasi input
		$rules = array(
			'kodedas' => 'required',			
			'kodesungai' => 'required',
			'namasungai'    => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails()){
			return Redirect::to('ws/'.$id.'/edit')->withErrors($validation) ;
		}else {
			//if data valid 
			$ws = Ws::find($id);

			$ws->sungaikodedas  = Input::get('kodedas');
			$ws->sungaikodesng  = Input::get('kodesungai');
			$ws->sungainamasng  = Input::get('namasungai');
			$ws->save();

			//redurect to halaman index
			Session::flash('message','Succesfully updating Ws !');
			
			return Redirect::to('ws');			
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public  function destroy($id)
	{
		// load single record
		$ws = Ws::find($id);
		// delete one record
		$ws->delete();

		// redirect to halaman bands
		Session::flash('message','Succesfully deleting Ws');
		return Redirect::to('ws.create');
	}


}
