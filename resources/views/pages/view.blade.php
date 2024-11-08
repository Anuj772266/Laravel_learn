@extends('pages.layout')

@section('title')
 User Details
@endsection

@section('content')
<table class="table table-striped table-bordered">
    <tr>
        <th>Name: </th>
        <td>{{ $user->name  }}</td>
    </tr>
    <tr>
        <th>Email: </th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>Age: </th>
        <td>{{ $user->age }}</td>
    </tr>
    <tr>
        <th>City: </th>
        <td>{{ $user->city }}</td>
    </tr>
</table>
<div class="row">
    <div class="col-4">
        <a href="{{route('users.index')}}" class="btn btn-danger btn-sm" value="back">back</a>
    </div>
</div>
@endsection
