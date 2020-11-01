@extends('layouts.app')

@section('content')
    <div class="uk-section uk-section-xsmall uk-section-muted" data-uk-height-viewport="expand: true">
        <div class="uk-container">
            <h1>Create new reading</h1>
            <form action="{{ action([\App\Http\Controllers\ReadingController::class, 'store']) }}" method="post">
                @csrf
                <div class="uk-margin">
                    <label for="publish_date" class="uk-form-label">Date</label>
                    <input type="date" name="publish_date" id="publish_date" class="uk-input" required>
                </div>
                <div class="uk-margin">
                    <label for="passage" class="uk-form-label">Passage</label>
                    <input type="text" name="passage" id="passage" class="uk-input" placeholder="Mark 1:1-10" required>
                </div>
                <div class="uk-margin">
                    <input type="submit" class="uk-button uk-button-primary uk-border-rounded uk-width-1-1" value="Save reading">
                </div>
            </form>
        </div>
    </div>
@endsection
