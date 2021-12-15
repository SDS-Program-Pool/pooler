@extends('v1.layouts.app')
@section('title', 'Create Project')


@extends('v1.project.menu')

@section('content')

<h1 class="govuk-heading-xl">Upload Code</h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('dashboard.index') }}">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.index') }}">My Projects</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.create') }}">Upload Code</a>
      </li>
    </ol>
  </div>

@if ($errors->any())
<div class="govuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1" data-module="govuk-error-summary">
  <h2 class="govuk-error-summary__title" id="error-summary-title">
    There is a problem
  </h2>
  <div class="govuk-error-summary__body">
    <ul class="govuk-list govuk-error-summary__list">
  @foreach ($errors->all() as $error)
        <li>
          <a href="#team_type">
            <li>{{ $error  }}</li>
          </a>
        </li>
  @endforeach
      </ul>
    </div>
  </div>
@endif


                <form enctype="multipart/form-data" method="POST" action="{{ route('projects.store') }}">
                    @csrf

                    <div class="govuk-form-group @error('project_name') govuk-form-group--error @enderror">
                      <label class="govuk-label" for="project_name">
                        What is the name of the project?
                      </label>
                      <input class="govuk-input" id="project_name" name="project_name" type="text" value="{{old('project_name') ?? ''}}"></div>

                    <div class="govuk-form-group">
                      <fieldset class="govuk-fieldset">
                        <legend class="govuk-fieldset__legend">
                          What type of project are you uploading?
                        </legend>
                        <div class="govuk-radios @error('team_type') govuk-form-group--error @enderror">
                          <div class="govuk-radios__item">
                            <input class="govuk-radios__input" id="team_type" name="team_type" type="radio" value="IndividualTeamCreation">
                            <label class="govuk-label govuk-radios__label" for="team_type">
                              Individual
                            </label>
                            <div id="sign-in-item-hint" class="govuk-hint govuk-radios__hint">
                              If all your commits are from you, select this.
                            </div>
                          </div>
                          <div class="govuk-radios__item">
                            <input class="govuk-radios__input" id="team_type-2" name="team_type" type="radio" value="TeamCreation" disabled>
                            <label class="govuk-label govuk-radios__label" for="team_type-2">
                              Team
                            </label>
                            <div id="sign-in-item-hint" class="govuk-hint govuk-radios__hint">
                              Your work will be marked collectivley as a group/team
                            </div>
                          </div>
                          <div class="govuk-radios__item">
                            <input class="govuk-radios__input" id="team_type-3" name="team_type" type="radio" value="FeatureBranchTeamCreation" disabled>
                            <label class="govuk-label govuk-radios__label" for="team_type-3">
                              Feature Branch
                            </label>
                            <div id="sign-in-item-hint" class="govuk-hint govuk-radios__hint">
                              Your feature branch will be marked but the marker will have access to the entire code base.
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>

                    <div class="govuk-form-group @error('code-upload') govuk-form-group--error @enderror">
                      <label class="govuk-label" for="code-upload">
                        Upload your code. Max 50MB. Supported filetypes .zip .tar .tar.gz
                      </label>
                      <input class="govuk-file-upload @error('code-upload') govuk-input--error @enderror" id="code-upload" name="code-upload" type="file">
                    </div>


                  <!--   <details class="govuk-details" data-module="govuk-details">
                      <summary class="govuk-details__summary">
                        <span class="govuk-details__summary-text">
                          Help with project type
                        </span>
                      </summary>
                      <div class="govuk-details__text">
                        Type some stuff here later!
                      </div>
                    </details> -->

                    <button type="submit" class="govuk-button" data-module="govuk-button">
                      Save and continue
                    </button>
            </form>
           


@endsection