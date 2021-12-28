@extends('v1.layouts.app')
@section('title', 'Projects')

@section('menu')

<div class="govuk-header__content">
  <a href="{{route('dashboard.index')}}" class="govuk-header__link govuk-header__link--service-name">
    Program Pool
  </a>
    <button type="button" class="govuk-header__menu-button govuk-js-header-toggle" aria-controls="navigation" aria-label="Show or hide navigation menu">Menu</button>
    <nav>
      <ul id="navigation" class="govuk-header__navigation " aria-label="Navigation menu">
        <li class="govuk-header__navigation-item govuk-header__navigation-item">
          <a class="govuk-header__link" href="{{route('projects.index')}}">
            My Projects
          </a>
        </li>
        <li class="govuk-header__navigation-item">
          <a class="govuk-header__link" href="{{route('tasks.index')}}">
            Tasks
          </a>
        </li>
          <li class="govuk-header__navigation-item">
            <a class="govuk-header__link" href="{{route('settings.index')}}">
              Settings
            </a>
          </li>
      </ul>
    </nav>
  </div>

@endsection

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
        <td class="govuk-table__cell"> avg mark</td>
        <td class="govuk-table__cell"><a href="{{route('staff_projects.show',$project->id)}}"> View</td>
      </tr>
      @endforeach
    </tbody>
  </table>



@endsection