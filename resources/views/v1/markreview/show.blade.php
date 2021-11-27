@extends('v1.layouts.app')
@section('title', 'Mark Review of Project')


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
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.index') }}">Mark Review of Project {{$marking_array->name}} </a>
      </li>
    </ol>
  </div>


  <table class="govuk-table">
    <caption class="govuk-table__caption govuk-table__caption--m">Project Details</caption>
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

  <form method="POST" action="{{ route('marking.accept_or_reject', $marking_array->id) }}">
    @csrf

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 


<table class="govuk-table">
    <caption class="govuk-table__caption govuk-table__caption--m">Marking</caption>
    <thead class="govuk-table__head">
      <tr class="govuk-table__row">
        <th scope="col" class="govuk-table__header govuk-!-width-one-quarter">Ref #</th>
        <th scope="col" class="govuk-table__header govuk-!-width-one-quarter">Percentage</th>
        <th scope="col" class="govuk-table__header govuk-!-width-one-quarter">Feedback</th>
        <th scope="col" class="govuk-table__header govuk-!-width-one-quarter">Score Marking</th>
      </tr>
    </thead>
    <tbody class="govuk-table__body">

      <tr class="govuk-table__row">
        <th scope="row" class="govuk-table__header">1</th>
        <td class="govuk-table__cell">80%</td>
        <td class="govuk-table__cell">my qual feedback</td>
        <td class="govuk-table__cell">
            <div class="govuk-form-group">
            <input class="govuk-input govuk-input--width-2" id="width-2" name="width-2" type="text">
            </div>
        </td>
      </tr>

    </tbody>
</table>


<div class="govuk-form-group">
  <fieldset class="govuk-fieldset">
    <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
      <h1 class="govuk-fieldset__heading">
        How confident are you in your mark review?
      </h1>
    </legend>
    <div class="govuk-radios">
      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="where-do-you-live" name="where-do-you-live" type="radio" value="england">
        <label class="govuk-label govuk-radios__label" for="where-do-you-live">
          High
        </label>
      </div>
      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="where-do-you-live-2" name="where-do-you-live" type="radio" value="scotland">
        <label class="govuk-label govuk-radios__label" for="where-do-you-live-2">
          Medium
        </label>
      </div>
      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="where-do-you-live-3" name="where-do-you-live" type="radio" value="wales">
        <label class="govuk-label govuk-radios__label" for="where-do-you-live-3">
          Low
        </label>
      </div>
    </div>

  </fieldset>
</div>







  <button type="submit" class="govuk-button" data-module="govuk-button">
    Save and continue
  </button>
</form>


@endsection