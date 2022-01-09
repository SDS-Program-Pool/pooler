@extends('v1.layouts.app')
@section('title', 'View Student Project')

@extends('v1.staff.dashboard.menu')

@section('content')


<h1 class="govuk-heading-xl">Project - {{ $project->name }}</h1>

<div class="govuk-breadcrumbs govuk-!-padding-bottom-4">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="/">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('staff_projects.index') }}">Student Projects</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('staff_projects.show',$project->id) }}">Project - {{ $project->name }}</a>
      </li>
    </ol>
</div>


<div class="govuk-tabs" data-module="govuk-tabs">
  <h2 class="govuk-tabs__title">
    Contents
  </h2>
  <ul class="govuk-tabs__list">
    <li class="govuk-tabs__list-item govuk-tabs__list-item--selected">
      <a class="govuk-tabs__tab" href="#overview">
        Overview
      </a>
    </li>
    <li class="govuk-tabs__list-item">
      <a class="govuk-tabs__tab" href="#mark">
        Mark
      </a>
    </li>
    <li class="govuk-tabs__list-item">
      <a class="govuk-tabs__tab" href="#mark-review">
        Mark Review
      </a>
    </li>
    <li class="govuk-tabs__list-item">
      <a class="govuk-tabs__tab" href="#final-outcome">
        Final Outcome
      </a>
    </li>
  </ul>
  <div class="govuk-tabs__panel" id="overview">
    <h2 class="govuk-heading-l">Overview</h2>
    <dl class="govuk-summary-list">
      <div class="govuk-summary-list__row">
        <dt class="govuk-summary-list__key">
          Project Name
        </dt>
        <dd class="govuk-summary-list__value">
          {{ $project->name }}
        </dd>
        <dd class="govuk-summary-list__actions">
          <a class="govuk-link" href="#">
            Change<span class="govuk-visually-hidden"> project name</span>
          </a>
        </dd>
      </div>
      <div class="govuk-summary-list__row">
        <dt class="govuk-summary-list__key">
          Upload Date
        </dt>
        <dd class="govuk-summary-list__value">
          {{ $project->created_at}}
        </dd>
        <dd class="govuk-summary-list__actions"></dd>
      </div>
      <div class="govuk-summary-list__row">
        <dt class="govuk-summary-list__key">
          File
        </dt>
        <dd class="govuk-summary-list__value">
          {{$project->source->source}}
        </dd>
        <dd class="govuk-summary-list__actions">
          <a class="govuk-link" href="{{ route('downloads.index', $project->id) }}">
            Download<span class="govuk-visually-hidden"> file</span>
          </a>
        </dd>
      </div>
      <div class="govuk-summary-list__row">
        <dt class="govuk-summary-list__key">
          Status
        </dt>
        <dd class="govuk-summary-list__value">
          <strong class="govuk-tag govuk-tag--green">
            {{$project->latestStatus();}}
          </strong>
        </dd>
        <dd class="govuk-summary-list__actions"></dd>
      </div>
      <div class="govuk-summary-list__row">
        <dt class="govuk-summary-list__key">
          Status History
        </dt>
        <dd class="govuk-summary-list__value">
          @foreach ($project->statuses as $status)
            <strong class="govuk-tag govuk-tag--green">
              {{$status->name}} @ {{$status->created_at}}
            </strong>
          @endforeach
        </dd>
        <dd class="govuk-summary-list__actions"></dd>
      </div>
    </dl>
  </div>

  <div class="govuk-tabs__panel govuk-tabs__panel" id="mark">
    <h2 class="govuk-heading-l">Mark</h2>
    
    <!-- Allocated to -->

        @foreach($project->mark_allocations as $marker)
       
        <p class="govuk-body"> <b>Allocated to {{$marker->user->FullName}}</b> ({{$marker->user->username}})</p>
        
        @endforeach
    
    @if($project->marks->isEmpty())
    <div class="govuk-warning-text">
      <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
      <strong class="govuk-warning-text__text">
        <span class="govuk-warning-text__assistive">Warning</span>
        This project has not yet been marked. 
      </strong>
    </div>
    @else
    <dl class="govuk-summary-list">
      @foreach($project->marks as $mark)
      <div class="govuk-summary-list__row">
        <dt class="govuk-summary-list__key">
          Feedback ID # {{$mark->id}}
        </dt>
        <dd class="govuk-summary-list__value">
          <p class="govuk-body">Percentage - {{$mark->mark_percentage}} %</p>
          <p class="govuk-body">Feedback <pre> {{$mark->qualitative_feedback}} </pre> </p>

        </dd>
        <dd class="govuk-summary-list__actions"></dd>
      </div>
      @endforeach
    </dl>
    @endif

  </div>

  <div class="govuk-tabs__panel govuk-tabs__panel" id="mark-review">
    <h2 class="govuk-heading-l">Mark Review</h2>
        <!-- Allocated to -->

        @foreach($project->mark_review_allocations as $reviewer)
       
        <p class="govuk-body"> <b>Allocated to {{$reviewer->user->FullName}}</b> ({{$reviewer->user->username}})</p>
        
        @endforeach

    @if($project->mark_review->isEmpty())
    <div class="govuk-warning-text">
      <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
      <strong class="govuk-warning-text__text">
        <span class="govuk-warning-text__assistive">Warning</span>
        This project has not yet been marked reviewed. 
      </strong>
    </div>
    @else
    <dl class="govuk-summary-list">

      @foreach($project->mark_review_marks as $mark_reviews)
  
      <div class="govuk-summary-list__row">
        <dt class="govuk-summary-list__key">
          Mark Review ID # {{$mark_reviews->id}}
        </dt>
        <dd class="govuk-summary-list__value">
          <p class="govuk-body">Feedback Item #1 was scored {{$mark_reviews->percentage}}% with {{$mark_reviews->project_mark_review->confidence}} confidence</p>

        </dd>
        <dd class="govuk-summary-list__actions"></dd>
      </div>
  
      @endforeach
    </dl>
    @endif

  </div>

  <div class="govuk-tabs__panel govuk-tabs__panel" id="final-outcome">
    <h2 class="govuk-heading-l">Mark Review</h2>
    @if($project->mark_review->isEmpty())
    <div class="govuk-warning-text">
      <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
      <strong class="govuk-warning-text__text">
        <span class="govuk-warning-text__assistive">Warning</span>
        This project has not yet been marked. 
      </strong>
    </div>
    @else
    <dl class="govuk-summary-list">
      <div class="govuk-summary-list__row">
        <dt class="govuk-summary-list__key">
          Final Mark
        </dt>
        <dd class="govuk-summary-list__value">
          No data found.
        </dd>
        <dd class="govuk-summary-list__actions">
          <a class="govuk-link" href="#">
            Help<span class="govuk-visually-hidden"></span>
          </a>
        </dd>
      </div>
      <div class="govuk-summary-list__row">
        <dt class="govuk-summary-list__key">
          Graded on
        </dt>
        <dd class="govuk-summary-list__value">
          No data found.
        </dd>
        <dd class="govuk-summary-list__actions"></dd>
      </div>
      <div class="govuk-summary-list__row">
        <dt class="govuk-summary-list__key">
          Grade Breakdown
        </dt>
        <dd class="govuk-summary-list__value">
          test.pdf
        </dd>
        <dd class="govuk-summary-list__actions">
          <a class="govuk-link" href="#">
            Download<span class="govuk-visually-hidden"> file</span>
          </a>
        </dd>
      </div>
    </dl>
    @endif 
    </div>
  </div>



</div>
               
@endsection