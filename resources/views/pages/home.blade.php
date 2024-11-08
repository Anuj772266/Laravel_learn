@extends('pages.layout')

@section('title')
All Users Data
@endsection

@section('content')
<a href="{{ route('users.create') }}" class="btn btn-success btn-sm mb-3">Add New</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>s.no</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>City</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->age }}</td>
            <td>{{ $user->city }}</td>
            <td class="d-flex justify-content-between">
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm me-2">View</a>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-2">
    {{ $users->links() }}
</div>
@endsection
