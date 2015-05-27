@extends('layout')

@section('content')
<div class="page-header">
    <h1>Edit Registration <small>Make changes in Registration page!</small></h1>
</div>

<form action="<?php echo route('handleEdit'); ?>" method="post" role="form">
    <input type="hidden" name="id" value="{{ $reg->id }}">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="{{ $reg->username }}" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" name="password" value="{{ $reg->password }}" />
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="{{ $reg->email }}" />
    </div>

    <div class="checkbox">
        <label for="complete">
            <input type="checkbox" name="complete" {{ $reg->complete ? 'checked' : '' }} /> Complete?
        </label>
    </div>
    <input type="submit" value="Save" class="btn btn-primary" />
    <a href="<?php echo route('dashboard'); ?>" class="btn btn-link">Cancel</a>
</form>
@stop
