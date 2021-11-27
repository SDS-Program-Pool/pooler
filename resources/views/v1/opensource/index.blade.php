@extends('v1.layouts.app')


@section('menu')

<div class="govuk-header__content">
    <a href="/" class="govuk-header__link govuk-header__link--service-name">
      Home
    </a>
    <button type="button" class="govuk-header__menu-button govuk-js-header-toggle" aria-controls="navigation" aria-label="Show or hide navigation menu">Menu</button>
  </div>

@endsection

@section('content')


<main class="govuk-main-wrapper " id="main-content" role="main">
				
  <h1 class="govuk-heading-xl">Open source</h1>
  <p class="govuk-body-l">Software packages utilised by Program Pool</p>
  <h1 class="govuk-heading-l">This Website</h1>

<p class="govuk-body">The open source projects that are used by this website.</p>

<div class="govuk-accordion" data-module="govuk-accordion" id="accordion-default"><div class="govuk-accordion__controls"><button type="button" class="govuk-accordion__open-all" aria-expanded="false">Open all<span class="govuk-visually-hidden"> sections</span></button></div>


<div class="govuk-accordion__section">
<div class="govuk-accordion__section-header">
<h2 class="govuk-accordion__section-heading">
  
  <button type="button" id="accordion-default-heading-2" aria-controls="accordion-default-content-1" class="govuk-accordion__section-button" aria-expanded="false">
  govuk-frontend
    <span class="govuk-accordion__icon" aria-hidden="true"></span></button></h2>
  </div>
  <div id="accordion-default-content-1" class="govuk-accordion__section-content" aria-labelledby="accordion-default-heading-2">
  <p class="govuk-body">We use the govuk-frontend for our public websites.</p>
  <p class="govuk-body">
  <a href="https://github.com/alphagov/govuk-frontend" class="govuk-link">Source</a>
  <a href="https://design-system.service.gov.uk/" class="govuk-link">Homepage</a>
  </p>
  <pre>The MIT License (MIT)
  <p>Copyright (C) 2017 Crown Copyright (Government Digital Service)</p>
  <p>Permission is hereby granted, free of charge, to any person obtaining a copy of
  this software and associated documentation files (the "Software"), to deal in
  the Software without restriction, including without limitation the rights to
  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
  of the Software, and to permit persons to whom the Software is furnished to do
  so, subject to the following conditions:</p>
  <p>The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.</p>
  <p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
  SOFTWARE.
  </p></pre><p></p>
  

  </div>

</div>

</div>



<h1 class="govuk-heading-l">Server Infrastructure</h1>
<p class="govuk-body">Open source projects utilised by our server infrastructure</p>
<div class="govuk-accordion" data-module="govuk-accordion" id="accordion-default"><div class="govuk-accordion__controls"><button type="button" class="govuk-accordion__open-all" aria-expanded="false">Open all<span class="govuk-visually-hidden"> sections</span></button></div>


<div class="govuk-accordion__section">
<div class="govuk-accordion__section-header">
<h2 class="govuk-accordion__section-heading">

<button type="button" id="accordion-default-heading-1" aria-controls="accordion-default-content-1" class="govuk-accordion__section-button" aria-expanded="false">
NGINX
<span class="govuk-accordion__icon" aria-hidden="true"></span></button></h2>
</div>

</div>

</div>

</main>

@endsection