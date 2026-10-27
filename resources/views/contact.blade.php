@extends('master')

@section('head')
<style>
    .contact-page {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color: #2d3436;
        max-width: 920px;
        margin: 0 auto;
    }
    html[data-contact-lang="fa"] .contact-page {
        direction: rtl;
        text-align: right;
        font-family: 'Vazir', 'Tahoma', sans-serif;
    }
    [data-lang-content] {
        display: none;
    }
    html[data-contact-lang="en"] [data-lang-content="en"],
    html:not([data-contact-lang]) [data-lang-content="fa"],
    html[data-contact-lang="fa"] [data-lang-content="fa"] {
        display: block;
    }
    .lang-badges {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1.25rem;
    }
    .lang-badge {
        appearance: none;
        -webkit-appearance: none;
        padding: 0.35rem 0.8rem;
        font-size: 0.9rem;
        font-weight: 500;
        line-height: 1.2;
        font-family: inherit;
        border-radius: 999px;
        cursor: pointer;
        border: 1px solid #dee2e6;
        background: #fff;
        color: #6c757d;
        transition: background 0.2s, border-color 0.2s, color 0.2s;
    }
    .lang-badge[data-lang="fa"] {
        font-family: 'Vazir', 'Tahoma', sans-serif;
    }
    .lang-badge:hover {
        border-color: #0984e3;
        color: #0984e3;
    }
    .lang-badge:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(9, 132, 227, 0.22);
    }
    html[data-contact-lang="en"] .lang-badge[data-lang="en"],
    html:not([data-contact-lang]) .lang-badge[data-lang="fa"],
    html[data-contact-lang="fa"] .lang-badge[data-lang="fa"] {
        background: #0984e3;
        border-color: #0984e3;
        color: #fff;
    }
    .contact-grid {
        display: grid;
        gap: 1.5rem;
    }
    .contact-hero {
        display: flex;
        align-items: center;
        gap: 1.25rem 1.5rem;
        margin-bottom: 1.5rem;
    }
    .contact-photo {
        width: 148px;
        height: 148px;
        object-fit: cover;
        border-radius: 50%;
        flex-shrink: 0;
        box-shadow: 0 8px 24px rgba(9, 132, 227, 0.16);
        background: #f1f3f5;
    }
    .contact-name {
        font-size: 1.7rem;
        font-weight: 700;
        line-height: 1.25;
        margin: 0 0 0.3rem;
        color: #2d3436;
    }
    @media (min-width: 992px) {
        .contact-grid {
            grid-template-columns: minmax(0, 1fr) 19.5rem;
            gap: 2rem;
            align-items: start;
        }
        .contact-name {
            font-size: 1.85rem;
        }
    }
    .contact-meta {
        margin: 0 0 0.45rem;
        color: #636e72;
        font-size: 1.05rem;
    }
    .contact-edu {
        margin: 0;
        line-height: 1.55;
        color: #2d3436;
    }
    .contact-block {
        margin-bottom: 1.25rem;
    }
    .contact-label {
        display: block;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #0984e3;
        margin: 0 0 0.55rem;
    }
    html[data-contact-lang="fa"] .contact-label {
        font-family: 'Vazir', 'Tahoma', sans-serif;
        letter-spacing: 0;
        text-transform: none;
        font-size: 0.95rem;
    }
    .skill-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
    }
    .skill-chip {
        display: inline-block;
        padding: 0.28rem 0.7rem;
        background: #f1f3f5;
        border-radius: 999px;
        font-size: 0.92rem;
        line-height: 1.4;
        color: #2d3436;
        direction: ltr;
        unicode-bidi: isolate;
    }
    .spoken-langs {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        column-gap: 0.45rem;
        row-gap: 0.25rem;
    }
    .lang-item {
        display: inline-flex;
        align-items: center;
        line-height: 0;
    }
    .lang-item .fi {
        width: 1.35em;
        line-height: 1em;
        border-radius: 2px;
        position: relative;
        top: 0.11em;
    }
    html[data-contact-lang="fa"] .spoken-langs .fi {
        top: 0.06em;
    }
    .contact-aside {
        background: #f8f9fa;
        border: 1px solid #eef0f2;
        border-radius: 12px;
        padding: 1rem 1.15rem 1.1rem;
    }
    .contact-item {
        display: flex;
        gap: 0.75rem;
        align-items: flex-start;
        padding: 0.7rem 0.1rem;
        border-bottom: 1px solid #eceff1;
        color: inherit;
    }
    .contact-items .contact-item:last-child {
        border-bottom: 0;
    }
    a.contact-item:hover .contact-item-value {
        color: #0984e3;
    }
    .contact-icon {
        width: 1.15rem;
        height: 1.15rem;
        margin-top: 0.28rem;
        color: #0984e3;
        flex-shrink: 0;
    }
    .contact-icon svg {
        display: block;
        width: 100%;
        height: 100%;
    }
    .contact-item-text {
        min-width: 0;
    }
    .contact-item-label {
        display: block;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 0.75rem;
        color: #868e96;
        margin-bottom: 0.12rem;
    }
    html[data-contact-lang="fa"] .contact-item-label {
        font-family: 'Vazir', 'Tahoma', sans-serif;
        font-size: 0.82rem;
    }
    .contact-item-value {
        display: block;
        color: #2d3436;
        font-weight: 600;
        overflow-wrap: anywhere;
    }
    .phone-list {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        column-gap: 0.9rem;
        row-gap: 0.35rem;
        min-width: 0;
    }
    .phone-item {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        direction: ltr;
        font-weight: 600;
        color: #2d3436;
        overflow-wrap: normal;
    }
    .phone-item:hover {
        color: #0984e3;
    }
    .phone-item .fi {
        width: 1.2em;
        height: 0.9em;
        background-size: cover;
        background-position: center;
        border-radius: 2px;
        flex-shrink: 0;
        display: block;
        position: relative;
        top: -0.02em;
    }
    .phone-item .fi::before {
        content: none;
    }
    html[data-contact-lang="fa"] .phone-item .fi {
        top: -0.11em;
    }
    .contact-source {
        margin: 0.85rem 0 0;
        padding-top: 0.75rem;
        border-top: 1px solid #eceff1;
        font-size: 0.88rem;
        color: #636e72;
        line-height: 1.5;
    }
    @media (max-width: 575.98px) {
        .contact-hero {
            flex-direction: column;
            text-align: center;
        }
        html[data-contact-lang="fa"] .contact-hero {
            text-align: center;
        }
        .lang-badges,
        .spoken-langs,
        .skill-chips {
            justify-content: center;
        }
        .contact-name {
            font-size: 1.55rem;
        }
        .contact-photo {
            width: 128px;
            height: 128px;
        }
    }
