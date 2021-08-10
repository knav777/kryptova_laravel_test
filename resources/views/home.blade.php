<link rel="stylesheet" href="{{asset('css/main.css')}}">
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(auth()->user()->role === 'admin')
                        {{ __('You are a ADMIN !!') }}
                        <hr>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-center">
    <hr>
    <a href="{{route('students.index')}}">Students</a>
    <hr>
    <a href="{{route('employees.index')}}">Employees</a>
</div>
@endsection
