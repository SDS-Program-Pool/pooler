@extends('v1.layouts.app')
@section('title', 'Request Staff Review')


@extends('v1.project.menu')

@section('content')

<h1 class="govuk-heading-xl">Request Staff Review</h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('dashboard.index') }}">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.index') }}">My Projects</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects_manualreview.index') }}">Request Staff Review</a>
      </li>
    </ol>
  </div>

@if ($errors->any())
<div class="govuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1" data-module="govuk-error-summary">
  <h2 class="govuk-error-summary__title" id="error-summary-title">
    There is a problem
  </h2>
  <div class="govuk-error-summary__body">
    <ul class="govuk-list govuk-error-summary__list">
  @foreach ($errors->all() as $error)
        <li>
          <a href="#team_type">
            <li>{{ $error  }}</li>
          </a>
        </li>
  @endforeach
      </ul>
    </div>
  </div>
@endif

<div class="govuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1" data-module="govuk-error-summary">
  <h2 class="govuk-error-summary__title" id="error-summary-title">
    There is a problem
  </h2>
  <div class="govuk-error-summary__body">
    <ul class="govuk-list govuk-error-summary__list">
      <li>
        <a href="#">This feature has not been implemented yet... Contact the module delivery team for a manual review.</a>
      </li>
    </ul>
  </div>
</div>

@endsection