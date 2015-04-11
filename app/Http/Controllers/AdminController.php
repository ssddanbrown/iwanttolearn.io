<?php namespace Learn\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Learn\Http\Requests;
use Learn\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Learn\Models\Feedback;

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Feedback $feedback
     * @return Response
     */
	public function index(Feedback $feedback)
	{
        $feedbackCount = count($feedback->all());
		return view('admin/index', ['feedbackCount' => $feedbackCount]);
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
     * @param Request $request
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
