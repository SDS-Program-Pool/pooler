@extends('v1.layouts.app')
@section('title', 'Verify E-Mail')

@section('content')

@if (session('status'))
<div class="govuk-notification-banner govuk-notification-banner--success" role="alert" aria-labelledby="govuk-notification-banner-title" data-module="govuk-notification-banner">
    <div class="govuk-notification-banner__header">
      <h2 class="govuk-notification-banner__title" id="govuk-notification-banner-title">
        Status
      </h2>
    </div>
    <div class="govuk-notification-banner__content">
      <h3 class="govuk-notification-banner__heading">
        
      </h3>
      <p class="govuk-body">{{ session('status') }}</p>
    </div>
  </div>
@endif

<h1 class="govuk-heading-xl">Verification email submitted</h1>

<div class="govuk-hint" id="username-hint">
  Warwick Cyber Security Center Labs. This service is restricted to authorized users only. All activities on this system are logged.
</div>



<div class="govuk-notification-banner govuk-notification-banner--success" role="alert" aria-labelledby="govuk-notification-banner-title" data-module="govuk-notification-banner">
  <div class="govuk-notification-banner__header">
    <h2 class="govuk-notification-banner__title" id="govuk-notification-banner-title">
      Success
    </h2>
  </div>
  <div class="govuk-notification-banner__content">
    <h3 class="govuk-notification-banner__heading">
      Account Created
    </h3>
    <p class="govuk-body">An email verification link has been emailed to you!</p>
  </div>
</div>

<p class="govuk-body">Already confirmed? Refresh this page.</p>

<form method="POST" action="{{ route('verification.send') }}" class="text-center">
    @csrf
    <button type="submit" class="govuk-button" data-module="govuk-button" id="continue" formnovalidate="">Re Send verification email</button> 
</form>


<h2 class="govuk-heading-m govuk-!-margin-top-6">Problems signing in</h2>
<ul class="govuk-list"> 
    <li><a class="govuk-link" href="{{route('register')}}" id="forgotten-password" data-ga-action="Forgot-Password" data-ga-category="Sign-In" data-ga-label="HMRC">I need an account</a></li> 
    <li><a class="govuk-link" href="{{route('password.request')}}" id="forgotten-password" data-ga-action="Forgot-Password" data-ga-category="Sign-In" data-ga-label="HMRC">I have forgotten my password</a></li> 
</ul>

@endsection