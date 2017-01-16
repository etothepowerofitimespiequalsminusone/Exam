@extends('base')

@section('title',' - edit')

@section('content')

    <h1>{{ $album->title }}</h1>

    {!! Form::model($album, ['route' => ['album.update',$album->id],'method'=>'PUT']) !!}

    {{ Form::label('title','Title:') }}
    {{ Form::text('title',null) }}

    {{ Form::label('artist','Artist:') }}
    {{ Form::text('artist',null) }}

    {{ Form::label('released','Released:') }}
    {{ Form::text('released',null) }}

    {{ Form::label('albumUrl','Image url') }}
    {{ Form:: text('albumUrl',null) }}


    //got to add album url or upload image,
    {{--that means I also have to update the database schema,  migration refresh etc.--}}



    {!! Form::close() !!}

@endsection