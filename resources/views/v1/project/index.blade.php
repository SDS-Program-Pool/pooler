@extends('v1.layouts.app')
@section('title', 'My Projects')


@extends('v1.project.menu')

@section('content')

<h1 class="govuk-heading-xl">My Projects</h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="#">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="#">My Projects</a>
      </li>
    </ol>
  </div>

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

<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
    You currently have no projects.
  </strong>
</div>


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
        
          @if($project_data)

            @foreach($project_data as $project)
              <tr class="govuk-table__row">
                <th scope="row" class="govuk-table__header">{{$project->name}}</th>
                <td class="govuk-table__cell">{{$project->created_at}}</td>
                <td class="govuk-table__cell">
                  <strong class="govuk-tag govuk-tag--blue">
                  Submitted
                  </strong>
                </td>
                <td class="govuk-table__cell"><a href="{{ route('projects.show',$project->id) }}" target=”_blank”>View More</td>
              </tr>
            @endforeach
          @else

          <h2> No Items in Table </h2>
          @endif
          
    </tbody>
  </table>
  <a href="{{ route('projects.create') }}" class="govuk-button" data-module="govuk-button">
    Upload code
  </a>



@endsection