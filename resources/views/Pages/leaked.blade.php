@extends('base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            @foreach($albums as $album)
                <a href="{{ route('album.show',$album->id) }}"><li>{{$album->title}}</li></a>
            @endforeach
        </div>
    </div>
@endsection