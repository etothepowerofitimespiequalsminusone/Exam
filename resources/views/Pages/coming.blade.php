@extends('base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            @foreach($albums as $album)
                <li>{{$album->title}}</li>
            @endforeach
        </div>
    </div>
@endsection