<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <span class="navbar-brand text-primary" href="#">
            <img src="/images/m2.png" width="30" height="30" class="d-inline-block align-top" alt="">
            M-GH
        </span>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" role="navigation">
            <ul class="navbar-nav mr-auto">
                <!-- <li id="home" class="nav-item">
                    <a class="nav-link " href="/">Home <span class="sr-only">(current)</span></a>
                </li> -->
                <li id="projects" class="nav-item">
                    <a class="nav-link" href="/projects">Projects</a>
                </li>
                <li id="about" class="nav-item">
                    <a class="nav-link" href="/contact">Contact Me</a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a type="button" class="btn btn-success btn-sm" href="/Mo_Resume.pdf">
                        Download CV
                    </a>
                </li>
            </ul>
            <form action="/search" method="post" class="form-inline my-2 my-lg-0">
                @csrf
                <input name="keywords" class="form-control mr-sm-2" type="search" placeholder="like: Python or Django" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
