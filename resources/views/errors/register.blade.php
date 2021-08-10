<h2>An error occurred in the registration process:</h2>

<p>Error: {{$error}}</p>

@if( $module === 'students' )
    <a href="{{route('students.create')}}">Try again</a>
@else
    <a href="{{route('users.create')}}">Try again</a>
@endif