@extends('base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h1>{{ $album->title }}</h1>
            <h2>{{ $album->artist }}</h2>
            @if($album->albumUrl != '')
                <img src="{{ $album->albumUrl }}" alt="{{ $album->title }}">
            @else
                <strong>we need an album image</strong>
            @endif
        </div>
        @if(!Auth::guest())
            <div class="col-md-10 col-md-offset-2">

                {!! Form::open(['route'=> 'collection.store','class'=>'collection-form']) !!}

                {{ Form::hidden('user_id',auth()->user()->id) }}
                {{ Form::hidden('album_id',$album->id) }}
                {{ Form::submit('Add to collection',['class' => 'btn btn-lrg']) }}

                {!! Form::close() !!}
            </div>
        @endif
        <div class="panel-body">
            <h2>Alternative images</h2>
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

