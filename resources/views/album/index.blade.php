@extends('base')
{{--@section('title','Newest albums')--}}
@section('content')
    @if(!Auth::guest() && Auth::user()->isAdmin())
    <div class="row refresh-button">
        <div class="col-md-8 col-md-offset-2">
            <a class="btn btn-default btn-block btn-toolbar" href="{{ route('album.create') }}">Refresh</a>
        </div>
    </div>
    @endif
    <div class="row table-background">
        <div class="col-md-12">

            <table class="table table-hover">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Artist</th>
                <th>Genre</th>
                {{--<th>Published</th>--}}
                </thead>
                <tbody>>
                @foreach($albums as $album)
                    <tr class="clickable-row" data-href="{{ route('album.show',$album->id) }}">
                        <th>{{$album->id}}</th>
                        <td>{{$album->title}}</td>
                        <td>{{ substr($album->artist,0,50)}}{{ strlen($album->artist) > 50 ? "..." : "" }}</td>
                        <td>{{ $album->genre }}</td>
                        {{--<td>{{ date('M j, Y', strtotime($album->created_at)) }}</td>--}}
                        {{--<td>--}}
                        {{--<a href="{{ route('albums.show',$album->id) }}" class="btn btn-default">view</a>--}}
                        {{--<a href="{{ route('albums.edit',$album->id) }}" class="btn btn-default">edit</a>--}}
                        {{--<a href="{{ route('albums.destroy',$album->id) }}" class="btn btn-default">delete</a>--}}
                        {{--</td>--}}

                        {{--<td>--}}
                        {{--<img src="{{ $album->albumUrl }}" alt="album image">--}}
                        {{--</td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $albums->links() }}
        </div>
    </div>
    <div class="col-md-1">
        <a href="{{ route('album.create') }}" class="btn btn-default btn-lg">create</a>
    </div>
@endsection