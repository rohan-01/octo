@extends('layout')
<a href="<?php echo route('logout'); ?>">Logout</a>
<br/>

<a href="<?php echo route('change-password'); ?>">Change Password</a>

@section('content')
<div class="page-header">

    <h3><?php echo "Hello" . " " . $var = Session::get('id'); ?></h3>

    <h2>Registration Details</h2>

</div>

<div class="panel panel-default">
    <div class="panel-body">

    </div>
</div>

@if ($reg->isEmpty())
<p>There are no Registration :(</p>
@else

<table class="table table-striped">
    <thead>
        <tr>
            <th>User Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reg as $rg)
        <tr>
            <td>{{ $rg->username }}</td>
            <td>{{ $rg->email }}</td>
            <td>
                <a href="{{ action('RegistrationController@edit', $rg->id) }}" class="btn btn-default">Edit</a>
                <a href="{{ action('RegistrationController@delete', $rg->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination"> 
    
   {{ $reg->links() }} 

</div>


@endif 

@stop