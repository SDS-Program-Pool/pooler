@extends('v1.layouts.app')
@section('title', 'Dashboard')
@extends('v1.staff.dashboard.menu')

@section('content')

<div class="govuk-breadcrumbs">
  <ol class="govuk-breadcrumbs__list">
    <li class="govuk-breadcrumbs__list-item">
      <a class="govuk-breadcrumbs__link" href="{{ route('staff.index') }}">Home</a>
    </li>
  </ol>
</div>

<h1 class="govuk-heading-l">
  Welcome back to Program Pool, {{Auth::user()->username}}
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