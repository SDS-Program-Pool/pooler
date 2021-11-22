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
<!-- ID please fix this to make it pretty ^^-->


  <div class="govuk-form-group">
    <fieldset class="govuk-fieldset">
      <legend class="govuk-fieldset__legend">
        Would you like to mark this project?
      </legend>
      <div class="govuk-radios">
        <div class="govuk-radios__item">
          <input class="govuk-radios__input" id="take_project" name="take_project" type="radio" value="1">
          <label class="govuk-label govuk-radios__label" for="take_project">
            Yes
          </label>
          <div id="sign-in-item-hint" class="govuk-hint govuk-radios__hint">
            By selecting "Yes", you agree to mark this project.
          </div>
        </div>
        <div class="govuk-radios__item">
          <input class="govuk-radios__input" id="take_project-2" name="take_project" type="radio" value="0">
          <label class="govuk-label govuk-radios__label" for="take_project-2">
            No
          </label>
          <div id="sign-in-item-hint" class="govuk-hint govuk-radios__hint">
            By selecting "No", this program will be re-allocated to other students.
          </div>
        </div>
      </div>
    </fieldset>
  </div>

  <button type="submit" class="govuk-button" data-module="govuk-button">
    Save and continue
  </button>
</form>

@endsection