@extends('base')
@section('content')


    <h2><a href='{{ url('collect',$album->id) }}'>Add to my collection</a></h2>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>{{ $album->title }}</h1>
        <img src="http://images.genius.com/9d87abf66835582680a63b5e7939d7b6.960x960x1.png" width="500" height="500">
        <p>{{ $album->artist }}</p>
        <h5>{{$album->created_at}}</h5>
        <img src="{{ $album->albumUrl }}" alt="{{ $album->title }}">
    </div>

</div>
<div class="row">
    <div class="col-md-1">
        {!! Form::open(['route'=>['album.destroy',$album->id], 'method'=>'DELETE']) !!}

        {!! Form::submit('Delete',['class'=>'btn btn-default']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection

