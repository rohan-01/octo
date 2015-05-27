@extends('layout')


@if ($errors->has())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{ $error }}<br>        
    @endforeach
</div>
@endif

<form action="<?php echo route('handleLogin'); ?>" method="post" role="form">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="{{ Input::old('username') }}" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" />
    </div>

    <input type="submit" value="Login" class="btn btn-primary" />
    <a href="<?php echo route('main'); ?>" class="btn btn-link">Cancel</a>

</form>
