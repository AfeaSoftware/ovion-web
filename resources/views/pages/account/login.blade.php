@extends('main')

@section('title', __('ui.account_login_title'))
@section('theme', 'dark')

@push('styles')
<style>
  .ac-form { max-width: 440px; margin: 0 auto; padding: 64px 24px; }
  .ac-form h1 { font-size: clamp(28px, 4vw, 40px); margin: 0 0 8px; letter-spacing: -0.02em; }
  .ac-form .lede { color: var(--muted); margin: 0 0 32px; }
  .ac-form label { display: block; margin: 16px 0 6px; font-size: 14px; font-weight: 500; }
  .ac-form input { width: 100%; padding: 12px 16px; border: 1px solid var(--line); border-radius: 8px; background: transparent; color: var(--ink); font-size: 15px; }
  .ac-form input:focus { outline: 2px solid var(--accent); outline-offset: 1px; }
  .ac-form .ac-error { color: #ff6b5b; font-size: 13px; margin-top: 4px; }
  .ac-form .ac-actions { margin-top: 28px; display: flex; flex-direction: column; gap: 12px; }
  .ac-form .ac-alt { color: var(--muted); font-size: 14px; text-align: center; margin-top: 16px; }
  .ac-form .ac-alt a { color: var(--ink); text-decoration: underline; }
  .ac-form .ac-status { padding: 12px 16px; background: rgba(10,132,255,0.08); border: 1px solid rgba(10,132,255,0.4); border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
</style>
@endpush

@section('content')
@php $isEn = ($locale ?? 'tr') === 'en'; @endphp

<section class="ac-form">
  <h1>{{ __('ui.account_login_title') }}</h1>
  <p class="lede">{{ __('ui.account_login_lede') }}</p>

  @if(session('status'))
    <div class="ac-status">{{ session('status') }}</div>
  @endif

  <form method="POST" action="{{ $isEn ? route('en.login') : route('login') }}">
    @csrf

    <label for="email">{{ __('ui.account_email') }}</label>
    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus />
    @error('email')<p class="ac-error">{{ $message }}</p>@enderror

    <label for="password">{{ __('ui.account_password') }}</label>
    <input id="password" name="password" type="password" required />
    @error('password')<p class="ac-error">{{ $message }}</p>@enderror

    <label style="display:flex; align-items:center; gap:8px; margin-top:16px; font-weight:400;">
      <input type="checkbox" name="remember" style="width:auto;" /> {{ __('ui.account_remember') }}
    </label>

    <div class="ac-actions">
      <button type="submit" class="btn btn-primary">{{ __('ui.account_login_btn') }}</button>
    </div>
  </form>

  <p class="ac-alt">
    {{ __('ui.account_no_account') }} <a href="{{ $isEn ? route('en.register') : route('register') }}">{{ __('ui.account_register_btn') }}</a>
  </p>
</section>
@endsection