</style>
<link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" rel="stylesheet">
<script>
  (function () {
    var lang = 'fa';
    try {
      var saved = localStorage.getItem('contact-lang');
      if (saved === 'en' || saved === 'fa') lang = saved;
    } catch (e) {}
    document.documentElement.setAttribute('data-contact-lang', lang);
    document.documentElement.lang = lang;
  })();
</script>
@endsection

@section('content')
@php
    $mainSkills = ['Python/Django', 'AWS', 'Docker', 'Celery', 'DjangoRestFramework', 'Redis'];
    $otherSkills = ['NLP', 'Fraud Detection', 'MongoDB', 'ElasticSearch', 'Kubernetes', 'Azure', 'PHP/Laravel', 'Bootstrap'];
    $spoken = [
        ['code' => 'gb', 'en' => 'English', 'fa' => 'انگلیسی'],
        ['code' => 'fr', 'en' => 'French', 'fa' => 'فرانسوی'],
        ['code' => 'tr', 'en' => 'Turkish', 'fa' => 'ترکی'],
        ['code' => 'ir', 'en' => 'Persian', 'fa' => 'فارسی'],
    ];
    $phones = [
        ['href' => 'tel:+905343934352', 'display' => '+90 534-393-4352', 'flag' => 'tr', 'en' => 'Turkey', 'fa' => 'ترکیه'],
        ['href' => 'tel:+447501584977', 'display' => '+44 750-158-4977', 'flag' => 'gb', 'en' => 'United Kingdom', 'fa' => 'انگلستان'],
    ];
    $copy = [
        'en' => [
            'name' => 'Mohammad Ghorbani',
            'alt' => 'Mohammad Ghorbani',
            'meta' => 'Mo · Remote',
            'education' => 'Master\'s degree in Computer Engineering from <a href="https://aut.ac.ir/en" target="_blank" rel="noopener noreferrer">Amirkabir University of Technology</a>',
            'expertise' => 'Main expertise',
            'other' => 'Other experiences',
            'languages' => 'Languages',
            'contact' => 'Contact',
            'email' => 'Email',
            'phone' => 'Phone',
            'linkedin' => 'LinkedIn',
            'github' => 'GitHub',
            'telegram' => 'Telegram',
            'resume' => 'Resume',
            'resume_cta' => 'Download',
            'source_before' => 'The source of this website is available at ',
            'source_after' => '.',
            'source_link' => 'GitHub',
        ],
        'fa' => [
            'name' => 'محمد قربانی',
            'alt' => 'محمد قربانی',
            'meta' => 'دورکار',
            'education' => 'کارشناسی ارشد مهندسی کامپیوتر از <a href="https://aut.ac.ir/en" target="_blank" rel="noopener noreferrer">دانشگاه صنعتی امیرکبیر</a> تهران',
            'expertise' => 'تخصص اصلی',
            'other' => 'سایر تجربیات',
            'languages' => 'زبان‌ها',
            'contact' => 'تماس',
            'email' => 'ایمیل',
            'phone' => 'تلفن',
            'linkedin' => 'لینکدین',
            'github' => 'گیت‌هاب',
            'telegram' => 'تلگرام',
            'resume' => 'رزومه',
            'resume_cta' => 'دانلود',
            'source_before' => 'منبع این وبسایت در ',
            'source_after' => ' موجود است.',
            'source_link' => 'گیت‌هاب',
        ],
    ];
    $iconEmail = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>';
    $iconPhone = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>';
    $iconLinkedin = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19 3A2 2 0 0 1 21 5v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14zM8.34 17.34V10.67H6v6.67h2.34zM7.17 9.59a1.36 1.36 0 1 0 0-2.72 1.36 1.36 0 0 0 0 2.72zM18 17.34v-3.64c0-1.95-.42-3.45-2.7-3.45A2.36 2.36 0 0 0 13.2 11.4h-.05v-1.07H11v7h2.34v-3.46c0-.91.17-1.8 1.31-1.8s1.13 1.03 1.13 1.86v3.4H18z"/></svg>';
    $iconGithub = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.58 2 12.26c0 4.52 2.87 8.36 6.84 9.71.5.1.68-.22.68-.49v-1.7c-2.78.62-3.37-1.37-3.37-1.37-.45-1.18-1.11-1.5-1.11-1.5-.91-.64.07-.63.07-.63 1 .08 1.53 1.06 1.53 1.06.9 1.57 2.36 1.12 2.94.85.09-.67.35-1.12.63-1.37-2.22-.26-4.56-1.14-4.56-5.07 0-1.12.39-2.03 1.03-2.75-.1-.26-.45-1.3.1-2.7 0 0 .84-.27 2.75 1.05A9.3 9.3 0 0 1 12 6.84c.85 0 1.71.12 2.51.35 1.9-1.32 2.74-1.05 2.74-1.05.55 1.4.21 2.44.1 2.7.64.72 1.03 1.63 1.03 2.75 0 3.94-2.34 4.8-4.58 5.06.36.32.68.94.68 1.9v2.81c0 .27.18.59.69.49A10.03 10.03 0 0 0 22 12.26C22 6.58 17.52 2 12 2z"/></svg>';
    $iconTelegram = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.94 4.37 18.4 20.4c-.26 1.13-.95 1.41-1.92.88l-5.31-3.91-2.56 2.46c-.28.28-.52.51-1.06.51l.38-5.34 9.72-8.78c.42-.38-.09-.59-.66-.22L5.76 12.74 1.13 11.3c-1.11-.34-1.13-1.1.23-1.63L20.52 2.77c.92-.35 1.73.2 1.42 1.6z"/></svg>';
    $iconResume = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/></svg>';
