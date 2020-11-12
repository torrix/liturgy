@extends('layouts.app')

@section('content')
    <div class="uk-section uk-section-xsmall uk-section-muted" data-uk-height-viewport="expand: true">
        <div class="uk-container">
            <h1 class="uk-text-center">{{ date('l jS F Y', strtotime($date)) }}</h1>

            <h2 class="uk-text-center">Meeting details</h2>
            {!! $sections['meetingDetails'] ?? '' !!}

            <div class="uk-card uk-card-body uk-card-primary uk-padding uk-text-center">
                {!! $sections['zoom'] ?? '' !!}
            </div>

            <h2 class="uk-text-center">Meeting expectations</h2>
            {!! $sections['meetingExpectations'] ?? '' !!}

            <h2 class="uk-text-center">Opening</h2>
            <div class="uk-card uk-body uk-card-default uk-padding">
                {!! $sections['opening'] ?? '' !!}
            </div>

            <h2 class="uk-text-center">Declaration of faith</h2>
            <div class="uk-card uk-body uk-card-default uk-padding">
                {!! $sections['declarationOfFaith'] ?? '' !!}
            </div>

            @foreach($readings as $reading)
                <h2 class="uk-text-center">Scripture reading</h2>
                <div class="uk-card uk-body uk-card-default uk-padding">
                    <h3>{{ $reading['readingTitle'] }}</h3>
                    <div class="gd-reading">
                        {!! $reading['readingText'] !!}
                        <p class="uk-text-right uk-text-small">
                            <a href="{{ $reading['url'] }}" target="_blank">NRSV</a>
                        </p>
                    </div>
                </div>
            @endforeach

            <h2 class="uk-text-center">Prayers for others</h2>
            <div class="uk-card uk-body uk-card-default uk-padding">
                {!! $prayer !!}
            </div>

            <h2 class="uk-text-center">Canticle</h2>
            <div class="uk-card uk-body uk-card-default uk-padding">
                {!! $sections['canticle'] ?? '' !!}
            </div>

            <h2 class="uk-text-center">Blessing</h2>
            <div class="uk-card uk-body uk-card-default uk-padding">
                {!! $sections['blessing'] ?? '' !!}
            </div>

            <hr class="uk-divider-icon">

            <h2 class="uk-h4">Acknowledgements</h2>

            <dl class="uk-text-small">
                <dt>Structure, Opening, Canticle and Blessing:</dt>
                <dd>
                    Taken from Morning Prayer from Northumbria Community’s Celtic Daily Prayer published by Collins.
                </dd>

                <dt>Declaration of Faith</dt>
                <dd>
                    Adapted from
                    <a href="http://inclusive-church.org/" target="_blank">http://inclusive-church.org/</a>.
                </dd>

                <dt>Scriptures</dt>
                <dd>
                    <a href="http://nrsvbibles.org" target="_blank">New Revised Standard Version Bible</a>:
                    Anglicized Edition, copyright © 1989, 1995 National Council of the Churches of Christ in the United
                    States of America. Used by permission. All rights reserved worldwide.
                </dd>
            </dl>
        </div>
    </div>
@endsection
