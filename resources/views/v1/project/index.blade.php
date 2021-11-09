@extends('v1.layouts.app')
@section('title', 'My Projects')


@extends('v1.project.menu')

@section('content')

<h1 class="govuk-heading-xl">My Projects</h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="#">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="#">My Projects</a>
      </li>
    </ol>
  </div>


<table class="govuk-table">
    <caption class="govuk-table__caption govuk-table__caption--m">Project Dashboard</caption>
    <thead class="govuk-table__head">
      <tr class="govuk-table__row">
        <th scope="col" class="govuk-table__header">Name</th>
        <th scope="col" class="govuk-table__header">Submission Date</th>
        <th scope="col" class="govuk-table__header">Status</th>
        <th scope="col" class="govuk-table__header">View More</th>

      </tr>
    </thead>
    <tbody class="govuk-table__body">
      <tr class="govuk-table__row">
        <th scope="row" class="govuk-table__header">First 6 weeks</th>
        <td class="govuk-table__cell">£109.80 per week</td>
        <td class="govuk-table__cell">£109.80 per week</td>
        <td class="govuk-table__cell">£109.80 per week</td>
      </tr>
    </tbody>
  </table>

  @foreach($project_data as $project)

                        <tr>
                            <td>02/02/2002</td>
                            <td>{{$project->id}}</td>
                            <td>Test</td>
                            <td>Value</td>
                            <td><span class="badge bg-primary">Processing</span></td>
                        </tr>

                        @endforeach

@endsection