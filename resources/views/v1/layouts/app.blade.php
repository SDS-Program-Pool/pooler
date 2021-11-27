<!DOCTYPE html>
<html lang="en" class="govuk-template app-html-class">

<head>
  <meta charset="utf-8">
  <title>@yield('title') - Program Pool</title>
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

</head>

<body class="govuk-template__body app-body-class" data-test="My value" data-other="report:details">
  <script>document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');</script>


  <a href="#main-content" class="govuk-skip-link">Skip to main content</a>

  <header class="govuk-header " role="banner" data-module="govuk-header">
    <div class="govuk-header__container govuk-width-container">
      <div class="govuk-header__logo">
        <a href="/" class="govuk-header__link govuk-header__link--homepage">
          <span class="govuk-header__logotype">
            <span class="govuk-header__logotype-text">
              Program Pool
            </span>
          </span>
        </a>
      </div>

      @yield('menu')

    </div>
  </header>

  <div class="govuk-width-container app-width-container">
    <div class="govuk-phase-banner">
      <p class="govuk-phase-banner__content">
        <strong class="govuk-tag govuk-phase-banner__content__tag">
      alpha
    </strong>
        <span class="govuk-phase-banner__text">
          This is a new service – your <a class="govuk-link" href="https://github.com/SDS-Program-Pool/pooler/issues" target="_blank">feedback</a> will help us to improve it.
        </span>
      </p>
    </div>

    

   <!-- <a href="#" class="govuk-back-link">Back</a> -->

    <main class="govuk-main-wrapper app-main-class" id="main-content" role="main">

      @yield('content')
      
      
    </main>
  </div>

  <footer class="govuk-footer " role="contentinfo">
    <div class="govuk-width-container ">
      <div class="govuk-footer__meta">
        <div class="govuk-footer__meta-item govuk-footer__meta-item--grow">
          <h2 class="govuk-visually-hidden">Support links</h2>
          <ul class="govuk-footer__inline-list">
            <li class="govuk-footer__inline-list-item">
              <a class="govuk-footer__link" href="mailto:contact@program-pool.co.uk">
                Help
              </a>
            </li>
            <li class="govuk-footer__inline-list-item">
              <a class="govuk-footer__link" href="#2">
                Cookies
              </a>
            </li>
            <li class="govuk-footer__inline-list-item">
              <a class="govuk-footer__link" href="mailto:contact@program-pool.co.uk">
                Contact
              </a>
            </li>
            <li class="govuk-footer__inline-list-item">
              <a class="govuk-footer__link" href="#4">
                Terms and conditions
              </a>
            </li>
            <li class="govuk-footer__inline-list-item">
              <a class="govuk-footer__link" href="{{route('opensource.index')}}">
                Open Source Licences
              </a>
            </li>
          </ul>


          <span class="govuk-footer__misc-description">
            @if (Auth::check())
              <p> You are logged in as {{Auth::user()->username}} </p>
            @endif

            <p> This page took {{ round(microtime(true) - LARAVEL_START, 3) }} seconds to render</p>
            <p> This system is hosted on the Cyber Security Centre infrastructure.</p>
          </span>
          
        </div>
        <div class="govuk-footer__meta-item">
          <a class="govuk-footer__link govuk-footer__copyright-logo" href="https://warwick.ac.uk/fac/sci/wmg/research/digital/csc/">Copyright © WMG CSC Internal</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="/govuk-frontend/all.js"></script>
  <script>
    window.GOVUKFrontend.initAll()
  </script>
</body>

</html>