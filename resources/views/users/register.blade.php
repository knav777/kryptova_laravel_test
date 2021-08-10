<style>
    form{
        min-width: 200px;
        max-width: 800px;
        padding: 10px;
        margin: 20px auto;
    }
</style>

@extends('layouts.app')

@section('content')
    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <h2>Signup</h2>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Type your Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" placeholder="Type your Email" required>
        </div>
        <div class="form-group">
            <label for="dob">DOB:</label>
            <input class="form-control" id="dob" name="dob" type="date" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Type your Pass" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input class="form-control" type="text" id="address" name="address" placeholder="Type your Address" required>
        </div>
        <div class="form-group">
            <label for="role" required>Role:</label>
            <select name="role" class="form-control" id="role">
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
            </select>
        </div>
        <div class="form-group">
            <label for="picture">Picture:</label>
            <input type="file" id="picture" name="picture" value="Subir imagen"/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection