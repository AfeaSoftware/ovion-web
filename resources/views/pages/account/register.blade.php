@extends('main')

@section('title', __('ui.account_register_title'))
@section('theme', 'dark')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/destek.css') }}" />
<style>
  .ac-form { max-width: 480px; margin: 0 auto; padding: 64px 24px; }
  .ac-form h1 { font-size: clamp(28px, 4vw, 40px); margin: 0 0 8px; letter-spacing: -0.02em; }
  .ac-form .lede { color: var(--muted); margin: 0 0 32px; }
  .ac-form label { display: block; margin: 16px 0 6px; font-size: 14px; font-weight: 500; }
  .ac-form input { width: 100%; padding: 12px 16px; border: 1px solid var(--line); border-radius: 8px; background: transparent; color: var(--ink); font-size: 15px; }
  .ac-form input:focus { outline: 2px solid var(--accent); outline-offset: 1px; }
  .ac-form .ac-error { color: #ff6b5b; font-size: 13px; margin-top: 4px; }
  .ac-form .ac-actions { margin-top: 28px; display: flex; flex-direction: column; gap: 12px; }
  .ac-form .ac-alt { color: var(--muted); font-size: 14px; text-align: center; margin-top: 16px; }
  .ac-form .ac-alt a { color: var(--ink); text-decoration: underline; }
</style>
@endpush

@section('content')
@php $isEn = ($locale ?? 'tr') === 'en'; @endphp

<section class="ac-form">
  <h1>{{ __('ui.account_register_title') }}</h1>
  <p class="lede">{{ __('ui.account_register_lede') }}</p>

  <form method="POST" action="{{ $isEn ? route('en.register') : route('register') }}">
    @csrf

    <label for="name">{{ __('ui.account_name') }}</label>
    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus />
    @error('name')<p class="ac-error">{{ $message }}</p>@enderror

    <label for="email">{{ __('ui.account_email') }}</label>
    <input id="email" name="email" type="email" value="{{ old('email') }}" required />
    @error('email')<p class="ac-error">{{ $message }}</p>@enderror

    <label for="phone">{{ __('ui.account_phone') }}</label>
    <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" required placeholder="0501 234 56 78" />
    @error('phone')<p class="ac-error">{{ $message }}</p>@enderror

    <label for="password">{{ __('ui.account_password') }}</label>
    <input id="password" name="password" type="password" required />
    @error('password')<p class="ac-error">{{ $message }}</p>@enderror

    <label for="password_confirmation">{{ __('ui.account_password_confirm') }}</label>
    <input id="password_confirmation" name="password_confirmation" type="password" required />

    <div class="ac-actions">
      <button type="submit" class="btn btn-primary">{{ __('ui.account_register_btn') }}</button>
    </div>
  </form>

  <p class="ac-alt">
    {{ __('ui.account_already') }} <a href="{{ $isEn ? route('en.login') : route('login') }}">{{ __('ui.account_login_btn') }}</a>
  </p>
</section>
@endsection
