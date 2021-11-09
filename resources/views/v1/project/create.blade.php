@extends('v1.layouts.app')
@section('title', 'Create Project')


@extends('v1.project.menu')

@section('content')

<h1 class="govuk-heading-xl">Upload Code</h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="#">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="#">My Projects</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.create') }}">Upload Code</a>
      </li>
    </ol>
  </div>

                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf
                <div class="mb-3">
                    <label class="form-label" for="formFile">Upload ZIP TAR</label>
                    <input class="form-control" id="formFile" type="file" />
                </div>

                <div class="mb-4">
                    <select class="form-select" id="team_type" name="team_type" aria-label="select team type">
                        <option value="IndividualTeamCreation" selected="">Individual</option>
                        <option value="FeatureBranchTeamCreation">Team - Feature Branch</option>
                        <option value="TeamCreation">Team (group mark)</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
           


@endsection