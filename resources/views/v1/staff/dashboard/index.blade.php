@extends('v1.layouts.app')
@section('title', 'Dashboard')

@section('menu')

<div class="govuk-header__content">
    <button type="button" class="govuk-header__menu-button govuk-js-header-toggle" aria-controls="navigation" aria-label="Show or hide navigation menu">Menu</button>
    <nav>
      <ul id="navigation" class="govuk-header__navigation " aria-label="Navigation menu">
        <li class="govuk-header__navigation-item govuk-header__navigation-item">
          <a class="govuk-header__link" href="{{route('staff_projects.index')}}">
            Projects
          </a>
        </li>
        <li class="govuk-header__navigation-item">
          <a class="govuk-header__link" href="{{route('tasks.index')}}">
            Students
          </a>
        </li>
          <li class="govuk-header__navigation-item">
            <a class="govuk-header__link" href="{{route('projects.index')}}">
              Mark Review Requests
            </a>
          </li>
      </ul>
    </nav>
  </div>

@endsection

@section('content')

<!--
<div class="govuk-notification-banner" role="region" aria-labelledby="govuk-notification-banner-title" data-module="govuk-notification-banner">
  <div class="govuk-notification-banner__header">
    <h2 class="govuk-notification-banner__title" id="govuk-notification-banner-title">
      Notification
    </h2>
  </div>
  <div class="govuk-notification-banner__content">
    <p class="govuk-notification-banner__heading">
      You have progress on one of your projects.
      <a class="govuk-notification-banner__link" href="#">View progress</a>.
    </p>
  </div>
</div> -->

<!--<div class="govuk-form-group">
  <label class="govuk-label" for="one-half">
    Search
  </label>
  <input class="govuk-input govuk-!-width-one-half" id="one-half" name="one-half" type="text">
</div>-->
<div class="govuk-breadcrumbs">
  <ol class="govuk-breadcrumbs__list">
    <li class="govuk-breadcrumbs__list-item">
      <a class="govuk-breadcrumbs__link" href="{{ route('staff.index') }}">Home</a>
    </li>
  </ol>
</div>

<h1 class="govuk-heading-l">
  Welcome back to the Program Pool, {{Auth::user()->username}}
</h1>


<div class="govuk-width-container">

  <main class="govuk-main-wrapper">

    <div class="govuk-grid-row">
      <div class="govuk-grid-column-one-third">
        <h1 class="govuk-heading-xl">Projects</h1>
        <p class="govuk-body">Projects Submitted - </p>
        <p class="govuk-body">Cohort Average Mark - </p>

      </div>

      <div class="govuk-grid-column-one-third">
        <h1 class="govuk-heading-xl">Project</h1>
        <p class="govuk-body">View your average mark here.</p>
      </div>
    </div>


  </main>
</div>


@endsection