@extends('master')

@section('head')
<style>
    .figure-caption{
        font-size: 1.2rem;
        color: #636e72;
    }
    .lead-5{
        font-size: 1.5rem;
        color: #0984e3;
    }
</style>

@endsection

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-12 col-sm-6 col-md-3 col-lg-2 text-center ">
            <img class="figure-img img-fluid rounded" src="images/myPicture3.jpg" alt="" width="200" height="200">
        </div>
        <div class="col-12 col-sm-6 col-md-9 col-lg-10 mt-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
            <p>
                <b>Full Name:</b> Mohammad Ghorbani
            </p>
            <p>
                <b>English Name:</b> Mo
            </p>
            <p>
                <b>Working at:</b> <a href="https://www.novosenso.com/">Novosenso</a>
            </p>
            <p>
                <b>Academic Degree:</b> Master's degree in Computer Engineering from <a href="https://aut.ac.ir/en">Amirkabir University of Technology</a> (Tehran, Iran)
            </p>
            <p>
                <b>Main Expertise:</b> Python/Django, AWS, Docker, Celery, DjangoRestFramework, Redis.
            </p>
            <p>
                <b>Other Experiences:</b> NLP, Fraud Detection, MongoDB, ElasticSearch, Kubernetes, Azure, PHP/Laravel, Bootstrap.
            </p>
            <p>
                <b>Email: </b><a href="mailto:mo.ghorb@gmail.com">mo.ghorb@gmail.com</a>
            </p>
            <p>
                <b>LinkedIn: </b><a href="https://www.linkedin.com/in/gh-m/" target="_blank">gh-m</a>
            </p>
            <p>
                <b>GitHub: </b><a href="https://github.com/moo-gh" target="_blank">moo-gh</a>
            </p>
            <p> 
                <b>Resume: </b><a href="https://www.m-gh.com/Mohammad_Resume_.pdf">Download</a>
            </p>
            <p class="text-success font-weight-normal">
                The source of this website is available at <a href="https://github.com/moo-gh/my-website">GitHub</a>.
            </p>
        </div>
    </div>
@endsection

@section('footer')
<script>
    $("#about").addClass("active");
</script>
@endsection