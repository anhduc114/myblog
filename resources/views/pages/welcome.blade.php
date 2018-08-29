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
                <p class="lead">Fuk u for visiting :)</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
                    <div class="row">
                    <div class="leftcolumn">
                        <div class="card">
                            <img src="{{asset('images/'. $post->image)}}" height="400" width="800" class="defaultimg"/>
                            <h2><strong>{{$post->title}}</strong></h2>

                            <p class="author-time"><span class="glyphicon glyphicon-calendar"> </span>  {{date('M j,Y', strtotime($post->created_at))}}</p>

                            <p>{{substr($post->body,0,300)}}{{strlen($post->body) >300 ? "..." : ""}}</p>
                            <a class="btn btn-primary " href="{{url('blog/'.$post->slug)}}" role="button">Read more</a>

                        </div>
                    </div>
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
            <div class="rightcolumn">
                <div class="card">
                    <h3>Popular Post</h3>
                    <div class="fakeimg"><p>Image</p></div>
                    <div class="fakeimg"><p>Image</p></div>
                    <div class="fakeimg"><p>Image</p></div>
                </div>

                <div class="card">
                    <h3>Tags</h3>
                    @foreach($tags as $tag)
                        <a href="{{route('tags.show', $tag->id)}}"><span class = "label label-default">{{$tag->name}}</span></a>

                    @endforeach
                </div>

                <div class="card">
                    <h3>Categories</h3>

                @foreach ($categories as $category)
                        <tr>

                            <th>{{$category->id}}</th>

                            <td>{{$category->name}}</td>
                        </tr>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
        <div/>
    </div>
@endsection

{{--@section('scripts')
    <link rel="stylesheets" type="text/css"
    <script src="js/scripts.js"></script>
@endsection--}}

