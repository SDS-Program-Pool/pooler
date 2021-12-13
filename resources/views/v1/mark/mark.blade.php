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

  <form method="POST" action="{{ route('marking.store', $marking_array->id) }}">
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


    <div class="govuk-form-group">
        <h1 class="govuk-label-wrapper"><label class="govuk-label govuk-label--l" for="event-name">
            What is the mark of this project?
          </label>
        </h1>
        <details class="govuk-details" data-module="govuk-details">
            <summary class="govuk-details__summary">
              <span class="govuk-details__summary-text">
                Help with marking
              </span>
            </summary>
            <div class="govuk-details__text">
              Refer to Moodle/WM145



            </div>
          </details>
          <div id="mark-hint" class="govuk-hint">
            Include an integer from 40 -> 100. Do not include a percentage sign
          </div>
        <input class="govuk-input govuk-input--width-2" id="mark" name="mark" type="number">
      </div>

      <div class="govuk-form-group">
        <h1 class="govuk-label-wrapper"><label class="govuk-label govuk-label--l" for="qualfeedback">
            Can you provide any more feedback?
          </label>
        </h1>
        <div id="qualfeedback-hint" class="govuk-hint">
          Including things such as where the $user went right or wrong.
        </div>
        <textarea class="govuk-textarea" id="qualfeedback" name="qualfeedback" rows="5" aria-describedby="qualfeedback-hint"></textarea>
      </div>

      <div class="govuk-form-group">
        <fieldset class="govuk-fieldset">
          <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
            <h1 class="govuk-fieldset__heading">
              How confident are you in your marking?
            </h1>
          </legend>
          <div class="govuk-radios">
            <div class="govuk-radios__item">
              <input class="govuk-radios__input" id="confidence" name="confidence" type="radio" value="high">
              <label class="govuk-label govuk-radios__label" for="confidence">
                High
              </label>
            </div>
            <div class="govuk-radios__item">
              <input class="govuk-radios__input" id="confidence" name="confidence" type="radio" value="medium">
              <label class="govuk-label govuk-radios__label" for="confidence">
                Medium
              </label>
            </div>
            <div class="govuk-radios__item">
              <input class="govuk-radios__input" id="confidence" name="confidence" type="radio" value="low">
              <label class="govuk-label govuk-radios__label" for="confidence">
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