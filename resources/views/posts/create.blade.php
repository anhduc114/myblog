@extends('main')

@section('title','| Create New Post')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(['route' => 'posts.store']) !!}
            {{Form::label('title','Title:')}}
            {{Form::text('title',null,array('class' => 'form-control'))}}

            {{Form::label('slug','Slug:')}}
            {{Form::text('slug',null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'))}}

            {{Form::label('body',"Post Body:")}}
            {{Form::textarea('body',null,array('class' => 'form-control'))}}
            {{Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block'))}}
            {!! Form::close() !!}
        </div>
    </div>

    @endsection
