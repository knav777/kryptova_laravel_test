<link rel="stylesheet" href="{{asset('css/main.css')}}">
@extends('layouts.app')

@section('content')
<div class="container-center">
    <h2>Students:</h2>

    <form method="POST" action="{{ route( 'students.update', $student->id ) }}">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
            </tr>
            <tr>
                <td>{{ $student->id }}</td>
                <td><input type="text" name="first_name" value="{{ $student->first_name }}"></td>
                <td><input type="text" name="last_name" value="{{ $student->last_name }}"></td>
                <td><input type="text" name="address" value="{{ $student->address }}"></td>
            </tr>  
            <tr>
                <td colspan="4" align="right"><input type="submit" value="Update"></td>
            </tr> 
        </table>
    </form>
</div>
@endsection