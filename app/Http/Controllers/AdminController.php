<?php namespace Learn\Http\Controllers;

use Illuminate\Contracts\Auth\Guard as Auth;
use Learn\Http\Requests;

use Illuminate\Http\Request;
use Learn\Models\Feedback;

class AdminController extends Controller {

    /**
     * @var Auth
     */
    protected $auth;

    function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Feedback $feedback
     * @return \Illuminate\View\View
     */
	public function index(Feedback $feedback)
	{
        /** @var int $feedbackCount */
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

        if ($this->auth->attempt(array('email' => $email, 'password' => $password))) {
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
        $this->auth->logout();
        return redirect('/');
    }

}
