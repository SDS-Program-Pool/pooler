@extends('v1.layouts.app')
@section('title', 'Login')

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

@error('username')
<div class="govuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1" data-module="govuk-error-summary">
  <h2 class="govuk-error-summary__title" id="error-summary-title">
    There is a problem
  </h2>
  <div class="govuk-error-summary__body">
    <ul class="govuk-list govuk-error-summary__list">
      <li>
        <a href="#username">The username or password is incorrect</a>
      </li>
    </ul>
  </div>
</div>
@enderror

<div class="govuk-hint" id="username-hint">
  {{config('organisation.motd')}}
</div>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="govuk-form-group @error('username') govuk-form-group--error @enderror"> 
        <label for="user_id" class="govuk-label" aria-describedby="user_id-hint">CSC Username</label> 
        @error('username')
        <span id="usernamepass-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Your username or password is incorrect
        </span>
        @enderror

        <input type="text" name="username" id="username" class="govuk-input govuk-!-width-one-half @error('username') govuk-input--error @enderror" value="{{ old('username') }}" aria-describedby="username-hint" autocomplete="username"> 
    </div> 

    <div class="govuk-form-group @error('username') govuk-form-group--error @enderror"> 
        <div class="govuk-form-group"> <label for="password" class="govuk-label">Password</label> 
            <input type="password" name="password" id="password" class="govuk-input govuk-!-width-three-quarters @error('username') govuk-input--error @enderror" autocomplete="current-password"> 
        </div> 
    </div>
        <button type="submit" class="govuk-button" data-module="govuk-button" id="continue" formnovalidate="">Sign in</button> 
</form>


<h2 class="govuk-heading-m govuk-!-margin-top-6">Problems signing in</h2>
<ul class="govuk-list"> 
    <li><a class="govuk-link" href="{{route('register')}}" id="forgotten-password" data-ga-action="Forgot-Password" data-ga-category="Sign-In" data-ga-label="HMRC">I need an account</a></li> 
    <li><a class="govuk-link" href="{{route('password.request')}}" id="forgotten-password" data-ga-action="Forgot-Password" data-ga-category="Sign-In" data-ga-label="HMRC">I have forgotten my password</a></li> 
</ul>

@endsection