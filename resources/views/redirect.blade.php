@extends('base')
@section('content')
    <div class="panel" style="color: red">
        <strong>Only admins allowed here! Are you an admin?</strong>
    </div>
@if(!Auth::check())
<a href="{!! route('login') !!}">click here to log in</a>
@endif
@endsection