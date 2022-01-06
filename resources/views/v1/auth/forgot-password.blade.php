@extends('v1.layouts.app')
@section('title', 'Reset Password')

@section('content')

@error('email')
<div class="govuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1" data-module="govuk-error-summary">
  <h2 class="govuk-error-summary__title" id="error-summary-title">
    There is a problem
  </h2>
  <div class="govuk-error-summary__body">
    <ul class="govuk-list govuk-error-summary__list">
      <li>
        <a href="#email">The email or password is incorrect</a>
      </li>
    </ul>
  </div>
</div>
@enderror

<h1 class="govuk-heading-xl">Reset Password</h1>

<div class="govuk-hint" id="email-hint">
  Warwick Cyber Security Center Labs. This service is restricted to authorized users only. All activities on this system are logged.
</div>

@if (session('status'))
<div class="govuk-notification-banner govuk-notification-banner--success" role="alert" aria-labelledby="govuk-notification-banner-title" data-module="govuk-notification-banner">
    <div class="govuk-notification-banner__header">
      <h2 class="govuk-notification-banner__title" id="govuk-notification-banner-title">
        Success
      </h2>
    </div>
    <div class="govuk-notification-banner__content">
      <h3 class="govuk-notification-banner__heading">
        Password Reset
      </h3>
      <p class="govuk-body">{{ session('status') }}</p>
    </div>
  </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="govuk-form-group @error('email') govuk-form-group--error @enderror"> 
        <label for="user_id" class="govuk-label" aria-describedby="user_id-hint">E-Mail Address</label> 
        @error('email')
        <span id="emailpass-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Your email or password is incorrect
        </span>
        @enderror

        <input type="text" name="email" id="email" class="govuk-input govuk-!-width-one-half @error('email') govuk-input--error @enderror" value="{{ old('email') }}" aria-describedby="email-hint" autocomplete="email"> 
    </div> 

        <button type="submit" class="govuk-button" data-module="govuk-button" id="continue" formnovalidate="">Reset Password</button> 
</form>


<h2 class="govuk-heading-m govuk-!-margin-top-6">Problems signing in</h2>
<ul class="govuk-list"> 
    <li><a class="govuk-link" href="{{route('register')}}" id="forgotten-password" data-ga-action="Forgot-Password" data-ga-category="Sign-In" data-ga-label="HMRC">I need an account</a></li> 
    <li><a class="govuk-link" href="{{route('password.request')}}" id="forgotten-password" data-ga-action="Forgot-Password" data-ga-category="Sign-In" data-ga-label="HMRC">I have forgotten my password</a></li> 
</ul>

@endsection