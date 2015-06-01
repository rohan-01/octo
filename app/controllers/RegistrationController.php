<?php

// app/controllers/RegistrationController.php

Class RegistrationController extends BaseController {

    private $pagination = 5;

    public function index() {

        return View::make('index');
    }

    public function dashboard() {
        //show listing of registrations
        
        //return View::make('dashboard', compact('reg'));
        //$reg = Registration::all();
        $reg = Registration::paginate($this->pagination);

        return View::make('dashboard')
                        ->with('reg', $reg);
    }

    public function handleRegister() {

        //handle register form submission and then validate

        $rules = array(
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::route('main')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $reg = new Registration;
            $reg->username = Input::get('username');
            $reg->password = Hash::make(Input::get('password'));
            $reg->email = Input::get('email');
            $reg->save();

            // Code for Sending Mail
            //Mail::send('users.mails.welcome', array('username' => Input::get('username')), function($message) {
            //$message->to(Input::get('email'), Input::get('username'))->subject('Welcome to the Laravel 4 Auth App!');
            //});

            return Redirect::route('login');
        }
    }

    public function login() {

        return View::make('login');
    }

    public function handleLogin() {

        //handle validation of form

        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('login')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {

            // create user data for the authentication

            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            //echo "<pre>"; print_r($userdata);

            if (Auth::attempt($userdata)) {

                $name = Input::get('username');

                Session::put('id', $name);

                //Session::put('username', $userdata['username']);

                return Redirect::route('dashboard');
            } else {

                return Redirect::back()
                                ->withInput(Input::except('password'))
                                ->withErrors(['Username or password is incorrect']);
            }
        }


        if (Session::has('id')) {

            echo Session::get('username');
        }
    }

    public function handleLogout() {
        Auth::logout(); // log the user out of application

        return Redirect::route('login'); // redirect the user to the login screen
    }

    public function home() {

        return View::make('home');
    }

    public function edit(Registration $reg1) {
        //show the registration edit page 
        //return View::make('edit', compact('reg'));
        
        return View::make('edit', compact('reg1'));
    }

    public function handleEdit() {
        // Handle edit form submission.
       
        $reg = Registration::findOrFail(Input::get('id'));
        $reg->username = Input::get('username');
        $reg->email = Input::get('email');
        $reg->save();

        return Redirect::route('dashboard');
    }

    public function delete(Registration $reg) {
        //Show delete confirmation page.
        return View::make('delete', compact('reg'));
    }

    public function handleDelete() {
        // Handle the delete confirmation.

        $id = Input::get('reg');
        $reg = Registration::findOrFail($id);
        $reg->delete();

        return Redirect::route('dashboard');
    }

    public function password() {

        return View::make('change-password');
    }

    public function handlePassword() {

        $rules = array(
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the validation
        if ($validator->fails()) {
            return Redirect::route('change-password')
                            ->withErrors($validator)
                            ->withInput();
        } else {

            $user = User::find(Auth::user()->id);

            $old_password = Input::get('old_password');
            $new_password = Input::get('password');


            if (Hash::check($old_password, $user->getAuthPassword())) {
                $user->password = Hash::make($new_password);

                if ($user->save()) {
                    return View::make('change-password')
                                    ->with('success', 'Your Password is Reset');
                }
            } else {
                return Redirect::route('change-password')
                                ->withErrors('Your old Password is incorrect');
            }
        }
        return Redirect::route('change-password')
                        ->withErrors('Your Password Could not be Changed');
    }

    //public function paging() {
    //$reg = Registration::paginate(5);
    //return View::make('dashboard')->with('reg', $reg);
    //}
}
