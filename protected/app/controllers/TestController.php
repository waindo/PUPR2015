<?php
class  TestController extends \BaseController{


public function __construct(){
	$this->beforeFilter('auth');
}

public function index(){

	$daftar= Codes::all();

	return View::make('tes.index', compact('daftar'));
}

public function tampildetail($param, $param2){
	
	 $codes = Codes::Where('codesxheadxxx', '=', $param)->first();

	 return View::make('tes.viewdata')->with('codes', $codes);
}


}
 