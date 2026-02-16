@extends('master')

@section('head')
<meta http-equiv="refresh" content="1;url=/contact">
<style>
  .redirect-message {
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
    color: #636e72;
    margin-bottom: 0.5rem;
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
  <a href="/contact" class="btn btn-link mt-2 redirect-message__link">Click here if you are not redirected</a>
</div>
@endsection
