<?php

// app/controllers/RegistrationController.php

Class RegistrationController extends BaseController
{
    public function index()
    {
     //show listing of registrations
        $reg = Registration::all();
        
        return View::make('index',compact('reg'));  
    }
    public function register()
    {
        //show registration page
        
        return View::make('register');
        
    }
    public function handleRegister()
    {
        
       //handle register form submission and then validate
        $rules = array(
            'username'       => 'required',
            'password'       => 'required',
            'email'          => 'required|email',
            'complete'       => 'required'
        );
        
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('/register')
                ->withErrors($validator)
               ->withInput(Input::except('password'));
        } 
        else 
            {
        $reg = new Registration;
        $reg->username        = Input::get('username');
        $reg->password        = Input::get('password');
        $reg->email           = Input::get('email');
        $reg->complete        = Input::has('complete');
        $reg->save();

        return Redirect::action('RegistrationController@index');
        
      }
    }
    public function edit(Registration $reg)
    {
       //show the registration edit page 
        return View::make('edit', compact('reg'));
        
    }
    public function handleEdit()
    {
        // Handle edit form submission.
        
        $reg = Registration::findOrFail(Input::get('id'));
        $reg->username        = Input::get('username');
        $reg->password        = Input::get('password');
        $reg->email           = Input::get('email');
        $reg->complete        = Input::has('complete');
        $reg->save();
        
        return Redirect::action('RegistrationController@index');

    }
    public function delete(Registration $reg)
    {
        //Show delete confirmation page.
        return View::make('delete',compact('reg'));
        
    }
    public function handleDelete()
    {
        // Handle the delete confirmation.
        
        $id = Input::get('reg');
        $reg = Registration::findOrFail($id);
        $reg->delete();

        return Redirect::action('RegistrationController@index');
     }
}