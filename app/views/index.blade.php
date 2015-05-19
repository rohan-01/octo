@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Registration Details</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('RegistrationController@register') }}" class="btn btn-primary">Register User</a>
        </div>
    </div>

        @if ($reg->isEmpty())
        <p>There are no Registration :(</p>
        @else

      <table class="table table-striped">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Complete</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reg as $reg)
                <tr>
                    <td>{{ $reg->username }}</td>
                    <td>{{ $reg->password }}</td>
                    <td>{{ $reg->email }}</td>
                    <td>{{ $reg->complete ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ action('RegistrationController@edit', $reg->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('RegistrationController@delete', $reg->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
   @endif 
@stop