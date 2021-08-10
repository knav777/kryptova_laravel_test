<link rel="stylesheet" href="{{asset('css/main.css')}}">
@extends('layouts.app')

@section('content')
<div class="container-center">
    <h2>Students:</h2>

    @if( $students->count() > 0 )

        <table border="1">
            <tr align="center">
                <th>ID</th>
                <th>Name Full</th>
            </tr>
            
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->first_name }} - {{ $student->last_name }}</td>
                <form method="POST" action="{{ route( 'students.destroy', $student->id ) }}">
                    @csrf
                    @method('DELETE')
                    <td><input type="submit" name="delete" value="delete"></td>
                </form>
                <td><a href="{{route( 'students.edit', $student->id )}}">Update</a></td>
            </tr>   
            @endforeach

        </table>

        {{ $students->links() }}

    @else
        <p>No students registered</p>
    @endif

</div>

<div class="container-center">
    <a href="{{route('students.create')}}">Add a Student</a>
</div>
@endsection