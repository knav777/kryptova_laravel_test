<link rel="stylesheet" href="{{asset('css/main.css')}}">
@extends('layouts.app')

@section('content')
<div class="container-center">
    <h2>Students:</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name Full</th>
        </tr>
        
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->first_name }} - {{ $student->last_name }}</td>
        </tr>   
        @endforeach

    </table>

    {{ $students->links() }}
</div>
@endsection