@endphp
    <div class="contact-page my-4 my-md-5" id="contactContent">
        <div class="lang-badges" role="group" aria-label="Language">
            <button type="button" class="lang-badge" data-lang="en" aria-pressed="false">English</button>
            <button type="button" class="lang-badge" data-lang="fa" aria-pressed="true">فارسی</button>
        </div>

        @foreach ($copy as $lang => $t)
        <div data-lang-content="{{ $lang }}" lang="{{ $lang }}">
            <div class="contact-grid">
                <div>
                    <div class="contact-hero">
                        <img class="contact-photo" src="/images/myPicture3.jpg" alt="{{ $t['alt'] }}" width="148" height="148">
                        <div>
                            <h1 class="contact-name">{{ $t['name'] }}</h1>
                            <p class="contact-meta">{{ $t['meta'] }}</p>
                            <p class="contact-edu">{!! $t['education'] !!}</p>
                        </div>
                    </div>

                    <section class="contact-block" aria-label="{{ $t['expertise'] }}">
                        <h2 class="contact-label">{{ $t['expertise'] }}</h2>
                        <div class="skill-chips">
                            @foreach ($mainSkills as $skill)
                                <span class="skill-chip">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </section>

                    <section class="contact-block" aria-label="{{ $t['other'] }}">
                        <h2 class="contact-label">{{ $t['other'] }}</h2>
                        <div class="skill-chips">
                            @foreach ($otherSkills as $skill)
                                <span class="skill-chip">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </section>

                    <section class="contact-block" aria-label="{{ $t['languages'] }}">
                        <h2 class="contact-label">{{ $t['languages'] }}</h2>
                        <p class="spoken-langs mb-0">
                            @foreach ($spoken as $spokenLang)
                                <span class="lang-item" title="{{ $spokenLang[$lang] }}"><span class="fi fi-{{ $spokenLang['code'] }}" aria-label="{{ $spokenLang[$lang] }}"></span></span>
                            @endforeach
                        </p>
                    </section>
                </div>

                <aside class="contact-aside" aria-label="{{ $t['contact'] }}">
                    <h2 class="contact-label">{{ $t['contact'] }}</h2>
                    <div class="contact-items">
                    <a class="contact-item" href="mailto:mo.ghorb@gmail.com">
                        <span class="contact-icon">{!! $iconEmail !!}</span>
                        <span class="contact-item-text">
                            <span class="contact-item-label">{{ $t['email'] }}</span>
                            <span class="contact-item-value">mo.ghorb@gmail.com</span>
                        </span>
                    </a>

                    <div class="contact-item">
                        <span class="contact-icon">{!! $iconPhone !!}</span>
                        <span class="contact-item-text">
                            <span class="contact-item-label">{{ $t['phone'] }}</span>
                            <span class="phone-list">
                                @foreach ($phones as $phone)
                                    <a class="phone-item" href="{{ $phone['href'] }}" title="{{ $phone[$lang] }}"><span class="fi fi-{{ $phone['flag'] }}" aria-label="{{ $phone[$lang] }}"></span><span>{{ $phone['display'] }}</span></a>
                                @endforeach
                            </span>
                        </span>
                    </div>

                    <a class="contact-item" href="https://www.linkedin.com/in/gh-m/" target="_blank" rel="noopener noreferrer">
                        <span class="contact-icon">{!! $iconLinkedin !!}</span>
                        <span class="contact-item-text">
                            <span class="contact-item-label">{{ $t['linkedin'] }}</span>
                            <span class="contact-item-value">gh-m</span>
                        </span>
                    </a>

                    <a class="contact-item" href="https://github.com/moo-gh" target="_blank" rel="noopener noreferrer">
                        <span class="contact-icon">{!! $iconGithub !!}</span>
                        <span class="contact-item-text">
                            <span class="contact-item-label">{{ $t['github'] }}</span>
                            <span class="contact-item-value">moo-gh</span>
                        </span>
                    </a>

                    <a class="contact-item" href="https://t.me/ghorbani_mohammad" target="_blank" rel="noopener noreferrer">
                        <span class="contact-icon">{!! $iconTelegram !!}</span>
                        <span class="contact-item-text">
                            <span class="contact-item-label">{{ $t['telegram'] }}</span>
                            <span class="contact-item-value">ghorbani_mohammad</span>
                        </span>
                    </a>

                    <a class="contact-item" href="https://www.m-gh.com/Mohammad_Resume_.pdf">
                        <span class="contact-icon">{!! $iconResume !!}</span>
                        <span class="contact-item-text">
                            <span class="contact-item-label">{{ $t['resume'] }}</span>
                            <span class="contact-item-value">{{ $t['resume_cta'] }}</span>
                        </span>
                    </a>
                    </div>

                    <p class="contact-source">{{ $t['source_before'] }}<a href="https://github.com/moo-gh/my-website" target="_blank" rel="noopener noreferrer">{{ $t['source_link'] }}</a>{{ $t['source_after'] }}</p>
                </aside>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('footer')
<script>
  $('#about').addClass('active');
  (function () {
    var STORAGE_KEY = 'contact-lang';
    var badges = document.querySelectorAll('.lang-badge');

    function setLang(lang) {
      document.documentElement.setAttribute('data-contact-lang', lang);
      document.documentElement.lang = lang;
      badges.forEach(function (badge) {
        var active = badge.getAttribute('data-lang') === lang;
        badge.setAttribute('aria-pressed', active ? 'true' : 'false');
      });
      try { localStorage.setItem(STORAGE_KEY, lang); } catch (e) {}
    }

    var current = document.documentElement.getAttribute('data-contact-lang') === 'en' ? 'en' : 'fa';
    setLang(current);

    badges.forEach(function (badge) {
      badge.addEventListener('click', function () {
        setLang(badge.getAttribute('data-lang'));
      });
    });
  })();
</script>
@endsection
