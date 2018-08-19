
@extends('main')
@section('titie', '| View Post')

@section('content')

   <div class="row">
       <div class="col-md-8">
           <h1>{{$post->title}}</h1>
           <p class="lead">{{$post->body}}</p>
       </div>

       <div class="col-md-4">
           <div class="well">
               <dl class="dl-horizontal">
                   <label>Url:</label>
                   <p><a href="{{ route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</dd></p>
               </dl>
               <dl class="dl-horizontal">
                   <label>Category:</label>
                   <p>{{$post->category->name}}</p>
               </dl>

               <dl class="dl-horizontal">
                   <label>Create At:</label>
                   <p>{{date('M j, Y H:ia'), strtotime($post->created_at)}}</p>
               </dl>
               <dl class="dl-horizontal">
                   <label>Last updated:</label>
                   <p>{{date('M j, Y H:ia'), strtotime($post->updated_at) }}</p>
               </dl>
               <hr>
               <div class="row">
                   <div class="col-sm-6">
                       {!! Html::linkRoute('posts.edit','Edit',array($post->id), array('class' =>'btn btn-primary btn-block')) !!}
                       {{--<a href="#" class="btn btn-primary btn-block">Edit</a>--}}
                   </div>
                   <div class="col-sm-6">
                       {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                       {{--{!! Html::linkRoute('posts.destroy','Delete',array($post->id), array('class' =>'btn btn-danger btn-block')) !!}--}}

                       {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                       {!! Form::close() !!}
                       {{--<a href="#" class="btn btn-primary btn-danger">Delete</a>--}}
                   </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{Html::linkRoute('posts.index','<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing'])}}
                        </div>
                    </div>
               </div>
           </div>

       </div>
   </div>
    @endsection
