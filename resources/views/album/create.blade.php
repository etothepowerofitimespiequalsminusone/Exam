@extends('base')

@section('title',' Create new albums')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <hr>
            {!! Form::open(['route' => 'album.store','data-parsley-validate'=>'']) !!}
            {{Form::label('title','Album Title:')}}
            {{Form::text('title',null, array('class' => 'form-control','required'=>'','maxlength'=>'100'))}}

            {{Form::label('artist','Artist:')}}
            {{Form::text('artist',null, array('class'=>'form-control','required'=>'','maxlength'=> '100'))}}

            {{Form::label('released','Album released:')}}
            {{Form::date('released',null, array('class'=>'form-control','required'=>''))}}

            {{Form::label('albumUrl','Url:')}}
            {{Form::text('albumUrl',null, array('class'=>'form-control','required'=>''))}}

            {{Form::label('genre','Genre:')}}
            {{Form::text('genre',null, array('class'=>'form-control','required'=>''))}}


            {{ Form::submit('Submit album', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:10px')) }}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <form method="post" action="{{ route('album.store',$album->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="file" name="image">
            <button type="submit">Save image</button>
        </form>
    </div>

@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection