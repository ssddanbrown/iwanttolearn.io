<?php namespace Learn\Http\Controllers;

use Learn\Http\Requests;
use Learn\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin/index');
	}

}
