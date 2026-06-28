@extends('posts.master')

@section('head')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<style>
    .post-title {
        font-size: 1.65rem !important;
    }
    @media screen and (min-width: 0px) and (max-width: 480px) {
        .post-title {
            font-size: 1.05rem !important;
        }
    }
</style>

@endsection


@section('content')
    <div class="text-center">
    <div class="alert alert-info my-5">For seeing the total list of my projects, please check my <a href="https://github.com/moo-gh" target="_blank" class="alert-link">GitHub account</a>.</div>
    </div>
    @foreach($posts as $post)
    @include('posts.post')
        {{-- @if(!$loop->last) --}}
            <div style="height: 50px;"></div>
        {{-- @endif --}}
    @endforeach
@endsection

@section('footer')
<script>
    $("#projects").addClass("active");
</script>
@endsection