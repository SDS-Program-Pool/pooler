@extends('v1.layouts.app')
@section('title', 'Settings')


@extends('v1.settings.student.menu')

@section('content')

<h1 class="govuk-heading-xl">Settings</h1>

<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="#">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="#">Settings</a>
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
    </ul>
    <div class="govuk-tabs__panel" id="overview">
      <h2 class="govuk-heading-l">Overview</h2>
      <dl class="govuk-summary-list">
        <div class="govuk-summary-list__row">
          <dt class="govuk-summary-list__key">
            Project Name
          </dt>
          <dd class="govuk-summary-list__value">
            Data 
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
            Created at
          </dd>
          <dd class="govuk-summary-list__actions"></dd>
        </div>
        <div class="govuk-summary-list__row">
          <dt class="govuk-summary-list__key">
            File
          </dt>
          <dd class="govuk-summary-list__value">
            test.zip
          </dd>
          <dd class="govuk-summary-list__actions">
            <a class="govuk-link" href="#">
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
              Finished
            </strong>
          </dd>
          <dd class="govuk-summary-list__actions"></dd>
        </div>
      </dl>
      <!--<table class="govuk-table">
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
      </table>-->
  
    </div>
    <!--  ADD BACK --hidden flag after __panel on each relavent div.  -->
    <div class="govuk-tabs__panel govuk-tabs__panel" id="mark">
      <h2 class="govuk-heading-l">Mark</h2>
      <dl class="govuk-summary-list">
        <div class="govuk-summary-list__row">
          <dt class="govuk-summary-list__key">
            Assessor 1
          </dt>
          <dd class="govuk-summary-list__value">
            List Value
          </dd>
          <dd class="govuk-summary-list__actions">
            <a class="govuk-link" href="#">
              Change<span class="govuk-visually-hidden"> project name</span>
            </a>
          </dd>
        </div>
        <div class="govuk-summary-list__row">
          <dt class="govuk-summary-list__key">
            Assessor 2
          </dt>
          <dd class="govuk-summary-list__value">
            Dot dot dot
          </dd>
          <dd class="govuk-summary-list__actions"></dd>
        </div>
        <div class="govuk-summary-list__row">
          <dt class="govuk-summary-list__key">
            Assessor 3
          </dt>
          <dd class="govuk-summary-list__value">
            test.zip
          </dd>
          <dd class="govuk-summary-list__actions">
            <a class="govuk-link" href="#">
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
              Finished
            </strong>
          </dd>
          <dd class="govuk-summary-list__actions"></dd>
        </div>
      </dl>
  
    </div>
    <div class="govuk-tabs__panel govuk-tabs__panel" id="mark-review">
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



@endsection