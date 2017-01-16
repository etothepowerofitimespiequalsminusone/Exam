@extends('base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h1>this is admin page!</h1>
            <ul>
                <li><a href="{{ route('admin.albums') }}">All albums</a></li>
            </ul>

        </div>
    </div>
@endsection