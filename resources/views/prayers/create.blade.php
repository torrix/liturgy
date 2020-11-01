@extends('layouts.app')

@section('content')
    <div class="uk-section uk-section-xsmall uk-section-muted" data-uk-height-viewport="expand: true">
        <div class="uk-container">
            <h1>Create new prayer</h1>
            <form action="{{ action([\App\Http\Controllers\PrayerController::class, 'store']) }}"
                  class="uk-margin-remove"
                  method="post">
                @csrf
                <div class="uk-margin">
                    <label for="day" class="uk-form-label">Day</label>
                    <select name="day" id="day" class="uk-select" required>
                        <option value="">Select a day</option>
                        @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                            <option value="{{ $day }}">{{ $day }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="uk-margin">
                    <label for="prayer" class="uk-form-label">Text</label>
                    <textarea name="prayer" id="prayer" class="uk-textarea" rows="8"
                              required></textarea>
                </div>
                <div class="uk-margin">
                    <input type="submit" class="uk-button uk-button-primary uk-border-rounded uk-width-1-1"
                           value="Save prayer">
                </div>
            </form>
        </div>
    </div>
@endsection
