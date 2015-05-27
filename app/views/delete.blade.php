@extends('layout')

@section('content')
<div class="page-header">
    <h1>Delete {{ $reg->username }} <small>Are you sure?</small></h1>
</div>
<form action="<?php echo route('handleDelete'); ?>" method="post" role="form">
    <input type="hidden" name="reg" value="{{ $reg->id }}" />
    <input type="submit" class="btn btn-danger" value="Yes" />
    <a href="<?php echo route('dashboard'); ?>" class="btn btn-default">No!</a>
</form>
@stop