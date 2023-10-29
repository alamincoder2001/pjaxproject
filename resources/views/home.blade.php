@extends('layouts.app')

@section('content')
<h1>Welcome to the Home Page</h1>
<a href="{{ url('database-backup') }}">Download Backup</a>
@endsection