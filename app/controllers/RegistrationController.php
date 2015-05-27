<?php

// app/controllers/RegistrationController.php

Class RegistrationController extends BaseController {

    public function index() {

        return View::make('index');
    }

    public function dashboard() {
        //show listing of registrations
        $reg = Registration::all();

        return View::make('dashboard', compact('reg'));
    }

    public function handleRegister() {

        //handle register form submission and then validate

        $rules = array(
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'complete' => 'required'
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
            $reg->complete = Input::has('complete');
            $reg->save();

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


        //echo dd('fhfgfgf');
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('login')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {

            // create our user data for the authentication

            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            //echo "<pre>"; print_r($userdata);
            //echo !Auth::attempt(array('email' => 'sum@ymail.com', 'password' => Input::get('password')));
            //exit;
            // attempt to do the login
            //print_r(Auth::attempt($userdata)); exit;

            if (Auth::attempt($userdata)) {


                $name = Input::get('username');

                Session::put('id', $name);

                //Session::put('username', $userdata['username']);

                return Redirect::route('dashboard');
            } else {
                //echo 'ur  here';   exit;
                // validation not successful, send back to form 
                //$var = Session::get('userdata');
                //print_r(Session::get('username')); exit;   
                return Redirect::route('login');
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

    public function edit(Registration $reg) {
        //show the registration edit page 
        return View::make('edit', compact('reg'));
    }

    public function handleEdit() {
        // Handle edit form submission.

        $reg = Registration::findOrFail(Input::get('id'));
        $reg->username = Input::get('username');
        $reg->password = Input::get('password');
        $reg->email = Input::get('email');
        $reg->complete = Input::has('complete');
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

}
