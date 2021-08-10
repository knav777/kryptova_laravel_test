<link rel="stylesheet" href="{{asset('css/main.css')}}">
@extends('layouts.app')

@section('content')
<form action="{{route('students.store')}}" class="container-center" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <h2>New Student</h2>
    </div>
    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input class="form-control" type="text" id="first_name" name="first_name" placeholder="Type your First Name" required>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input class="form-control" type="text" id="last_name" name="last_name" placeholder="Type your last Name">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input class="form-control" type="text" id="address" name="address" placeholder="Type your Address" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection