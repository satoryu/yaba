@extends('layouts.app')

@section('title', 'Welcome to YAVA!')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-header">
                    <h1>YABA</h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('login') }}" class="btn btn-success">
                        <i class="glyphicon glyphicon-log-in"></i> Login with GitHub
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection