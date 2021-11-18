@section('menu')

<div class="govuk-header__content">
    <button type="button" class="govuk-header__menu-button govuk-js-header-toggle" aria-controls="navigation" aria-label="Show or hide navigation menu">Menu</button>
    <nav>
      <ul id="navigation" class="govuk-header__navigation " aria-label="Navigation menu">
        <li class="govuk-header__navigation-item govuk-header__navigation-item">
          <a class="govuk-header__link" href="{{route('tasks.index')}}">
            Tasks
          </a>
        </li>
      </ul>
    </nav>
  </div>
  

@endsection