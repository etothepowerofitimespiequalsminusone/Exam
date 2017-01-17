@extends('base')
@section('content')
        <div class="panel panel-default">
            <div class="panel-body">
                @foreach($albums as $album)
                    <div class="panel-body article" onclick="window.document.location='{{ route('album.show',$album->id) }}';">
                        <a href="{{ route('album.show',$album->id) }}"><strong>{{ $album->title }}</strong></a>
                        <p>{{ $album->description }}</p>
                    </div>
                @endforeach
                {{ $albums->links() }}
            </div>
        </div>

@endsection