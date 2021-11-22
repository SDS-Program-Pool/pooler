@extends('v1.layouts.app')
@section('title', 'Mark Project')


@extends('v1.task.student.menu')

@section('content')

<h1 class="govuk-heading-xl">Mark Project {{$marking_array->name}} </h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('dashboard.index') }}">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.index') }}">Tasks</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.index') }}">Mark Project {{$marking_array->name}} </a>
      </li>
    </ol>
  </div>


  <table class="govuk-table">
    <caption class="govuk-table__caption govuk-table__caption--m">Dates and amounts</caption>
    <thead class="govuk-table__head">
      <tr class="govuk-table__row">
        <th scope="col" class="govuk-table__header">Name</th>
        <th scope="col" class="govuk-table__header">Submission Date</th>
        <th scope="col" class="govuk-table__header">Marking Due by</th>
        <th scope="col" class="govuk-table__header">Download</th>        

      </tr>
    </thead>
    <tbody class="govuk-table__body">
      <tr class="govuk-table__row">
        <th scope="row" class="govuk-table__header">{{$marking_array->name}}</th>
        <td class="govuk-table__cell">{{$marking_array->created_at}}</td>
        <td class="govuk-table__cell">a model thing.</td>
        <td class="govuk-table__cell"><a href="{{route("downloads.index",$marking_array->id)}}"> Download </a> </td>

      </tr>
    </tbody>
  </table>

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



@endsection