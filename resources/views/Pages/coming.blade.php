@extends('base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <ul>
                @foreach($albums as $album)
                    <li><a href="{{ route('album.show',$album->id) }}">{{$album->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection