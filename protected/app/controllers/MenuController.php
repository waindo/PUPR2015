<?php

class MenuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$menus=Menu::all();
		$menus=Menu::orderBy('id','desc')->paginate(5);

		return View::make('menus.index')->with('menus',$menus);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('menus.create');
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
			'id_menu' => 'required',
			'menu'    => 'required',
			'url'     => 'required'
			);

		// cek validasi input
		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()){
			return Redirect::to('menus/create')->withErrors($validator);
		} else {
			// if valid save to database
			$menu = new Menu();
			$menu->id_menu  = Input::get('id_menu');
			$menu->menu     = Input::get('menu');
			$menu->url      = Input::get('url');
			$menu->save();

			//redirect to index
			Session::flash('message', 'Succesfully cerated menu !');
			return Redirect::to('menus');  
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
		$menu= Menu::find($id);
		//load view tamplate show.blade.php and fill variable band
		return View::make('menus.show')->with('menu',$menu);
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
		$menu = Menu::find($id);

		//load view tamplate edit.blade.php and fill
		return View::make('menus.edit')->with('menu',$menu);
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
				'id_menu'  => 'required',
				'menu' => 'required',
				'url'=> 'required' 
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails()){
			return Redirect::to('menus/'.$id.'/edit')->withErrors($validation) ;
		}else {
			//if data valid 
			$menu = Menu::find($id);

			$menu-> id_menu  = Input::get('id_menu') ;
			$menu-> menu     = Input::get('menu');
			$menu-> url      = Input::get('url');
			$menu->save();

			//redurect to halaman index
			Session::flash('message','Succesfully updating menu !');
			
			return Redirect::to('menus');			
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
		$menu = Menu::find($id);
		// delete one record
		$menu->delete();

		// redirect to halaman bands
		Session::flash('message','Succesfully deleting menu');
		return Redirect::to('menus');
	}

}
