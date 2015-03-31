<?php namespace Learn\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Learn\Http\Requests;
use Learn\Http\Requests\UserCreateRequest;
use Learn\Http\Requests\UserCreateRequestRequest;
use Learn\Http\Requests\UserRequest;
use Learn\Http\Requests\UserUpdateRequest;
use Learn\Models\User;
use Learn\Services\MessageService;

class UserController extends Controller {

    protected $user;
    protected $message;

    function __construct(User $user, MessageService $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Display a listing of the user in the admin area.
     *
     * @return Response
     */
    public function adminIndex()
    {
        $users = $this->user->paginate(50);
        return view('admin/users/index')->with('users', $users);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function adminCreate()
    {
        return view('admin/users/create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param UserCreateRequest $request
     * @return Response
     */
    public function adminStore(UserCreateRequest $request)
    {
        $this->user = $this->user->fill($request->all());
        $this->user->password = Hash::make($request->get('password'));
        $this->user->save();
        $this->message->success('New user "' . $this->user->name . '" has been saved.');

        return redirect('admin/users');
    }



    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $this->user = $this->user->find($id);
        return view('admin/users/edit')->with('user', $this->user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param UserUpdateRequest $request
     * @param  int $id
     * @return Response
     */
    public function adminUpdate(UserUpdateRequest $request, $id)
    {
        $this->user = $this->user->find($id);
        $this->user->fill($request->all());
        if($request->has('password') && strlen($request->get('password')) > 4) {
            $this->user->password = Hash::make($request->get('password'));
        }
        $this->user->save();
        $this->message->success('User "' . $this->user->name . '" has been updated.');

        return redirect('/admin/users/' . $id);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminDestroy($id)
    {
        $this->user = $this->user->find($id);
        $this->user->delete();
        $this->message->success('User "' . $this->user->name . '" has been deleted.');
        return redirect('/admin/users');
    }

}
