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
            <div class="Post">
                <h3>Post Title</h3>
                <p>Free content here....</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Read more</a>
            </div>
            <hr>
            <div class="Post">
                <h3>Post Title</h3>
                <p>Free content here....</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Read more</a>
            </div>
            <hr>
            <div class="Post">
                <h3>Post Title</h3>
                <p>Free content here....</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Read more</a>
            </div>
            <hr>
            <div class="Post">
                <h3>Post Title</h3>
                <p>Free content here....</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Read more</a>
            </div>
        </div>

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
