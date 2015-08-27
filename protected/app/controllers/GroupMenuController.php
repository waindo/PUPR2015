<?php

class GroupMenuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$groupmenus=GroupMenu::all();

		return View::make('groupmenus.index')->with('groupmenus',$groupmenus);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('groupmenus.create');
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
			'id_group'   => 'required',
			'id_menu'    => 'required'
			);

		// cek validasi input
		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()){
			return Redirect::to('groupmenus/create')->withErrors($validator);
		} else {
			// if valid save to database
			$groupmenu = new GroupMenu();
			$groupmenu->id_group  = Input::get('id_group');
			$groupmenu->id_menu     = Input::get('id_menu');			
			$groupmenu->save();

			//redirect to index
			Session::flash('message', 'Succesfully cerated groupmenu !');
			return Redirect::to('groupmenus');  
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
		$groupmenu= GroupMenu::find($id);
		//load view tamplate show.blade.php and fill variable band
		return View::make('groupmenus.show')->with('groupmenu',$groupmenu);
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
		$groupmenu = GroupMenu::find($id);

		//load view tamplate edit.blade.php and fill
		return View::make('groupmenus.edit')->with('groupmenu',$groupmenu);
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
				'id_group'  => 'required',
				'id_menu' => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails()){
			return Redirect::to('groupmenus/'.$id.'/edit')->withErrors($validation) ;
		}else {
			//if data valid 
			$groupmenu = GroupMenu::find($id);

			$groupmenu-> id_group  = Input::get('id_group') ;
			$groupmenu-> id_menu     = Input::get('id_menu');			
			$groupmenu->save();

			//redurect to halaman index
			Session::flash('message','Succesfully updating groupmenu !');
			
			return Redirect::to('groupmenus');			
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
		$groupmenu = GroupMenu::find($id);
		// delete one record
		$groupmenu->delete();

		// redirect to halaman bands
		Session::flash('message','Succesfully deleting groupmenu');
		return Redirect::to('groupmenus');
	}


}
