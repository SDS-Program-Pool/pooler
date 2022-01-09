@extends('v1.layouts.app')
@section('title', 'Projects')

@extends('v1.staff.dashboard.menu')

@section('content')

<h1 class="govuk-heading-xl">Projects</h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('dashboard.index') }}">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.index') }}">Projects</a>
      </li>
    </ol>
  </div>


<table class="govuk-table">
    <caption class="govuk-table__caption govuk-table__caption--m">Project List</caption>
    <thead class="govuk-table__head">
      <tr class="govuk-table__row">
        <th scope="col" class="govuk-table__header">Name</th>
        <th scope="col" class="govuk-table__header">Project Type</th>
        <th scope="col" class="govuk-table__header">Average Mark</th>
        <th scope="col" class="govuk-table__header">View Project</th>
      </tr>
    </thead>
    <tbody class="govuk-table__body">
        @foreach($projectData as $project)
      <tr class="govuk-table__row">
        <th scope="row" class="govuk-table__header">{{$project->name}}</th>
        <td class="govuk-table__cell">{{$project->Type}}</td>
        <td class="govuk-table__cell"></td>
        <td class="govuk-table__cell"><a href="{{route('staff_projects.show',$project->id)}}"> View</td>
      </tr>
      @endforeach
    </tbody>
  </table>



@endsection