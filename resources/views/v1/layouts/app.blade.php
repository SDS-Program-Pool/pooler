<!DOCTYPE html>
<html lang="en" class="govuk-template app-html-class">

<head>
  <meta charset="utf-8">
  <title>GOV.UK - Customised page template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta name="theme-color" content="blue">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="shortcut icon" sizes="16x16 32x32 48x48" href="/images/favicon.ico" type="image/x-icon">
  <link rel="mask-icon" href="/images/govuk-mask-icon.svg" color="blue">
  <link rel="apple-touch-icon" sizes="180x180" href="/images/govuk-apple-touch-icon-180x180.png">
  <link rel="apple-touch-icon" sizes="167x167" href="/images/govuk-apple-touch-icon-167x167.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/images/govuk-apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" href="/images/govuk-apple-touch-icon.png">

  <!--[if !IE 8]><!-->
  <link href="/govuk-frontend/all.css" rel="stylesheet">
  <!--<![endif]-->

  <!--[if IE 8]>
    <link href="/govuk-frontend/all-ie8.css" rel="stylesheet">
  <![endif]-->

  <!--[if lt IE 9]>
    <script src="/html5-shiv/html5shiv.js"></script>
  <![endif]-->

  <meta property="og:image" content="&lt;YOUR-DOMAIN&gt;/images/govuk-opengraph-image.png">
</head>

<body class="govuk-template__body app-body-class" data-test="My value" data-other="report:details">
  <script>
    document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');

  </script>

  <a href="#main-content" class="govuk-skip-link">Skip to main content</a>

  

  <header class="govuk-header " role="banner" data-module="govuk-header">
    <div class="govuk-header__container govuk-width-container">
      <div class="govuk-header__logo">
        <a href="#" class="govuk-header__link govuk-header__link--homepage">
          <span class="govuk-header__logotype">
            <span class="govuk-header__logotype-text">
              Program Pool
            </span>
          </span>
        </a>
      </div>
      <div class="govuk-header__content">
        <a href="#" class="govuk-header__link govuk-header__link--service-name">
          Service name
        </a>
        <button type="button" class="govuk-header__menu-button govuk-js-header-toggle" aria-controls="navigation" aria-label="Show or hide navigation menu">Menu</button>
        <nav>
          <ul id="navigation" class="govuk-header__navigation " aria-label="Navigation menu">
            <li class="govuk-header__navigation-item govuk-header__navigation-item--active">
              <a class="govuk-header__link" href="#1">
                Navigation item 1
              </a>
            </li>
            <li class="govuk-header__navigation-item">
              <a class="govuk-header__link" href="#2">
                Navigation item 2
              </a>
            </li>
            <li class="govuk-header__navigation-item">
              <a class="govuk-header__link" href="#3">
                Navigation item 3
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <div class="govuk-width-container app-width-container">
    <div class="govuk-phase-banner">
      <p class="govuk-phase-banner__content">
        <strong class="govuk-tag govuk-phase-banner__content__tag">
      alpha
    </strong>
        <span class="govuk-phase-banner__text">
          This is a new service – your <a class="govuk-link" href="#">feedback</a> will help us to improve it.
        </span>
      </p>
    </div>

    <a href="#" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper app-main-class" id="main-content" role="main">
      <h1 class="govuk-heading-xl">Customised page template</h1>
    </main>
  </div>

  <footer class="govuk-footer " role="contentinfo">
    <div class="govuk-width-container ">
      <div class="govuk-footer__meta">
        <div class="govuk-footer__meta-item govuk-footer__meta-item--grow">
          <h2 class="govuk-visually-hidden">Support links</h2>
          <ul class="govuk-footer__inline-list">
            <li class="govuk-footer__inline-list-item">
              <a class="govuk-footer__link" href="#1">
                Help
              </a>
            </li>
            <li class="govuk-footer__inline-list-item">
              <a class="govuk-footer__link" href="#2">
                Cookies
              </a>
            </li>
            <li class="govuk-footer__inline-list-item">
              <a class="govuk-footer__link" href="#3">
                Contact
              </a>
            </li>
            <li class="govuk-footer__inline-list-item">
              <a class="govuk-footer__link" href="#4">
                Terms and conditions
              </a>
            </li>
          </ul>

          <svg aria-hidden="true" focusable="false" class="govuk-footer__licence-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 483.2 195.7" height="17" width="41">
            <path fill="currentColor" d="M421.5 142.8V.1l-50.7 32.3v161.1h112.4v-50.7zm-122.3-9.6A47.12 47.12 0 0 1 221 97.8c0-26 21.1-47.1 47.1-47.1 16.7 0 31.4 8.7 39.7 21.8l42.7-27.2A97.63 97.63 0 0 0 268.1 0c-36.5 0-68.3 20.1-85.1 49.7A98 98 0 0 0 97.8 0C43.9 0 0 43.9 0 97.8s43.9 97.8 97.8 97.8c36.5 0 68.3-20.1 85.1-49.7a97.76 97.76 0 0 0 149.6 25.4l19.4 22.2h3v-87.8h-80l24.3 27.5zM97.8 145c-26 0-47.1-21.1-47.1-47.1s21.1-47.1 47.1-47.1 47.2 21 47.2 47S123.8 145 97.8 145" />
          </svg>
          <span class="govuk-footer__licence-description">
            Licence
            <a class="govuk-footer__link" href="https://www.nationalarchives.gov.uk/doc/open-government-licence/version/3/" rel="license">Open Government Licence v3.0</a>, except where otherwise stated
          </span>
        </div>
        <div class="govuk-footer__meta-item">
          <a class="govuk-footer__link govuk-footer__copyright-logo" href="https://www.nationalarchives.gov.uk/information-management/re-using-public-sector-information/uk-government-licensing-framework/crown-copyright/">© WMG</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="/govuk-frontend/all.js"></script>
</body>

</html>