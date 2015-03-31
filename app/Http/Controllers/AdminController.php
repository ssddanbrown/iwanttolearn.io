<?php namespace Learn\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

    /**
     * Show the login page.
     */
    public function showLogin()
    {
        return view('admin/login');
    }

    /**
     * Log the user in.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        if (Auth::attempt(array('email' => $email, 'password' => $password))) {
            return redirect()->intended('/admin');
        }

        return redirect()->back()->withInput()->with('failed', 'Login details incorrect');
    }

    /**
     * Log the user out.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
