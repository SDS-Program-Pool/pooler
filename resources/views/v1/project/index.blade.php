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
        
          @if($project_data)

            @foreach($project_data as $project)
              <tr class="govuk-table__row">
                <th scope="row" class="govuk-table__header">{{$project->name}}</th>
                <td class="govuk-table__cell">{{$project->created_at}}</td>
                <td class="govuk-table__cell">{{$project->status}}</td>
                <td class="govuk-table__cell"><a href="{{ route('projects.show',$project->id) }}" target=”_blank”>View More</td>
              </tr>
            @endforeach
          @else

          <h2> No Items in Table </h2>
          @endif
          
    </tbody>
  </table>



@endsection