@extends('v1.layouts.app')
@section('title', 'Mark Project')


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


  <!-- 

    - Download Link To Project
    - Accept/Reject Code
      - Accept
        - If Accepted, show accept time but also allow rejection
      - Reject
        - Redirect to Tasks and Flash successful reject
        - Store in DB that they rejected it. 
    - If continue is pressed 


  -->

<table class="govuk-table">
    <caption class="govuk-table__caption govuk-table__caption--m">Marking Dashboard</caption>
    <thead class="govuk-table__head">
      <tr class="govuk-table__row">
        <th scope="col" class="govuk-table__header">Name</th>
        <th scope="col" class="govuk-table__header">Allocation Date</th>
        <th scope="col" class="govuk-table__header">Marking Due Date</th>
        <th scope="col" class="govuk-table__header">Mark Work</th>
      </tr>
    </thead>
    <tbody class="govuk-table__body">
        
          @if($marking_array)

            @foreach($marking_array as $marking)
              <tr class="govuk-table__row">
                <th scope="row" class="govuk-table__header"></th>
                <td class="govuk-table__cell"></td>
                <td class="govuk-table__cell">
                  <strong class="govuk-tag govuk-tag--blue">
                  Submitted
                  </strong>
                </td>
                <td class="govuk-table__cell"><a href="" target=”_blank”>View More</td>
              </tr>
            @endforeach
          @else

          <h2> No Items in Table </h2>
          @endif
          
    </tbody>
  </table>

@endsection