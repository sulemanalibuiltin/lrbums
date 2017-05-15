<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\In;

class UserController extends Controller
{

    /*public function __construct()
    {
        if (!User::isLoggedIn())
            return redirect(route('user.login'));
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::whereIn('status', [0, 1])->get();
        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'users' => $users
            ];

        return view('users.users', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'roles' => Role::where([['status', '=', 1]])->get(),
                'departments' => Department::where([['status', '=', 1]])->get(),
                'designations' => Designation::where([['status', '=', 1]])->get()
            ];
        return view('users.add_user', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $role = Input::get('role');
        $department = Input::get('department');
        $designation = Input::get('designation');
        $title = Input::get('title');
        $contact = Input::get('contact');
        $email = Input::get('email');
        $username = Input::get('username');
        $password = Input::get('password');


        $rules =
            [
                'title' => 'required|min:2',
                'username' => 'required|min:2|without_spaces|unique:users,username',
                'password' => 'required',
                'contact' => 'phone',
                'email' => 'email|unique:users,email'
            ];

        $messages =
            [
                'title.required' => 'Title required',
                'title.min' => 'Title must be at least :min characters',
                'username.required' => 'Username required',
                'username.min' => 'Username must be at least :min characters',
                'username.without_spaces' => 'Username cannot contains spaces',
                'username.unique' => 'Username already exists',
                'password.required' => 'Password required',
                'contact.phone' => 'Contact number should start with number 0-9 and can have dash, plus and braces',
                'email.email' => 'Email should be in proper format i.e example@mail.com',
                'email.unique' => 'Email already exists'
            ];

        $this->validate($request, $rules, $messages);

        $contact = empty($contact) ? NULL : $contact;
        $email = empty($email) ? NULL : $email;

        $user = User::create
        (
            [
                'role_id' => $role,
                'department_id' => $department,
                'designation_id' => $designation,
                'title' => $title,
                'contact' => $contact,
                'email' => $email,
                'username' => $username,
                'password' => sha1(md5($password)),
                'created_by' => Session::get('user')[0]->id
            ]
        );

        if ($user) {

            Session::flash('success', 'New User created successfully');


        } else {

            Session::flash('error', 'Something went wrong, try again');


        }

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::where('id', $id)->get();
        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'user' => $user,
                'roles' => Role::where([['status', '=', 1]])->get(),
                'departments' => Department::where([['status', '=', 1]])->get(),
                'designations' => Designation::where([['status', '=', 1]])->get()
            ];

        return view('users.edit_user', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input =
            [
                'role_id' => Input::get('role'),
                'department_id' => Input::get('department'),
                'designation_id' => Input::get('designation'),
                'title' => Input::get('title'),
                'contact' => Input::get('contact'),
                'email' => Input::get('email'),
                'username' => Input::get('username')
            ];


        $password = Input::get('password');


        $rules =
            [
                'title' => 'required|min:2',
                'username' => 'required|min:2|without_spaces|unique:users,username,' . $id,
                'contact' => 'phone',
                'email' => 'email|unique:users,email,'.$id
            ];

        $messages =
            [
                'title.required' => 'Title required',
                'title.min' => 'Title must be at least :min characters',
                'username.required' => 'Username required',
                'username.min' => 'Username must be at least :min characters',
                'username.without_spaces' => 'Username cannot contains spaces',
                'username.unique' => 'Username already exists',
                'contact.phone' => 'Contact number should start with number 0-9 and can have dash, plus and braces',
                'email.email' => 'Email should be in proper format i.e example@mail.com',
                'email.unique' => 'Email already exists'
            ];

        $this->validate($request, $rules, $messages);

        $contact = empty($contact) ? NULL : $contact;
        $email = empty($email) ? NULL : $email;

        (!empty($password)) ? $input['password'] = sha1(md5(Input::get('password'))) : '';

        $user = User::where('id', $id)->update($input);

        if ($user) {

            Session::flash('success', 'User updated successfully');


        } else {

            Session::flash('error', 'Something went wrong, try again');


        }

        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        if ($user->delete()) {
            Session::flash('success', 'User deleted successfully');
        } else {
            Session::flash('error', 'Something went wrong, try again');
        }

        return redirect()->back();

    }

    public function show_trash()
    {
        $users = User::where('status', 2)->get();
        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'users' => $users
            ];
        return view('users.trashed_users', $data);

    }

    public function restore($id)
    {
        $user = User::where('id', $id)->update(['status' => 1]);
        if ($user) {
            Session::flash('success', 'User restore successfully');
        } else {
            Session::flash('error', 'Something went wrong, try again');
        }

        return redirect()->back();
    }

    public function trash($id)
    {
        $user = User::where('id', $id)->update(['status' => 2]);
        if ($user) {
            Session::flash('success', 'User has been sent to trash');
        } else {
            Session::flash('error', 'Something went wrong, try again');
        }

        return redirect()->back();


    }

    public function login()
    {
        return view('users.login');
    }

    public function logout()
    {
        Session::forget('user');
        Session::flush();

        return redirect(route('user.login'));
    }

    public function authenticate(Request $request)
    {
        $username = Input::get('username');
        $password = Input::get('password');


        $rules =
            [
                'username' => 'required',
                'password' => 'required'

            ];

        $messages =
            [
                'username.required' => 'Username required',
                'username.min' => 'Username must be at least :min characters',
                'password.required' => 'Password required'
            ];


        $this->validate($request, $rules, $messages);


        $user = User::where
        (
            [
                ['username', '=', $username],
                ['password', '=', sha1(md5($password))]
            ]

        )->get();


        if ($user->count() > 0) {

            User::where('id', $user[0]->id)->update(['last_login' => Carbon::now()->toDateTimeString()]);

            if ($user[0]->status == 1) {
                Session::forget('user');
                Session::flush();
                Session::put('user', $user);
                //Session::flash('success', 'Welcome, ' . $user[0]->title);
                Session::flash('notify_login_first', 'Welcome, '.$user[0]->title);


                return redirect(route('home'));
            } else if ($user[0]->status == 0) {
                Session::flash('warning', 'Unable to access your account, please try again');
                return redirect()->back();
            }

        } else {
            Session::flash('error', 'Invalid Username OR Password');
            return redirect()->back();
        }

    }


    public function profile()
    {
        $user_id = Session::get('user')[0]->id;
        $user = User::where('id', $user_id)->get();

        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'user' => $user
            ];

        return view('users.profile', $data);

    }

    public function profile_update(Request $request, $id)
    {
        $input = [
            'title' => Input::get('title'),
            'username' => Input::get('username')
        ];

        $contact=Input::get('contact');
        $email=Input::get('email');


        $rules =
            [
                'title' => 'required|min:2',
                'username' => 'required|min:2|without_spaces|unique:users,username,'.$id,
                'contact' => 'phone',
                'email' => 'email|unique:users,email,'.$id
            ];

        $messages =
            [
                'title.required' => 'Title required',
                'title.min' => 'Title must be at least :min characters',
                'username.required' => 'Username required',
                'username.min' => 'Username must be at least :min characters',
                'username.without_spaces' => 'Username cannot contains spaces',
                'username.unique' => 'Username already exists',
                'contact.phone' => 'Contact number should start with number 0-9 and can have dash, plus and braces',
                'email.email' => 'Email should be in proper format i.e example@mail.com',
                'email.unique' => 'Email already exists'
            ];

        $this->validate($request, $rules, $messages);

        $input['contact']=(!empty($contact)) ? Input::get('contact') : NULL;
        $input['email']=(!empty($email)) ? Input::get('email') : NULL;


        $user = User::where('id', $id)->update($input);
        if ($user) {
            Session::flash('success', 'Profile updated successfully');
            Session::forget('user');
            //Session::flush();
            $user=User::where('id', $id)->get();
            Session::put('user', $user);
        } else {
            Session::flash('error', 'Something went wrong, try again');
        }

        return redirect()->back();


    }

    public function change_password()
    {
        $user_id = Session::get('user')[0]->id;
        $user = User::where('id', $user_id)->get();

        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'user' => $user
            ];

        return view('users.change_password', $data);


    }
    public function password_update(Request $request, $id)
    {
        $input = [
            'current_password' => Input::get('current_password'),
            'new_password' => sha1(md5(Input::get('new_password'))),
            'confirm_new_password' => sha1(md5(Input::get('confirm_new_password')))
        ];


        if(Session::get('user')[0]->password == sha1(md5($input['current_password'])))
        {
            $user = User::where('id', $id)->update(['password' => sha1(md5(Input::get('new_password')))]);
            if ($user) {
                Session::flash('success', 'Password updated successfully');
                Session::forget('user');
                //Session::flush();
                $user=User::where('id', $id)->get();
                Session::put('user', $user);

            } else {
                Session::flash('error', 'Something went wrong, try again');
            }

            return redirect()->back();
        }
        else
            {
                Session::flash('error', 'Invalid current password');
                return redirect()->back()->withErrors(['current_password' => 'Invalid Password']);
            }


        //dd($request->all());

        /*$rules =
            [
                'current_password' => 'required',
                'new_password' => 'required|min:2',
                'confirm_new_password' => 'required|min:2'
            ];

        $messages =
            [
                'current_password.required' => 'Password required',
                'new_password.required' => 'New Password required',
                'new_password.min' => 'Password must be at least :min character',
                'confirm_new_password.required' => 'Confirm Password required'
            ];

        $this->validate($request, $rules, $messages);*/





    }
}
