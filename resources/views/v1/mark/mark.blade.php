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
              <a href="https://moodle.warwick.ac.uk/pluginfile.php/2253941/mod_resource/content/3/feedback.txt">Moodle</a>
            </div>
          </details>

          <div class="govuk-inset-text">
            <p id="grade-descriptor">Descriptor -</p>
          </div>

        <input class="govuk-input govuk-input--width-2" id="mark" name="mark" type="number" onkeyup="showGradeDescriptor()">
      </div>

      <div class="govuk-form-group">
        <h1 class="govuk-label-wrapper"><label class="govuk-label govuk-label--l" for="qualfeedback">
            Can you provide any more feedback?
          </label>
        </h1>
        <details class="govuk-details" data-module="govuk-details">
          <summary class="govuk-details__summary">
            <span class="govuk-details__summary-text">
              Advice on feedback
            </span>
          </summary>
          <div class="govuk-details__text">
            <p> Be kind and constructive. The aim is to help the author get better at
            programming, not to cause them to lose confidence or feel stupid.</p>
            <p> Try to find some nice things to say about the code or coding style.
            If you suspect that the author is a better programmer than you are
            currently then do your best to feedback your understanding of what the
            code does but don't forget: just because it is confusing doesn't mean
            that it is good!</p>
          </div>
        </details>
        <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="4000">
          <textarea class="govuk-textarea govuk-js-character-count" id="qualfeedback" name="qualfeedback" rows="5" aria-describedby="qualfeedback-hint"></textarea>
          <div id="qualfeedback-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
            You can enter up to 4000 characters
          </div>
        </div>
      </div>

      <div class="govuk-form-group">
        <fieldset class="govuk-fieldset">
          <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
            <h1 class="govuk-fieldset__heading">
              How confident are you in your marking?
            </h1>
          </legend>
            
          <details class="govuk-details" data-module="govuk-details">
            <summary class="govuk-details__summary">
              <span class="govuk-details__summary-text">
                Advice on confidence
              </span>
            </summary>
            <div class="govuk-details__text">
              <p> HIGH means that you are pretty sure that your mark and feedback are correct.</p>
              <p> MEDIUM means you think your mark and feedback are OK.</p>
              <p> LOW means that you perhaps don't understand the code or you aren't that confident about your mark or feedback comments.</p>
            </div>
          </details>

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

<script>
  function showGradeDescriptor() {
    var mark = document.getElementById("mark").value;

    if (mark <= 49 ){
      document.getElementById('grade-descriptor').innerText = "Descriptor - Work of limited quality, demonstrating some relevant knowledge and understanding."
    }
    else if(mark <= 59){
      document.getElementById('grade-descriptor').innerText = "Descriptor - Competent work, demonstrating reasonable knowledge and understanding, some analysis, organisation, accuracy, relevance, presentation and appropriate skills.Work of limited quality, demonstrating some relevant knowledge and understanding."
    }
    else if(mark <= 69){
      document.getElementById('grade-descriptor').innerText = "Descriptor - High quality work demonstrating good knowledge and understanding, analysis, organisation, accuracy, relevance, presentation and appropriate skills."
    }
    else if(mark > 89){
      document.getElementById('grade-descriptor').innerText = "Descriptor - Very high quality work demonstrating excellent knowledge and understanding, analysis, organisation, accuracy, relevance, presentation and appropriate skills."
    }

}
</script>


@endsection