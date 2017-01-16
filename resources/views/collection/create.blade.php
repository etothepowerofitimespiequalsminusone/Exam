<h1>this is create page for id {{$id}}</h1>

<div class="col-md-10">

    {!! Form::open(['route'=> 'collection.store','class'=>'collection-form']) !!}

    {{ Form::hidden('user_id',auth()->user()->id) }}
    {{ Form::hidden('album_id',$id) }}
    {{ Form::submit('Add to collection') }}


    {!! Form::close() !!}
</div>

