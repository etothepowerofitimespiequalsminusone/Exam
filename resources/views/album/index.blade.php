@extends('base')
{{--@section('title','Newest albums')--}}
@section('content')
    <div class="row table-background">
        <div class="col-md-12">

            <table class="table table-hover">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Artist</th>
                <th>Genre</th>
                </thead>
                <tbody>>
                @foreach($albums as $album)
                    <tr class="clickable-row" onclick="window.document.location='{{ route('album.show',$album->id) }}';">
                        <th>{{$album->id}}</th>
                        <td>{{$album->title}}</td>
                        <td>{{ substr($album->artist,0,50)}}{{ strlen($album->artist) > 50 ? "..." : "" }}</td>
                        <td>{{ $album->genre }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $albums->links() }}
        </div>
    </div>

    @if(!Auth::guest() && Auth::user()->isAdmin())
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('album.create') }}" class="btn btn-default btn-block btn-toolbar">Create new album</a>
            </div>
            <div class="col-md-2">
                <a class="btn btn-default btn-block btn-toolbar" href="{{ route('album.create') }}">Refresh page</a>
            </div>
        </div>
    @endif
@endsection