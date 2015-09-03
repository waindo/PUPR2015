<?php

class GroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$groups= Group::all();

		return View::make('groups.index')->with('groups',$groups);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('groups.create');
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
			'groupxgroupid' => 'required',
			'groupxgroupxx'    => 'required'			
			);

		// cek validasi input
		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()){
			return Redirect::to('groups/create')->withErrors($validator);
		} else {
			// if valid save to database
			$group = new Group();
			$group->groupxgroupid  = Input::get('groupxgroupid');
			$group->groupxgroupxx     = Input::get('groupxgroupxx');
			$group->save();

			//redirect to index
			Session::flash('message', 'Succesfully cerated group !');
			return Redirect::to('groups');  
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
		$group= Group::find($id);
		//load view tamplate show.blade.php and fill variable band
		return View::make('groups.show')->with('group',$group);
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
		$group = Group::find($id);

		//load view tamplate edit.blade.php and fill
		return View::make('groups.edit')->with('group',$group);
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
				'groupxgroupid'  => 'required',
				'groupxgroupxx' => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails()){
			return Redirect::to('groups/'.$id.'/edit')->withErrors($validation) ;
		}else {
			//if data valid 
			$group = Group::find($id);

			$group->groupxgroupid  = Input::get('groupxgroupid');
			$group->groupxgroupxx     = Input::get('groupxgroupxx');
			$group->save();

			//redurect to halaman index
			Session::flash('message','Succesfully updating group !');
			
			return Redirect::to('groups');			
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
		$group = Group::find($id);
		// delete one record
		$group->delete();

		// redirect to halaman bands
		Session::flash('message','Succesfully deleting group');
		return Redirect::to('groups');
	}


}
