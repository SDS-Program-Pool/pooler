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
        <a class="govuk-breadcrumbs__link" href="{{ route('tasks.index') }}">My Tasks</a>
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


@if($marking_array->isEmpty())
  <div class="govuk-warning-text">
    <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
    <strong class="govuk-warning-text__text">
      <span class="govuk-warning-text__assistive">Warning</span>
      You currently have no projects to mark.
    </strong>
  </div>
@endif

@if($marking_array->isNotEmpty())
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
        
            @foreach($marking_array as $marking)
              <tr class="govuk-table__row">
                <th scope="row" class="govuk-table__header">{{$marking->project->name}}</th>
                <td class="govuk-table__cell">Allocated @ {{$marking->project->created_at}}</td>
                <td class="govuk-table__cell">
                  @if($marking->taken_by_user === 0)
                  <strong class="govuk-tag govuk-tag--red">
                    Rejected for marking
                  </strong>
                  @else
                  <strong class="govuk-tag govuk-tag--blue">
                    Ready to Mark
                  </strong>
                  @endif

                </td>
                <td class="govuk-table__cell"><a href="{{ route('marking.show',$marking->project->id) }}" target=”_blank”>@if($marking->taken_by_user === 0) @else View More @endif</td>
              </tr>
            @endforeach
          
    </tbody>
  </table>
@endif



@if($markReviewsArray->isEmpty())
  <div class="govuk-warning-text">
    <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
    <strong class="govuk-warning-text__text">
      <span class="govuk-warning-text__assistive">Warning</span>
      You currently have no projects to review the marks of.
    </strong>
  </div>
@endif

@if($markReviewsArray->isNotEmpty())
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
        <td class="govuk-table__cell">Allocated @ {{$markReview->created_at}}</td>
        <td class="govuk-table__cell">
          @if($markReview->project->marks->count() < 3)
          <strong class="govuk-tag govuk-tag--red">
          Unable to mark
          </strong>
          @else
          <strong class="govuk-tag govuk-tag--blue">
            Ready to mark
            </strong>
          @endif
        </td>
        <td class="govuk-table__cell"><a href="{{ route('marking_review.show',$markReview->project->id) }}" target=”_blank”>@if($markReview->project->mark_review->count() < 3) View More @endif</td>
      </tr>
      @endforeach
        
    </tbody>
  </table>
  @endif
  


@endsection