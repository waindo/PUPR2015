<?php

class WilayahSungaiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$wilayahsungai= Sungai::all();

		return View::make('wilayahsungai.index')->with('wilayahsungai',$wilayahsungai);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//		 
		return View::make('sungais.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// // validasi parameter
		$rules = array(
			'sungaikodedas' => 'required',			
			'sungaikodesng' => 'required',
			'sungainamasng'    => 'required'
			);

		// cek validasi input
		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()){
			return Redirect::to('sungais/create')->withErrors($validator);
		} else {
			// if valid save to database
			$sungai = new Sungai();
			$sungai->sungaikodedas  = Input::get('sungaikodedas');
			$sungai->sungaikodesng  = Input::get('sungaikodesng');
			$sungai->sungainamasng  = Input::get('sungainamasng');
			$sungai->save();

			//redirect to index
			Session::flash('message', 'Succesfully cerated Sungai !');
			return Redirect::to('sungais');  
		}
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
		$sungai= Sungai::find($id);
		//load view tamplate show.blade.php and fill variable band
		return View::make('sungais.show')->with('sungai',$sungai);
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
		$sungai = Sungai::find($id);

		//load view tamplate edit.blade.php and fill
		return View::make('sungais.edit')->with('sungai',$sungai);
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
			'sungaikodedas' => 'required',			
			'sungaikodesng' => 'required',
			'sungainamasng'    => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails()){
			return Redirect::to('sungais/'.$id.'/edit')->withErrors($validation) ;
		}else {
			//if data valid 
			$sungai = Sungai::find($id);

			$sungai->sungaikodedas  = Input::get('sungaikodedas');
			$sungai->sungaikodesng  = Input::get('sungaikodesng');
			$sungai->sungainamasng  = Input::get('sungainamasng');
			$sungai->save();

			//redurect to halaman index
			Session::flash('message','Succesfully updating Sungai !');
			
			return Redirect::to('sungais');			
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
		$sungai = Sungai::find($id);
		// delete one record
		$sungai->delete();

		// redirect to halaman bands
		Session::flash('message','Succesfully deleting Sungai');
		return Redirect::to('sungais');
	}


}
