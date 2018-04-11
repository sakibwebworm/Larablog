<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Personal Blog a Blogging Category Flat Bootstarp  Responsive Website Template | Home :: w3layouts</title>
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Personal Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"
    />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!----webfonts---->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet' type='text/css'>
    <!----//webfonts---->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--end slider -->
    <!--script-->
    <script type="text/javascript" src="{{ URL::asset('js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/easing.js') }}"></script>
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
            });
        });
    </script>
    <!---->

</head>
<body>
<!---header---->
<div class="header">
    <div class="container">
        <div class="logo">
            <a href="index.html"><img src="images/logo.jpg" title="" /></a>
        </div>
        <!---start-top-nav---->
        <div class="top-menu">
            <div class="search">
                <form>
                    <input type="text" placeholder="" required="">
                    <input type="submit" value=""/>
                </form>
            </div>
            <span class="menu"> </span>
            <ul>
                <li class="active"><a href="index.html">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="contact.html">CONTACT</a></li>
                <div class="clearfix"> </div>
            </ul>
        </div>
        <div class="clearfix"></div>
        <script>
            $("span.menu").click(function(){
                $(".top-menu ul").slideToggle("slow" , function(){
                });
            });
        </script>
        <!---//End-top-nav---->
    </div>
</div>
<!--/header-->
<div class="single">
    <div class="container">
        <div class="col-md-8 single-main">
            <div class="single-grid">
                <img src="{{$singlePost->image_path}}" alt=""/>
                <p>{{$singlePost->body}} </div>
            <ul class="comment-list">
                <h5 class="post-author_head">Written by <a href="#" title="Posts by admin" rel="author">{{$singlePost->user->name}}</a></h5>
                <li><img src="{{$singlePost->user->img_path}}" class="img-responsive" alt="">
                    <div class="desc">
                        <p>View all posts by: <a href="#" title="Posts by admin" rel="author">{{$singlePost->user->name}}</a></p>
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
            @foreach($singlepostComments as $comment)
            <ul class="comment-list">
                <h5 class="post-author_head">Commented By <a href="#" title="Posts by admin" rel="author">{{$comment->name}}</a></h5>
                <h5 class="post-author_head pull-right">Commented on {{ \Carbon\Carbon::parse($comment->posted_at)->toFormattedDateString() }}</h5>
                <li><img src="{{$comment->img_path}}" class="img-responsive" alt="">
                    <div class="desc">
                        <p>{{$comment->content}}</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
            @endforeach
            <div class="content-form">
                <h3>Leave a comment</h3>
                <form>
                    <input type="text" placeholder="Name" required/>
                    <input type="text" placeholder="Email" required/>
                    <input type="text" placeholder="Phone" required/>
                    <textarea placeholder="Message"></textarea>
                    <input type="submit" value="SEND"/>
                </form>
            </div>
        </div>

        @include('frontend.sidebar')
        <div class="clearfix"></div>
    </div>
</div>
</div>
<!---->
<div class="footer">
    <div class="container">
        <p>Copyrights © 2015 Blog All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
    </div>
</div>


