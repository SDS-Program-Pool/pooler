@extends('v1.layouts.app')
@section('title', 'Tasks')


@extends('v1.task.student.menu')

@section('content')

<h1 class="govuk-heading-xl">Tasks</h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('dashboard.index') }}">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.index') }}">My Projects</a>
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


<table class="govuk-table">
    <caption class="govuk-table__caption govuk-table__caption--m">Marking Dashboard</caption>
    <thead class="govuk-table__head">
      <tr class="govuk-table__row">
        <th scope="col" class="govuk-table__header">Name</th>
        <th scope="col" class="govuk-table__header">Dates</th>
        <th scope="col" class="govuk-table__header">Status</th>
        <th scope="col" class="govuk-table__header">Mark Work</th>
      </tr>
    </thead>
    <tbody class="govuk-table__body">
        
          @if($marking_array)

            @foreach($marking_array as $marking)
              <tr class="govuk-table__row">
                <th scope="row" class="govuk-table__header">{{$marking->project->name}}</th>
                <td class="govuk-table__cell">Allocated @ {{$marking->created_at}} Due @ $date</td>
                <td class="govuk-table__cell">
                  <strong class="govuk-tag govuk-tag--blue">
                  Ready to Mark
                  </strong>
                </td>
                <td class="govuk-table__cell"><a href="{{ route('marking.show',$marking->project->id) }}" target=”_blank”>View More</td>
              </tr>
            @endforeach
          @else

          <h2> No Items in Table </h2>
          @endif
          
    </tbody>
  </table>


  <table class="govuk-table">
    <caption class="govuk-table__caption govuk-table__caption--m">Mark Review Dashboard</caption>
    <thead class="govuk-table__head">
      <tr class="govuk-table__row">
        <th scope="col" class="govuk-table__header">Name</th>
        <th scope="col" class="govuk-table__header">Submission Date</th>
        <th scope="col" class="govuk-table__header">Status</th>
        <th scope="col" class="govuk-table__header">View More</th>

      </tr>
    </thead>
    <tbody class="govuk-table__body">
        
      @foreach($markReviewsArray as $markReview)
      <tr class="govuk-table__row">
        <th scope="row" class="govuk-table__header">{{$markReview->project->name}}</th>
        <td class="govuk-table__cell">Allocated @ {{$markReview->created_at}} Due @ $date</td>
        <td class="govuk-table__cell">
          <strong class="govuk-tag govuk-tag--blue">
          Ready to Mark
          </strong>
        </td>
        <td class="govuk-table__cell"><a href="{{ route('marking_review.show',$markReview->project->id) }}" target=”_blank”>View More</td>
      </tr>
      @endforeach
        
    </tbody>
  </table>
  


@endsection