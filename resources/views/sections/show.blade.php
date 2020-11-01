@extends('layouts.app')

@section('content')
    <div class="uk-section uk-section-xsmall uk-section-muted" data-uk-height-viewport="expand: true">
        <div class="uk-container">
            <h1>Edit section</h1>
            <form action="{{ action([\App\Http\Controllers\SectionController::class, 'update'], ['section' => $section]) }}"
                  method="post">
                <input type="hidden" name="_method" value="PATCH">
                @csrf
                <div class="uk-margin">
                    <label for="section" class="uk-form-label">Section</label>
                    <input type="text" name="section" id="section" class="uk-input" required value="{{ $section['section'] }}">
                </div>
                <div class="uk-margin">
                    <label for="content" class="uk-form-label">Content</label>
                    <textarea name="content" id="content" class="uk-textarea" rows="8" required>{{ $section['content'] }}</textarea>
                </div>
                <div class="uk-margin">
                    <input type="submit" class="uk-button uk-button-primary uk-border-rounded uk-width-1-1" value="Save section">
                </div>
            </form>
        </div>
    </div>
@endsection
