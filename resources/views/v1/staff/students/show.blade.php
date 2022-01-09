@extends('v1.layouts.app')
@section('title', 'View Student Project')

@extends('v1.staff.dashboard.menu')

@section('content')


<h1 class="govuk-heading-xl">Student - {{ $student->FullName }}</h1>

<div class="govuk-breadcrumbs govuk-!-padding-bottom-4">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="/">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('staff_students.index') }}">Students</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('staff_students.show',$student->id) }}">Student - {{ $student->FullName }}</a>
      </li>
    </ol>
</div>

<p class="govuk-body"> <b>Student ID # - </b> {{$student->username}}</p>

<table class="govuk-table">
    <caption class="govuk-table__caption govuk-table__caption--m">Student</caption>
    <thead class="govuk-table__head">
      <tr class="govuk-table__row">
        <th scope="col" class="govuk-table__header">Project Name</th>
        <th scope="col" class="govuk-table__header">View</th>
      </tr>
    </thead>
    <tbody class="govuk-table__body">
        @foreach($student->projects as $project)
      <tr class="govuk-table__row">
        <th scope="row" class="govuk-table__header">{{$project->name}}</th>
        <td class="govuk-table__cell"><a href="{{route('staff_projects.show',$project->id)}}"> View</td>
      </tr>
      @endforeach
    </tbody>
  </table>


               
@endsection