@extends('v1.layouts.app')
@section('title', 'Data Export')
@extends('v1.staff.dashboard.menu')

@section('content')

<div class="govuk-breadcrumbs govuk-!-padding-bottom-4">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="/">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('staff_projects.index') }}">Data Export</a>
      </li>
    </ol>
</div>

<h1 class="govuk-heading-l">
  Data Export
</h1>

    @foreach($users as $user)

    <h2 class="govuk-heading-m">BEGIN - {{$user->FullName}}</h2>

    <h2 class="govuk-heading-m">Submitted Projects</h2>
    @foreach($user->projects as $project)

    <table class="govuk-table">
        <caption class="govuk-table__caption govuk-table__caption--m">{{$project->name}}</caption>
        <thead class="govuk-table__head">
          <tr class="govuk-table__row">
            <th scope="col" class="govuk-table__header">Mark ID #</th>
            <th scope="col" class="govuk-table__header">Mark</th>
            <th scope="col" class="govuk-table__header">Feedback</th>
          </tr>
        </thead>
        <tbody class="govuk-table__body">
            
          @foreach($project->marks as $mark)

          <tr class="govuk-table__row">
            <th scope="row" class="govuk-table__header">#{{$mark->id}}</th>
            <td class="govuk-table__cell">{{$mark->mark_percentage}} % </td>
            <td class="govuk-table__cell"><b>Feedback by {{$mark->user->username}} {{$mark->user->fullName}}</b> <br> {{$mark->qualitative_feedback}}
              <hr>
                  @foreach($project->mark_review_marks as $marks)
                    @if($marks->marks_id == $mark->id)
                    <p class="govuk-body"> <b>Associated Feedback</b> # {{$marks->marks_id}} was given {{$marks->percentage}} % with {{$marks->project_mark_review->confidence}} confidence by {{$marks->user->username}} {{$marks->user->fullName}}</p>
                    @endif

                  @endforeach

                @endforeach

              </td>
          </tr>

        </tbody>
      </table>

      
      @endforeach


      <h2 class="govuk-heading-m">Marked Work & Associated Mark Review</h2>

      <table class="govuk-table">
        <caption class="govuk-table__caption govuk-table__caption--m">Dates and amounts</caption>
        <thead class="govuk-table__head">
          <tr class="govuk-table__row">
            <th scope="col" class="govuk-table__header">Project Name</th>
            <th scope="col" class="govuk-table__header">Mark</th>
            <th scope="col" class="govuk-table__header"></th>

          </tr>
        </thead>
        <tbody class="govuk-table__body">
          @foreach($user->project_mark_reviews as $markreviews)

          {{$markreviews}}

          <tr class="govuk-table__row">
            <th scope="row" class="govuk-table__header">First 6 weeks</th>
            <td class="govuk-table__cell">£109.80 per week</td>
          </tr>

          @endforeach

        </tbody>
      </table>

      <h2 class="govuk-heading-m">END - {{$user->FullName}}</h2>

    @endforeach


<div class="govuk-width-container">

  <main class="govuk-main-wrapper">



  </main>
</div>


@endsection