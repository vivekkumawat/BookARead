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
            <div class="pricing-table">
                @foreach ($plans as $plan)
                    <div class="pricing-plan">
                        <div class="plan-header">{{ $plan->name }}</div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">Rs</span>{{ number_format($plan->price) }}</span></div>
                        <div class="plan-items">
                            <div class="plan-item">{{ $plan->no_of_books }}</div>
                            <div class="plan-item">{{ $plan->duration }}</div>
                            <div class="plan-item">{{ $plan->books_type }}</div>
                            <div class="plan-item">{{ $plan->delivery }}</div>
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
