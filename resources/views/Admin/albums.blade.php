@extends('base')
@section('content')
<ul>
    @foreach($albums as $album)
        <li><a href="{{ route('album.edit',$album->id) }}">{{ $album->title }}</a>
        </li>
    @endforeach
</ul>




@endsection