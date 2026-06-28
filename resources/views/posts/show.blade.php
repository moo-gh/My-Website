@extends('posts.master')

@section('head')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    function test(id,text,self)
    {
        parent=$('#comment'+id);
        parent.append(text);
        child=$('#comment'+self);
        if(parent.hasClass('alert-primary'))
        {
            child.addClass("alert-secondary");
        }
        else if(parent.hasClass('alert-secondary'))
        {
            child.addClass("alert-primary");
        }
        
    }
</script>
<style>
    ::placeholder { /* Most modern browsers support this now. */
        color:    #74b9ff !important;
    }
    @media screen and (min-width: 480px) {
        .blog-body{
            padding:0px 15%;
            font-size: 1.4rem;
            font-family: Georgia,Times,Times New Roman,serif; 
        }
    }
    @media screen and (min-width: 0px) and (max-width:480px) {
        .blog-body{
            padding:0px 2%;
            font-family: Georgia,Times,Times New Roman,serif; 
            font-size: 1.2rem;
        }
    }
    @media screen and (min-width: 480px) {
        .comment-body{
            padding:0px 15%;
        }
        .comment-date{
            font-size: 0.8rem;
        }
    }
    @media screen and (min-width: 0px) and (max-width:480px) {
        .comment-body{
            padding:0px 2%;
        }
        .comment-date{
            font-size: 0.7rem;
        }
    }
    video{
        max-width:90% !important;
    }
    .blog-body img{
            max-width:90% !important;
    }   
    .display-4{
    font-size: 3.5rem !important;
    }
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
@endsection

@section('content')



<div class="my-5">
    <a class="display-4" style="text-decoration: none;" href="/posts/{{$post->link}}">{{$post->title}}</a>
    <div class="ml-1" style="color: #0fb39e; font-size: 0.8rem;">{!!$post->created_at->toFormattedDateString()!!}</div>
    <hr>



    <div class="mt-2 blog-body">
        {!!$post->body!!}
    </div>



    <div class="comment-body" id="comments">
        <div class="row">
            <h4 class="col mb-0">Comments</h4>
            <div class="col text-right mr-3 mt-3 mt-sm-0" >
                <span style="position: absolute; bottom: 0;">
                        <div class="row"><a href=""><i class="far fa-comment"></i> {!!$post->countComments!!}</a></div>
                </span>
            </div>
        </div>
        <hr>
        @if(Session::has('message'))
            <div id="alert" class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</div>
        @endif
        <form action="/posts/{{$post->link}}/comments" method="POST">
            @csrf
            @include('posts.errors')
            <div class="form-group">
                <textarea placeholder="Any ideas or thoughts?" id="body" name="body" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Send</button>
            </div>
        </form>

        @foreach ($post->comments as $comment)
            @if($comment->publish)
                @if(@isset($comment->replyTo))
                    <script>
                        htmlText='<div class="alert mt-2 comment-text" id="comment{{$comment->id}}"><div style="color: black;">{{$comment->body}}</div><div class="mt-2 d-flex justify-content-between align-items-end comment-date" style="color:#999;"><div class="d-inline"><button id="{{$comment->id}}" href="" class="reply btn btn-secondary btn-sm">Reply</button></div><div class="d-inline">{{$comment->created_at->toFormattedDateString()}}</div></div><div id="c{{$comment->id}}"></div></div>';
                        test({{$comment->replyTo}},htmlText,{{$comment->id}}); 
                    </script>
                @else
                    <div class="alert alert-primary comment-text" id="comment{{$comment->id}}">
                        <div style="color: black;">{{$comment->body}}</div>
                        <div class="mt-2 d-flex justify-content-between align-items-end comment-date" style="color:#999;">
                            <div class="d-inline"><button id="{{$comment->id}}" href="" class="reply btn btn-secondary btn-sm">Reply</button></div>
                            <div class="d-inline">{{$comment->created_at->toFormattedDateString()}}</div>
                        </div>
                        <div id="c{{$comment->id}}"></div>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
</div>
@endsection

@section('footer')
<script>
    $('.reply').click(function(){
        divId=$(this).attr('id');
        replyHtml2='<form class="mt-2" action="/posts/{{$post->link}}/comments" method="POST">@csrf <input type="hidden" name="childComment" value="true"> <input type="hidden" name="parent" value="'+divId+'"> @include("posts.errors")<div class="form-group"><textarea id="body" name="body" class="form-control w-100" required></textarea></div><div class="form-group"><button class="btn btn-secondary btn-sm" type="submit">Reply</button></div></form>';
        $(this).remove();
        $("#c"+divId).html(replyHtml2);
    });
</script>
@endsection