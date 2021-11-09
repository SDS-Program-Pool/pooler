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

{{$project_data}}


or... e.g

{{$project_data->id}}

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