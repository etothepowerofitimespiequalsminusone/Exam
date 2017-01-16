@extends('base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h1>Here is the list of albums you follow</h1>
            <ul>

                {{--@foreach($collection as $item)--}}
                {{--<li>{{ $item['album_id'] }}</li>--}}
                {{--@endforeach--}}
                @foreach($albums as $album)
                    <li>{{ $album->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection