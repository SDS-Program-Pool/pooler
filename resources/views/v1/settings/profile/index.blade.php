@extends('v1.layouts.app')
@section('title', 'Settings')


@extends('v1.settings.profile.menu')

@section('content')

<h1 class="govuk-heading-xl">Settings</h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{route('dashboard.index')}}">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{route('settings.index')}}">Settings</a>
      </li>
    </ol>
  </div>



    <fieldset class="govuk-fieldset">
        <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
          <h1 class="govuk-fieldset__heading">
            Update Account
          </h1>
        </legend>

    <a class="govuk-body"> <b> Values are read only for now. Change password by logging out and going to /reset-password</b> </a>

    <div class="govuk-form-group @error('first_name') govuk-form-group--error @enderror"> 
        <label for="first_name" class="govuk-label" aria-describedby="user_id-hint">First Name</label> 
        @error('first_name')
        <span id="first_name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Your name is $error
        </span>
        @enderror
        <input type="text" name="first_name" id="first_name" class="govuk-input govuk-!-width-one-quarter @error('first_name') govuk-input--error @enderror" value="{{ $user->first_name }}" maxlength="30" aria-describedby="first_name-hint" autocomplete="first_name" disabled> 
    </div>
  
    <div class="govuk-form-group @error('last_name') govuk-form-group--error @enderror"> 
        <label for="last_name" class="govuk-label" aria-describedby="user_id-hint">Last Name</label> 
        @error('last_name')
        <span id="last_name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Your name is $error
        </span>
        @enderror
        <input type="text" name="last_name" id="last_name" class="govuk-input govuk-!-width-one-quarter @error('last_name') govuk-input--error @enderror" value="{{ $user->last_name }}" maxlength="30" aria-describedby="last_name-hint" autocomplete="last_name" disabled> 
    </div>

    <div class="govuk-form-group @error('username') govuk-form-group--error @enderror"> 
        <label for="user_id" class="govuk-label" aria-describedby="user_id-hint">CSC Username</label> 
        @error('username')
        <span id="usernamepass-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Your username is not in the ACL
        </span>
        @enderror
        <input type="text" name="username" id="username" class="govuk-input govuk-!-width-one-half @error('username') govuk-input--error @enderror" value="{{ $user->username }}" maxlength="20" aria-describedby="username-hint" autocomplete="username" disabled> 
    </div> 

    <div class="govuk-form-group @error('email') govuk-form-group--error @enderror"> 
      <label for="user_id" class="govuk-label" aria-describedby="user_id-hint">E-Mail Address</label> 
      @error('email')
      <span id="email-error" class="govuk-error-message">
          <span class="govuk-visually-hidden">Error:</span> Your email is in error state
      </span>
      @enderror
      <input type="email" name="email" id="email" class="govuk-input govuk-!-width-one-half @error('email') govuk-input--error @enderror" value="{{ $user->email }}" maxlength="20" aria-describedby="email-hint" autocomplete="email" disabled> 
  </div> 

</fieldset>




@endsection