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
    .lang-badges {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    .lang-badge {
        padding: 0.35rem 0.75rem;
        font-size: 0.9rem;
        font-weight: 500;
        border-radius: 0.25rem;
        cursor: pointer;
        border: 1px solid #dee2e6;
        background: #fff;
        color: #6c757d;
        transition: all 0.2s;
    }
    .lang-badge:hover {
        border-color: #0984e3;
        color: #0984e3;
    }
    .lang-badge.active {
        background: #0984e3;
        border-color: #0984e3;
        color: #fff;
    }
    .contact-content {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    .contact-content[data-lang="fa"] {
        direction: rtl;
        text-align: right;
        font-family: 'Vazir', 'Tahoma', sans-serif;
    }
</style>
<link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-12 col-sm-6 col-md-3 col-lg-2 text-center">
            <img class="figure-img img-fluid rounded" src="images/myPicture3.jpg" alt="" width="200" height="200">
        </div>
        <div class="col-12 col-sm-6 col-md-9 col-lg-10 mt-3 contact-content" id="contactContent" data-lang="en">
            <div class="lang-badges">
                <span class="lang-badge active" data-lang="en">English</span>
                <span class="lang-badge" data-lang="fa">فارسی</span>
            </div>
            <div data-lang-content="en">
                <p><b>Full Name:</b> Mohammad Ghorbani</p>
                <p><b>English Name:</b> Mo</p>
                <p><b>Working at:</b> <a href="https://www.novosenso.com/">Novosenso</a></p>
                <p><b>Academic Degree:</b> Master's degree in Computer Engineering from <a href="https://aut.ac.ir/en">Amirkabir University of Technology</a> (Tehran, Iran)</p>
                <p><b>Main Expertise:</b> Python/Django, AWS, Docker, Celery, DjangoRestFramework, Redis.</p>
                <p><b>Other Experiences:</b> NLP, Fraud Detection, MongoDB, ElasticSearch, Kubernetes, Azure, PHP/Laravel, Bootstrap.</p>
                <p><b>Email: </b><a href="mailto:mo.ghorb@gmail.com">mo.ghorb@gmail.com</a></p>
                <p><b>LinkedIn: </b><a href="https://www.linkedin.com/in/gh-m/" target="_blank">gh-m</a></p>
                <p><b>GitHub: </b><a href="https://github.com/moo-gh" target="_blank">moo-gh</a></p>
                <p><b>Resume: </b><a href="https://www.m-gh.com/Mohammad_Resume_.pdf">Download</a></p>
                <p class="text-success font-weight-normal">The source of this website is available at <a href="https://github.com/moo-gh/my-website">GitHub</a>.</p>
            </div>
            <div data-lang-content="fa" style="display: none;">
                <p><b>نام:</b> محمد قربانی</p>
                <p><b>نام انگلیسی:</b> مو</p>
                <p><b>محل کار:</b> <a href="https://www.novosenso.com/">نووسنسو</a></p>
                <p><b>مدرک تحصیلی:</b> کارشناسی ارشد مهندسی کامپیوتر از <a href="https://aut.ac.ir/en">دانشگاه صنعتی امیرکبیر</a> (تهران، ایران)</p>
                <p><b>تخصص اصلی:</b> پایتون/جنگو، AWS، داکر، سلری، DjangoRestFramework، ردیس.</p>
                <p><b>سایر تجربیات:</b> پردازش زبان طبیعی، تشخیص تقلب، MongoDB، ElasticSearch، کوبرنتیز، اژور، PHP/لاراول، بوت‌استرپ.</p>
                <p><b>ایمیل: </b><a href="mailto:mo.ghorb@gmail.com">mo.ghorb@gmail.com</a></p>
                <p><b>لینکدین: </b><a href="https://www.linkedin.com/in/gh-m/" target="_blank">gh-m</a></p>
                <p><b>گیت‌هاب: </b><a href="https://github.com/moo-gh" target="_blank">moo-gh</a></p>
                <p><b>رزومه: </b><a href="https://www.m-gh.com/Mohammad_Resume_.pdf">دانلود</a></p>
                <p class="text-success font-weight-normal">منبع این وبسایت در <a href="https://github.com/moo-gh/my-website">گیت‌هاب</a> موجود است.</p>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script>
    $("#about").addClass("active");
    (function () {
        var STORAGE_KEY = 'contact-lang';
        var content = document.getElementById('contactContent');
        var badges = document.querySelectorAll('.lang-badge');

        function setLang(lang) {
            document.querySelectorAll('[data-lang-content]').forEach(function (el) {
                el.style.display = el.getAttribute('data-lang-content') === lang ? '' : 'none';
            });
            content.setAttribute('data-lang', lang);
            badges.forEach(function (b) {
                b.classList.toggle('active', b.getAttribute('data-lang') === lang);
            });
            try { localStorage.setItem(STORAGE_KEY, lang); } catch (e) {}
        }

        var saved = localStorage.getItem(STORAGE_KEY);
        if (saved === 'fa') setLang('fa');

        badges.forEach(function (b) {
            b.addEventListener('click', function () {
                setLang(b.getAttribute('data-lang'));
            });
        });
    })();
</script>
@endsection