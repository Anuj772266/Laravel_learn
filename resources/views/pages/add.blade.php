@extends('pages.layout')

@section('title')
Add New User
@endsection

@section('content')
{{-- <pre>
    @php
        print_r($errors->all());
    @endphp
</pre> --}}
<form action="{{ route('users.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="username"> User Name</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="mb-3">
        <label for="useremail"> User Email</label>
        <input type="text" class="form-control" name="useremail">
    </div>
    <div class="mb-3">
        <label for="userage"> User Age</label>
        <input type="text" class="form-control" name="userage">
    </div>
    <div class="mb-3">
        <label for="usercity"> User City</label>
        <input type="text" class="form-control" name="usercity">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection
