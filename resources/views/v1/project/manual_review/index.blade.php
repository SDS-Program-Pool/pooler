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

@if($project_reviews->isEmpty())
  <div class="govuk-warning-text">
    <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
    <strong class="govuk-warning-text__text">
      <span class="govuk-warning-text__assistive">Warning</span>
      You currently have no projects.
    </strong>
  </div>
@endif

@if($project_reviews->isNotEmpty())

<table class="govuk-table">
    <caption class="govuk-table__caption govuk-table__caption--m">Project Dashboard</caption>
    <thead class="govuk-table__head">
      <tr class="govuk-table__row">
        <th scope="col" class="govuk-table__header">Name</th>
        <th scope="col" class="govuk-table__header">Submission Date</th>
        <th scope="col" class="govuk-table__header">Status</th>
        <th scope="col" class="govuk-table__header">View More</th>
      </tr>
    </thead>
    <tbody class="govuk-table__body">
            @foreach($project_data as $project)
            <tr class="govuk-table__row">
                <th scope="row" class="govuk-table__header">{{$project_manual_reviews->name}}</th>
                <td class="govuk-table__cell">{{$project_manual_reviews->created_at}}</td>
                <td class="govuk-table__cell">
                  <strong class="govuk-tag govuk-tag--blue">
                      {{$project_manual_reviews->latestStatus();}}
                  </strong>
                </td>
                <td class="govuk-table__cell"><a href="{{ route('projects.show',$project_manual_reviews->id) }}" target=”_blank”>View More</td>
              </tr>
            @endforeach
    </tbody>
  </table>

  @endif

  <a href="{{ route('projects.create') }}" class="govuk-button" data-module="govuk-button">
    Upload code
  </a>

@endsection