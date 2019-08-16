@extends('layouts.app')
@section('title', 'Plans')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@6/bulma-pricingtable/dist/css/bulma-pricingtable.min.css">
@endsection
@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title is-spaced has-text-centered">Choose your plan</h1>
            <h2 class="subtitle has-text-centered">No commitments, cancel at any time.</h2>
            <div class="pricing-table is-comparative">
                <div class="pricing-plan is-features">
                    <div class="plan-header">Features</div>
                    <div class="plan-price"><span class="plan-price-amount">&nbsp;</span></div>
                    <div class="plan-items">
                        <div class="plan-item">Storage</div>
                        <div class="plan-item">Domains</div>
                        <div class="plan-item">Bandwidth</div>
                        <div class="plan-item">Email Boxes</div>
                    </div>
                </div>
                @foreach ($plans as $plan)
                    <div class="pricing-plan">
                        <div class="plan-header">{{ $plan->name }}</div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">Rs.</span>{{ number_format($plan->price) }}</span>/{{$plan->duration}}</div>
                        <div class="plan-items">
                            @if ($plan->features)
                                <div class="plan-item" data-feature="Bandwidth">{{ $plan->features }}</div>
                            @else
                                <div class="plan-item" data-feature="Email Boxes">-</div>
                            @endif
                        </div>
                        <div class="plan-footer">
                            @if(Auth::guest())
                                <a href="{{ route('register') }}" class="button is-fullwidth is-info">Get Started</a>
                            @else
                                <a href="{{ route('plans.show', $plan->slug) }}" class="button is-fullwidth is-info">Choose</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bulma-extensions@6/dist/js/bulma-extensions.min.js"></script>
@endsection
