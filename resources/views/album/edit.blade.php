@extends('base')
@section('title','Edit album')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>{{ $album->title }}</h1>
                    <h2>{{ $album->artist }}</h2>
                    @if($album->albumUrl != '')
                        <img src="{{ $album->albumUrl }}" alt="{{ $album->title }}">
                    @else
                        <strong>we need an album image</strong>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 form-group">
                    {!! Form::model($album, ['route' => ['album.update',$album->id],'method'=>'PUT']) !!}

                    {{ Form::label('title','Title:') }}
                    {{ Form::text('title',null,array('class' =>'form-control')) }}

                    {{ Form::label('artist','Artist:') }}
                    {{ Form::text('artist',null,array('class' =>'form-control')) }}

                    {{ Form::label('released','Released:') }}
                    {{ Form::text('released',null,array('class' =>'form-control')) }}

                    {{ Form::label('albumUrl','Image url') }}
                    {{ Form:: text('albumUrl',null,array('class' =>'form-control')) }}

                    {{ Form::label('description','Description') }}
                    {{ Form:: text('description',null,array('class' =>'form-control')) }}

                    {{ Form::submit('Save changes', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:10px')) }}

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 col-md-offset-2">
                    {!! Form::open(['route'=>['album.destroy',$album->id], 'method'=>'DELETE']) !!}

                    {!! Form::submit('Delete',['class'=>'btn btn-default']) !!}

                    {!! Form::close() !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2 form-group">
                    <strong>Upload related images</strong>
                    <form method="post" action="{{ route('albumimage.store',$album->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="album_id" value="{{ $album->id }}">
                        <input type="file" name="image">
                        <button type="submit">Save image</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <ul>
                    @foreach($images as $image)
                        <li><img src="{{ url($image->image_path) }}"/></li>
                    @endforeach
                </ul>
            </div>




        </div>
    </div>
@endsection