@extends('v1.layouts.app')


@section('menu')

<div class="govuk-header__content">
    <a href="/" class="govuk-header__link govuk-header__link--service-name">
      Home
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
          <a class="govuk-header__link" href="#3">
            Mark Work
          </a>
        </li>
          <li class="govuk-header__navigation-item">
            <a class="govuk-header__link" href="#3">
              My Account
            </a>
          </li>
      </ul>
    </nav>
  </div>

@endsection

@section('content')


<!-- If user is student render the student dashboard etc etc.-->


@endsection