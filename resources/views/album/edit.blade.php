@extends('base')

@section('title',' - edit')




@section('content')


    <h1>{{ $album->title }}</h1>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>{{ $album->title }}</h1>
                    <p>{{ $album->artist }}</p>
                    <h5>{{$album->created_at}}</h5>
                    <img src="{{ $album->albumUrl }}" alt="{{ $album->title }}">
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
                    {!! Form::model($album, ['route' => ['album.update',$album->id],'method'=>'PUT']) !!}

                    {{ Form::label('title','Title:') }}
                    {{ Form::text('title',null,array('class' =>'form-control')) }}

                    {{ Form::label('artist','Artist:') }}
                    {{ Form::text('artist',null,array('class' =>'form-control')) }}

                    {{ Form::label('released','Released:') }}
                    {{ Form::text('released',null,array('class' =>'form-control')) }}

                    {{ Form::label('albumUrl','Image url') }}
                    {{ Form:: text('albumUrl',null,array('class' =>'form-control')) }}

                    {{ Form::submit('Save changes', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:10px')) }}

                    {!! Form::close() !!}
                </div>
            </div>


        </div>
    </div>
@endsection