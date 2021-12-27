@extends('v1.layouts.app')
@section('title', 'Register')

@section('content')

<form method="POST" action="{{ route('register') }}">
    @csrf


    <fieldset class="govuk-fieldset">
        <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
          <h1 class="govuk-fieldset__heading">
            Register an account on Program Pool
          </h1>
          <div class="govuk-inset-text">
            This system is intended for first year BSc students.
          </div>
        </legend>

    <div class="govuk-form-group @error('first_name') govuk-form-group--error @enderror"> 
        <label for="first_name" class="govuk-label" aria-describedby="user_id-hint">First Name</label> 
        @error('first_name')
        <span id="first_name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Your name is $error
        </span>
        @enderror
        <input type="text" name="first_name" id="first_name" class="govuk-input govuk-!-width-one-quarter @error('first_name') govuk-input--error @enderror" value="{{ old('first_name') }}" maxlength="30" aria-describedby="first_name-hint" autocomplete="first_name"> 
    </div>
  
    <div class="govuk-form-group @error('last_name') govuk-form-group--error @enderror"> 
        <label for="last_name" class="govuk-label" aria-describedby="user_id-hint">Last Name</label> 
        @error('last_name')
        <span id="last_name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Your name is $error
        </span>
        @enderror
        <input type="text" name="last_name" id="last_name" class="govuk-input govuk-!-width-one-quarter @error('last_name') govuk-input--error @enderror" value="{{ old('last_name') }}" maxlength="30" aria-describedby="last_name-hint" autocomplete="last_name"> 
    </div>

    <div class="govuk-form-group @error('username') govuk-form-group--error @enderror"> 
        <label for="user_id" class="govuk-label" aria-describedby="user_id-hint">CSC Username</label> 
        @error('username')
        <span id="usernamepass-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Your username is not in the ACL
        </span>
        @enderror
        <input type="text" name="username" id="username" class="govuk-input govuk-!-width-one-half @error('username') govuk-input--error @enderror" value="{{ old('username') }}" aria-describedby="username-hint" autocomplete="username"> 
    </div> 

    <div class="govuk-form-group @error('email') govuk-form-group--error @enderror"> 
      <label for="user_id" class="govuk-label" aria-describedby="user_id-hint">E-Mail Address</label> 
      @error('email')
      <span id="email-error" class="govuk-error-message">
          <span class="govuk-visually-hidden">Error:</span> Your email is in error state
      </span>
      @enderror
      <input type="email" name="email" id="email" class="govuk-input govuk-!-width-one-half @error('email') govuk-input--error @enderror" value="{{ old('email') }}" aria-describedby="email-hint" autocomplete="email"> 
  </div> 

    <div class="govuk-form-group @error('password') govuk-form-group--error @enderror"> 
        <div class="govuk-form-group"> <label for="password" class="govuk-label">Password</label> 
          @error('password')
          <span id="usernamepass-error" class="govuk-error-message">
              <span class="govuk-visually-hidden">Error:</span> Your password does not meet system requirments
          </span>
          @enderror
            <input type="password" name="password" id="password" class="govuk-input govuk-!-width-three-quarters @error('password') govuk-input--error @enderror" autocomplete="current-password"> 
        </div> 
    </div>

</fieldset>

        <button type="submit" class="govuk-button" data-module="govuk-button" id="continue" formnovalidate="">Register</button> 
</form>


@endsection