<?php

class DasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// load data all
		$das = DB::table('wilsng')
     	->select('dasxxx.id','dasxxx.dasxxxkodedas','dasxxx.dasxxxnamadas','wilsng.wilsngkodewsx','wilsng.wilsngnamawsx')
	    ->join('dasxxx', 'dasxxx.dasxxxkodewsx', '=', 'wilsng.wilsngkodewsx')	  
	    ->orderBy('dasxxx.id', 'ASC')	     
	    ->get();
		return View::make('das.index')->with('das',$das);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//		 
		$ws= Ws::all(); 

		//load data to dropdown
		$ws = array('' => '');
		foreach(Ws::all() as $row)
			$das[$row->wilsngkodewsx] = $row->wilsngnamawsx;
		
        return View::make('das.create', array(
			'ws' => $ws
		))->with('ws',$ws);	
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// // validasi parameter
		$rules =array(
			'dasxxxkodewsx'    => 'required',
			'dasxxxkodedas'    => 'required',			
			'dasxxxnamadas'    => 'required'			
			);

		// cek validasi input
		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()){
			return Redirect::to('das/create')->withErrors($validator);
		} else {
			// if valid save to database
			$das = new Das();
			$das->dasxxxkodewsx        = Input::get('dasxxxkodewsx');
			$das->dasxxxkodedas        = Input::get('dasxxxkodedas');
			$das->dasxxxnamadas        = Input::get('dasxxxnamadas');
			$das->save();

			//redirect to index
			Session::flash('message', 'Succesfully cerated Das !');
			return Redirect::to('das');  
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
		$das= Das::find($id);
		//load view tamplate show.blade.php and fill variable band
		return View::make('das.show')->with('das',$das);
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
		$das = Das::find($id);

		//load view tamplate edit.blade.php and fill
		return View::make('das.edit')->with('das',$das);
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
		$rules =array(
			'dasxxxkodewsx'    => 'required',
			'dasxxxkodedas'    => 'required',			
			'dasxxxnamadas'    => 'required'			
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails()){
			return Redirect::to('das/'.$id.'/edit')->withErrors($validation) ;
		}else {
			//if data valid 
			$das = Das::find($id);

			$das->dasxxxkodewsx        = Input::get('dasxxxkodewsx');
			$das->dasxxxkodedas        = Input::get('dasxxxkodedas');
			$das->dasxxxnamadas        = Input::get('dasxxxnamadas');
			$sungai->save();

			//redurect to halaman index
			Session::flash('message','Succesfully updating Das !');
			
			return Redirect::to('das');			
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
		$das = Das::find($id);
		// delete one record
		$das->delete();

		// redirect to halaman bands
		Session::flash('message','Succesfully deleting Das');
		return Redirect::to('das');
	}


}
