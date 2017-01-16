/**
 * Created by PhpStorm.
 * User: Laganovskis
 * Date: 10/31/2016
 * Time: 8:36 PM
 */
@extends('base')
@section('title','itunes')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Search for stuff in apple api</h1>
        </div>
        <div class="panel-body">
            <div class="row col-md-8 col-md-offset-2">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="term" name="term">
                        <button type="submit" class="btn btn-default">Search</button>
                    </div>

                </form>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @if(empty($results))
                        <h3>did not find anything that matches your search</h3>
                    @else
                    <ul class="results">
                        @foreach($results as $result)
                            <a href="{{ $result->collectionViewUrl }}">{{ $result->artistName }} : {{ $result->collectionName}}</a>
                            <img src="{{ $result->artworkUrl100 }}"/>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection