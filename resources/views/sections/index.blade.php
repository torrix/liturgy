@extends('layouts.app')

@section('content')
    <div class="uk-section uk-section-xsmall uk-section-muted" data-uk-height-viewport="expand: true">
        <div class="uk-container">
            <h1>Sections</h1>
            <p>
                <a href="{{ action([\App\Http\Controllers\SectionController::class, 'create']) }}"
                   class="uk-button uk-button-primary uk-border-rounded">
                    New Section
                </a>
            </p>
            @if(count($sections))
                <table class="uk-table uk-table-striped uk-width-1-1">
                    <thead>
                    <tr>
                        <th>Section</th>
                        <th class="uk-table-shrink">Edit</th>
                        <th class="uk-table-shrink">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sections as $section)
                        <tr>
                            <td>{{ $section['section'] }}</td>
                            <td>
                                <a href="{{ action([\App\Http\Controllers\SectionController::class, 'show'], ['section' => $section]) }}"
                                   class="uk-icon-button uk-button-primary">
                                    <span data-uk-icon="pencil"></span>
                                </a>
                            </td>
                            <td>
                                <form action="{{ action([\App\Http\Controllers\SectionController::class, 'destroy'], ['section' => $section]) }}"
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
