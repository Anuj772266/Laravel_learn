@extends('pages.layout')

@section('title')
 Update User Data
@endsection

@section('content')
{{-- <pre>
    @php
        print_r($errors->all());
    @endphp
</pre> --}}
<form action="{{ route('users.update', $users->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="username"> User Name</label>
        <input type="text" class="form-control" name="username" value="{{$users->name}}">
    </div>
    <div class="mb-3">
        <label for="useremail"> User Email</label>
        <input type="text" class="form-control" name="useremail" value="{{$users->email}}">
    </div>
    <div class="mb-3">
        <label for="userage"> User Age</label>
        <input type="text" class="form-control" name="userage" value="{{$users->age}}">
    </div>
    <div class="mb-3">
        <label for="usercity"> User City</label>
        <input type="text" class="form-control" name="usercity" value="{{$users->city}}">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Update" name="">
    </div>
</form>
@endsection
