@extends('master')

@section('head')
<meta http-equiv="refresh" content="4;url=/contact">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<style>
  .redirect-message {
    font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 60vh;
    text-align: center;
    padding: 1.5rem;
  }
  .redirect-message__text {
    font-size: 1.25rem;
    font-weight: 600;
    color: #636e72;
    margin-bottom: 0.5rem;
  }
  .redirect-message__countdown {
    font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    font-size: 2.5rem;
    font-weight: 700;
    color: #0984e3;
    margin: 0.5rem 0;
    min-height: 3rem;
  }
  .redirect-message__link {
    font-size: 0.95rem;
  }
  @media (max-width: 576px) {
    .redirect-message__text {
      font-size: 1.5rem;
      font-weight: 500;
      color: #2d3436;
      line-height: 1.5;
    }
    .redirect-message {
      min-height: 50vh;
      padding: 2rem 1rem;
    }
    .redirect-message__countdown {
      font-size: 3rem;
    }
    .redirect-message__link {
      font-size: 1.1rem;
      padding: 0.5rem 1rem;
      min-height: 44px;
      display: inline-flex;
      align-items: center;
    }
  }
</style>
@endsection

@section('content')
<div class="redirect-message">
  <p class="redirect-message__text">Redirecting to contact...</p>
  <div class="redirect-message__countdown" id="countdown">3</div>
  <a href="/contact" class="btn btn-link mt-2 redirect-message__link">Click here if you are not redirected</a>
</div>
@endsection

@section('footer')
<script>
  (function () {
    var el = document.getElementById('countdown');
    var n = 3;
    var interval = setInterval(function () {
      n--;
      if (n > 0) {
        el.textContent = n;
      } else {
        clearInterval(interval);
        window.location.href = '/contact';
      }
    }, 1000);
  })();
</script>
@endsection
