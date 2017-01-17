<h1>this is create page for id {{$id}}</h1>

<div class="row">
    <div class="col-md-offset-2 col-md-8">

    </div>
</div>
<div class="col-md-10 col-md-offset-2">

    {!! Form::open(['route'=> 'collection.store','class'=>'collection-form']) !!}

    {{ Form::hidden('user_id',auth()->user()->id) }}
    {{ Form::hidden('album_id',$id) }}
    {{ Form::submit('Add to collection') }}


    {!! Form::close() !!}
</div>

