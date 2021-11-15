@extends('v1.layouts.app')
@section('title', 'View Project')


@extends('v1.project.menu')

@section('content')

<h1 class="govuk-heading-xl">Project - {{ $project_data->name }}</h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="/">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.index') }}">My Projects</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="{{ route('projects.show',$project_data->id) }}">Project - {{ $project_data->name }}</a>
      </li>
    </ol>
</div>


<div class="govuk-tabs" data-module="govuk-tabs">
  <h2 class="govuk-tabs__title">
    Contents
  </h2>
  <ul class="govuk-tabs__list">
    <li class="govuk-tabs__list-item govuk-tabs__list-item--selected">
      <a class="govuk-tabs__tab" href="#past-day">
        Overview
      </a>
    </li>
    <li class="govuk-tabs__list-item">
      <a class="govuk-tabs__tab" href="#past-week">
        Mark
      </a>
    </li>
    <li class="govuk-tabs__list-item">
      <a class="govuk-tabs__tab" href="#past-month">
        Mark Review
      </a>
    </li>
  </ul>
  <div class="govuk-tabs__panel" id="past-day">
    <h2 class="govuk-heading-l">Overview</h2>
    <table class="govuk-table">
      <thead class="govuk-table__head">
        <tr class="govuk-table__row">
          <th scope="col" class="govuk-table__header">Case manager</th>
          <th scope="col" class="govuk-table__header">Cases opened</th>
          <th scope="col" class="govuk-table__header">Cases closed</th>
        </tr>
      </thead>
      <tbody class="govuk-table__body">
        <tr class="govuk-table__row">
          <td class="govuk-table__cell">David Francis</td>
          <td class="govuk-table__cell">3</td>
          <td class="govuk-table__cell">0</td>
        </tr>
        <tr class="govuk-table__row">
          <td class="govuk-table__cell">Paul Farmer</td>
          <td class="govuk-table__cell">1</td>
          <td class="govuk-table__cell">0</td>
        </tr>
        <tr class="govuk-table__row">
          <td class="govuk-table__cell">Rita Patel</td>
          <td class="govuk-table__cell">2</td>
          <td class="govuk-table__cell">0</td>
        </tr>
      </tbody>
    </table>

  </div>
  <div class="govuk-tabs__panel govuk-tabs__panel--hidden" id="past-week">
    <h2 class="govuk-heading-l">Mark</h2>
    <table class="govuk-table">
      <thead class="govuk-table__head">
        <tr class="govuk-table__row">
          <th scope="col" class="govuk-table__header">Case manager</th>
          <th scope="col" class="govuk-table__header">Cases opened</th>
          <th scope="col" class="govuk-table__header">Cases closed</th>
        </tr>
      </thead>
      <tbody class="govuk-table__body">
        <tr class="govuk-table__row">
          <td class="govuk-table__cell">David Francis</td>
          <td class="govuk-table__cell">24</td>
          <td class="govuk-table__cell">18</td>
        </tr>
        <tr class="govuk-table__row">
          <td class="govuk-table__cell">Paul Farmer</td>
          <td class="govuk-table__cell">16</td>
          <td class="govuk-table__cell">20</td>
        </tr>
        <tr class="govuk-table__row">
          <td class="govuk-table__cell">Rita Patel</td>
          <td class="govuk-table__cell">24</td>
          <td class="govuk-table__cell">27</td>
        </tr>
      </tbody>
    </table>

  </div>
  <div class="govuk-tabs__panel govuk-tabs__panel--hidden" id="past-month">
    <h2 class="govuk-heading-l">Mark Review</h2>
    <table class="govuk-table">
      <thead class="govuk-table__head">
        <tr class="govuk-table__row">
          <th scope="col" class="govuk-table__header">Case manager</th>
          <th scope="col" class="govuk-table__header">Cases opened</th>
          <th scope="col" class="govuk-table__header">Cases closed</th>
        </tr>
      </thead>
      <tbody class="govuk-table__body">
        <tr class="govuk-table__row">
          <td class="govuk-table__cell">David Francis</td>
          <td class="govuk-table__cell">98</td>
          <td class="govuk-table__cell">95</td>
        </tr>
        <tr class="govuk-table__row">
          <td class="govuk-table__cell">Paul Farmer</td>
          <td class="govuk-table__cell">122</td>
          <td class="govuk-table__cell">131</td>
        </tr>
        <tr class="govuk-table__row">
          <td class="govuk-table__cell">Rita Patel</td>
          <td class="govuk-table__cell">126</td>
          <td class="govuk-table__cell">142</td>
        </tr>
      </tbody>
    </table>

  </div>
</div>


<!-- 
show project name,
upload date,
download zip
request re mark
show feedback
show marks

https://design-system.service.gov.uk/components/

Isaac Maybe you do this...?
-->


               
@endsection