@section('menu')

<div class="govuk-header__content">
    <a href="{{route('settings.index')}}" class="govuk-header__link govuk-header__link--service-name">
        Settings
    </a>
    <button type="button" class="govuk-header__menu-button govuk-js-header-toggle" aria-controls="navigation" aria-label="Show or hide navigation menu">Menu</button>
    <nav>
      <ul id="navigation" class="govuk-header__navigation " aria-label="Navigation menu">
        <li class="govuk-header__navigation-item govuk-header__navigation-item">
          <a class="govuk-header__link" href="{{route('projects.index')}}">
            Settings
          </a>
        </li>
        <li class="govuk-header__navigation-item">
          <a class="govuk-header__link" href="{{ route('projects.create') }}">
            Notifications
          </a>
        </li>
        <li class="govuk-header__navigation-item">
            <a class="govuk-header__link" href="{{ route('projects.create') }}">
              Export Data
            </a>
        </li>
      </ul>
    </nav>
  </div>
  

@endsection