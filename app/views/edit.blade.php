@extends('layout')

@section('content')
<div class="page-header">
    <h1>Edit Registration <small>Make changes in Registration page!</small></h1>
</div>

<form action="<?php echo route('handleEdit'); ?>" method="post" role="form">

<input type="hidden" value="{{ $reg1->id }}" name="id"/>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="{{ $reg1->username }}" />
    </div>


    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="{{ $reg1->email }}" />
    </div>

    <input type="submit" value="Save" class="btn btn-primary" />
    <a href="<?php echo route('dashboard'); ?>" class="btn btn-link">Cancel</a>
</form>
@stop
