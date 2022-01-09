@extends('v1.layouts.app')
@section('title', 'Dashboard')

@extends('v1.staff.dashboard.menu')

@section('content')

<h1 class="govuk-heading-xl">Students</h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('dashboard.index') }}">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.index') }}">Students</a>
      </li>
    </ol>
  </div>


<table class="govuk-table">
    <caption class="govuk-table__caption govuk-table__caption--m">Student List</caption>
    <thead class="govuk-table__head">
      <tr class="govuk-table__row">
        <th scope="col" class="govuk-table__header">Name</th>
        <th scope="col" class="govuk-table__header">Projects Submitted</th>
        <th scope="col" class="govuk-table__header">Average Mark</th>
        <th scope="col" class="govuk-table__header">View Profile</th>
      </tr>
    </thead>
    <tbody class="govuk-table__body">
        @foreach($userData as $user)
      <tr class="govuk-table__row">
        <th scope="row" class="govuk-table__header">{{$user->FullName}} <br> {{$user->username}}</th>
        <td class="govuk-table__cell"> {{$user->projects->count()}} </td>
        <td class="govuk-table__cell"></td>
        <td class="govuk-table__cell"><a href="{{route('staff_students.show',$user->id)}}"> View</td>
      </tr>
      @endforeach
    </tbody>
  </table>



@endsection