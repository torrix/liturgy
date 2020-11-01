@extends('layouts.app')

@section('content')
    <div class="uk-section uk-section-xsmall uk-section-muted" data-uk-height-viewport="expand: true">
        <div class="uk-container">
            <h1>Prayers</h1>
            <p>
                <a href="{{ action([\App\Http\Controllers\PrayerController::class, 'create']) }}"
                   class="uk-button uk-button-primary uk-border-rounded">
                    New Prayer
                </a>
            </p>
            @if(count($prayers))
                <table class="uk-table uk-table-striped uk-width-1-1">
                    <thead>
                    <tr>
                        <th class="uk-table-expand">Day</th>
                        <th class="uk-table-shrink">Edit</th>
                        <th class="uk-table-shrink">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($prayers as $prayer)
                        <tr>
                            <td>{{ $prayer['day'] }}</td>
                            <td>
                                <a href="{{ action([\App\Http\Controllers\PrayerController::class, 'show'], ['prayer' => $prayer]) }}"
                                   class="uk-icon-button uk-button-primary">
                                    <span data-uk-icon="pencil"></span>
                                </a>
                            </td>
                            <td>
                                <form action="{{ action([\App\Http\Controllers\PrayerController::class, 'destroy'], ['prayer' => $prayer]) }}"
                                      onsubmit="return confirm('Are you sure?')"
                                      method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="uk-icon-button uk-button-danger">
                                        <span data-uk-icon="trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
