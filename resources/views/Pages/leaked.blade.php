@extends('base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            @foreach($albumnames as $album)
                <li>{{$album}}</li>
            @endforeach
        </div>
    </div>
@endsection