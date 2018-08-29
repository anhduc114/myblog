@extends('main')

@section('title','| Homepage')
{{--
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="styles.css"
    @endsection
--}}

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Welcome to my blog!</h1>
                <p class="lead">Ty for visiting :)</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="Post">
                <img src="{{asset('images/'. $post->image)}}" height="400" width="800" class="defaultimg"/>

                <h3><strong>{{$post->title}}</strong></h3>
                <p class="author-time"><span class="glyphicon glyphicon-calendar"> </span>  {{date('M j,Y', strtotime($post->created_at))}}</p>
                <p>{{substr($post->body,0,300)}}{{strlen($post->body) >300 ? "..." : ""}}</p>
                <a class="btn btn-primary " href="{{url('blog/'.$post->slug)}}" role="button">Read more</a>
                <hr>
            </div>
                @endforeach
        </div>


        {{--<div class="row">--}}
            {{--<div class="col-md-8">--}}
                    {{--@foreach($posts as $post)--}}
                    {{--<div class="thumbnail">--}}

                    {{--<img src="..." alt="..." height="220" width="400" class="homepageimg">--}}
                        {{--<h3><strong>{{$post->title}}</strong></h3>--}}
                        {{--<p>{{substr($post->body,0,300)}}{{strlen($post->body) >300 ? "..." : ""}}</p>--}}
                        {{--<p><a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary" role="button">Read more</a> </p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
        <div class="col-md-3 col-md-offset-1">
            <h3>Side bar</h3>
        </div>
        <div/>
    </div>
@endsection

{{--@section('scripts')
    <link rel="stylesheets" type="text/css"
    <script src="js/scripts.js"></script>
@endsection--}}
