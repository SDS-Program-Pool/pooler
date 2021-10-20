@extends('v1.layouts.app')

@section('content')

<main>
    <!-- Page header-->
    <header class="bg-dark">
        <div class="container-xl px-5"><h1 class="text-white py-3 mb-0 display-6">Upload My Code</h1></div>
    </header>
    <div class="container-xl p-5">
        <div class="card card-raised">
            <div class="card-body text-center p-5">
                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf
                <div class="mb-3">
                    <label class="form-label" for="formFile">Upload ZIP TAR</label>
                    <input class="form-control" id="formFile" type="file" />
                </div>

                <div class="mb-4">
                    <select class="form-select" id="team_type" name="team_type" aria-label="select team type">
                        <option value="team_individual" selected="">Individual</option>
                        <option value="team_feature_branch">Team - Feature Branch</option>
                        <option value="team">Team</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
            </div>
        </div>
    </div>
</main>

@endsection