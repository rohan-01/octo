@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Registration Page</h1>
    </div>


    @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif



    <form action="{{ action('RegistrationController@handleRegister') }}" method="post" role="form">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="{{ Input::old('username') }}" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" />
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ Input::old('email') }}" />
        </div>
        
        <div class="checkbox">
            <label for="complete">
                <input type="checkbox" name="complete"/> Complete?
            </label>
        </div>
        <input type="submit" value="Register" class="btn btn-primary" />
        <a href="{{ action('RegistrationController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop
