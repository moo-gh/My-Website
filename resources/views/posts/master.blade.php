<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mohammad Ghorbani</title>
        <link rel="canonical" href="{{ url()->current() }}">
        <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
        <style>
        .display-4{
            font-size: 2rem;
        }
        @media screen and (min-width: 480px) {
            .post-body{
                padding:0px 15%;
                font-size: 1.4rem;
                font-family: Georgia,Times,Times New Roman,serif; 
            }
        }
        @media screen and (min-width: 0px) and (max-width:480px) {
            .post-body{
                padding:0px 2%;
                font-family: Georgia,Times,Times New Roman,serif; 
                font-size: 1.2rem;
            }
            .post-img{
                width: 80px;
                height: 80px;
            }
            .post-title{
                font-size: 1.2rem !important;
            }
        }
        .post-body img{
                max-width:90% !important;
    
        }   
        video{
            width: 90%;
        }
        
    </style>
    @yield('head')
</head>
<body>
    
    @include('navbar')
    
    <div class="container" style="margin-top: 10px;min-height: 85vh;">
        @yield('content')
    </div>
    
    @include('footer')
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    
    @yield('footer')

</body>
</html>