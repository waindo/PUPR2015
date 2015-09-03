<?php

class RegistrationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function login()
	{
		return View::make('login');
	}

 
	public function authenticate()
	{
		$user = array(
		'usersxemailxx' => Input::get('usersxemailxx'),
		'password'      => Input::get('password')
		);
 
		
		if (Auth::attempt($user))
		{	
			if (Auth::check())
			{				
				return View::make('home')->with('user',Auth::user());						
			}
			else
			{			
				return Redirect::to('login')->with('login_error','You must login first.');
			}
		}
		return Redirect::to('login')->with('login_error', 'Login gagal, email atau password salah!');
	}

	public function register()
	{
		return View::make('login');
	}

	public function store()
	{
		$rules = array(
			'usersxuseridx'       => 'required',
			'usersxusernam'       => 'required',
			'password'            => 'required|same:password_confirm',
			'usersxemailxx'       => 'required|email|unique:usersx',	
			'usersxlevelxx'       => 'required'							
			);

			$validation = Validator::make(Input::all(), $rules);
			if ($validation->fails())
			{
				return Redirect::to('login')->withErrors
				($validation)->withInput();
			}

			$user = new User;
			$user->usersxuseridx    = Input::get('usersxuseridx');
			$user->usersxusernam    = Input::get('usersxusernam');
			$user->usersxemailxx    = Input::get('usersxemailxx');
			$user->password         = Hash::make(Input::get('password'));
			$user->usersxlevelxx    = Input::get('usersxlevelxx');
			 
			if ($user->save())
			{

				$userlog = new UserLog;
				$userlog->usersxuseridx    = Input::get('usersxuseridx');
				$userlog->usersxusernam    = Input::get('usersxusernam');
				$userlog->usersxemailxx    = Input::get('usersxemailxx');
				$userlog->password         = Hash::make(Input::get('password'));
				$userlog->usersxlevelxx    = Input::get('usersxlevelxx');
				$userlog->usersxparamxx    = 'i';
				$userlog->save();

				Auth::loginUsingId($user->id);
				return Redirect::to('login');
				//return 'Simpan berhasil !!!';
			}
			else {
				return 'Simpan Gagal !!!';	
			}
			//return Redirect::to('login')->withInput();
			return Redirect::to('saveToUsersLOG');
	}


	public function saveToUsersLOG()
	{
		$rules = array(
			'usersxuseridx'       => 'required',
			'usersxusernam'       => 'required',
			'password'            => 'required|same:password_confirm',
			'usersxemailxx'       => 'required|email|unique:usersx',	
			'usersxlevelxx'       => 'required'							
			);

			$validation = Validator::make(Input::all(), $rules);
			if ($validation->fails())
			{
				return Redirect::to('login')->withErrors
				($validation)->withInput();
			}

			$userlog = new User_Log;
			$userlog->usersxuseridx    = Input::get('usersxuseridx');
			$userlog->usersxusernam    = Input::get('usersxusernam');
			$userlog->usersxemailxx    = Input::get('usersxemailxx');
			$userlog->password         = Hash::make(Input::get('password'));
			$userlog->usersxlevelxx    = Input::get('usersxlevelxx');
			$userlog->usersxparamxx    = 'i';
			$userlog->save();

			if ($userlog->save())
			{
				Auth::loginUsingId($user->id);
				return Redirect::to('login');
				//return 'Simpan berhasil !!!';
			}
			else {
				return 'Simpan Gagal !!!';	
			}
			//return Redirect::to('login')->withInput();
	}

	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
