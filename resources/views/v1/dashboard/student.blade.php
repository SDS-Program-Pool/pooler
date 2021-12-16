@extends('v1.layouts.app')
@section('title', 'Dashboard')

@section('menu')

<div class="govuk-header__content">
  <a href="{{route('dashboard.index')}}" class="govuk-header__link govuk-header__link--service-name">
    Program Pool
  </a>
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
            <a class="govuk-header__link" href="{{route('projects.index')}}">
              Settings
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

<h1 class="govuk-heading-xl">Dashboard</h1>

<div class="govuk-breadcrumbs">
  <ol class="govuk-breadcrumbs__list">
    <li class="govuk-breadcrumbs__list-item">
      <a class="govuk-breadcrumbs__link" href="{{ route('dashboard.index') }}">Home</a>
    </li>
  </ol>
</div>

<h1 class="govuk-heading-l">
  Good {{$dayTerm}}, {{Auth::user()->first_name}}
</h1>

@if(Session::has('message'))

<div class="govuk-notification-banner govuk-notification-banner--success" role="alert" aria-labelledby="govuk-notification-banner-title" data-module="govuk-notification-banner">
  <div class="govuk-notification-banner__header">
    <h2 class="govuk-notification-banner__title" id="govuk-notification-banner-title">
      Success
    </h2>
  </div>
  <div class="govuk-notification-banner__content">
    <h3 class="govuk-notification-banner__heading">
      {{ Session::get('message') }}
    </h3>
  </div>
</div>

@endif

<dl class="govuk-summary-list">
  <div class="govuk-summary-list__row">
    <dt class="govuk-summary-list__key">
      Submitted Projects
    </dt>
    <dd class="govuk-summary-list__value">
      {{Auth::user()->projects->count()}}
    </dd>
    <dd class="govuk-summary-list__actions">
      <a class="govuk-link" href="{{route('projects.index')}}">
        View Projects<span class="govuk-visually-hidden"></span>
      </a>
    </dd>
  </div>
  <div class="govuk-summary-list__row">
    <dt class="govuk-summary-list__key">
      Marked Projects
    </dt>
    <dd class="govuk-summary-list__value">
      {{Auth::user()->project_mark_reviews->count()}}
    </dd>
    <dd class="govuk-summary-list__actions">
      <a class="govuk-link" href="{{route('tasks.index')}}">
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
        <p class="govuk-body">This feature has not yet been enabled</p>
      </div>

      <div class="govuk-grid-column-one-third">
        <h2 class="govuk-heading-m">To-do list</h2>
        <ul class="govuk-list">

          @if(Auth::user()->ToMark->isEmpty() || Auth::user()->ToMarkReview->isEmpty())
            <p> Nothing to do!</p>
          @endif
          
          @foreach(Auth::user()->ToMark as $list)

          <li>
            <a class="govuk-link" href="{{route('marking.show',$list->project->id)}}">Mark Project - {{$list->project->name}}</a>
          </li>
          
          @endforeach

          @foreach(Auth::user()->ToMarkReview as $list)

          <li>
            <a class="govuk-link" href="{{route('marking_review.show',$list->project->id)}}">Mark Review Project - {{$list->project->name}}</a>
          </li>
          
          @endforeach


        </ul>
      </div>
    </div>

    <form method="POST" action="{{ route('user_notes.store') }}">
      @csrf
    <div class="govuk-form-group govuk-!-padding-top-3">
      <h1 class="govuk-label-wrapper"><label class="govuk-label govuk-label--l" for="notes">
          Custom Notes
        </label>
      </h1>
      <div id="notes-hint" class="govuk-hint">
        Do not include personal data here.
      </div>
      <textarea class="govuk-textarea" id="note" name="note" rows="5" aria-describedby="notes-hint">{{Auth::user()->notes->note ?? ''}}</textarea>
    </div>
    <button type="submit" class="govuk-button" data-module="govuk-button" id="continue" formnovalidate="">Save</button> 

  </form>


  </main>
</div>


@endsection