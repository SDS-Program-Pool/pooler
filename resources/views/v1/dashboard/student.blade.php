@extends('v1.layouts.app')
@section('title', 'Dashboard')

@section('menu')

<div class="govuk-header__content">
    <button type="button" class="govuk-header__menu-button govuk-js-header-toggle" aria-controls="navigation" aria-label="Show or hide navigation menu">Menu</button>
    <nav>
      <ul id="navigation" class="govuk-header__navigation " aria-label="Navigation menu">
        <li class="govuk-header__navigation-item govuk-header__navigation-item">
          <a class="govuk-header__link" href="{{route('projects.index')}}">
            My Projects
          </a>
        </li>
        <li class="govuk-header__navigation-item">
          <a class="govuk-header__link" href="{{route('tasks.index')}}">
            Tasks
          </a>
        </li>
          <li class="govuk-header__navigation-item">
            <a class="govuk-header__link" href="{{route('settings.index')}}">
              Settings
            </a>
          </li>
      </ul>
    </nav>
  </div>

@endsection

@section('content')

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
</div>
<!--<div class="govuk-form-group">
  <label class="govuk-label" for="one-half">
    Search
  </label>
  <input class="govuk-input govuk-!-width-one-half" id="one-half" name="one-half" type="text">
</div>-->
<div class="govuk-breadcrumbs">
  <ol class="govuk-breadcrumbs__list">
    <li class="govuk-breadcrumbs__list-item">
      <a class="govuk-breadcrumbs__link" href="{{ route('dashboard.index') }}">Home</a>
    </li>
  </ol>
</div>

<h1 class="govuk-heading-l">
  Welcome back to the Program Pool, {{Auth::user()->username}}
</h1>

<dl class="govuk-summary-list">
  <div class="govuk-summary-list__row">
    <dt class="govuk-summary-list__key">
      Submitted Projects
    </dt>
    <dd class="govuk-summary-list__value">
      Amount of projects done here...
    </dd>
    <dd class="govuk-summary-list__actions">
      <a class="govuk-link" href="#">
        View Projects<span class="govuk-visually-hidden"></span>
      </a>
    </dd>
  </div>
  <div class="govuk-summary-list__row">
    <dt class="govuk-summary-list__key">
      Marked Projects
    </dt>
    <dd class="govuk-summary-list__value">
      Amount of marked projects you've marked here...
    </dd>
    <dd class="govuk-summary-list__actions">
      <a class="govuk-link" href="#">
        View Tasks<span class="govuk-visually-hidden"></span>
      </a>
    </dd>
  </div>
  <div class="govuk-summary-list__row">
    <dt class="govuk-summary-list__key">
      Account Information
    </dt>
    <dd class="govuk-summary-list__value">
      {{ Auth::user()->username }}
    </dd>
    <dd class="govuk-summary-list__actions"></dd>
  </div>
</dl>
<div class="govuk-width-container">

  <main class="govuk-main-wrapper">

    <div class="govuk-grid-row">
      <div class="govuk-grid-column-two-thirds">
        <h1 class="govuk-heading-xl">Mark History</h1>
        <p class="govuk-body">View your average mark here.</p>
      </div>

      <div class="govuk-grid-column-one-third">
        <h2 class="govuk-heading-m">To-do list</h2>
        <ul class="govuk-list">
          <li>
            <a class="govuk-link" href="#">Something you have to do here...</a>
          </li>
          <li>
            <a class="govuk-link" href="#">Something you have to do here...</a>
          </li>
          <li>
            <a class="govuk-link" href="#">Something you have to do here...</a>
          </li>
          <li>
            <a class="govuk-link" href="#">Something you have to do here...</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="govuk-form-group govuk-!-padding-top-3">
      <h1 class="govuk-label-wrapper"><label class="govuk-label govuk-label--l" for="more-detail">
          Custom Notes
        </label>
      </h1>
      <div id="more-detail-hint" class="govuk-hint">
        Do not include personal or financial information, like your National Insurance number or credit card details.
      </div>
      <textarea class="govuk-textarea" id="more-detail" name="more-detail" rows="5" aria-describedby="more-detail-hint"></textarea>
    </div>
    <button class="govuk-button" data-module="govuk-button">
      Save
    </button>

  </main>
</div>

<!-- If user is student render the student dashboard etc etc.-->


@endsection