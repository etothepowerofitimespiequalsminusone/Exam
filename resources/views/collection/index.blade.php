@extends('base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h1>My Albums</h1>
            <ul>
                @foreach($albums as $album)
                    <a href="{{ route('album.show',$album->id) }}"><li>{{$album->title}}</li></a>
                @endforeach
            </ul>
        </div>
    </div>
@endsection