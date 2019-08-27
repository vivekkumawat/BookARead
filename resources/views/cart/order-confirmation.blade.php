@extends('layouts.app')
@section('title', 'Order Placed Successfully')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Ordered Placed Successfully</h1>
            <h2 class="subtitle has-text-centered">A confirmation email was sent to you.</h2>
            <span class="has-text-centered"><i class="fas fa-check-circle fa-5x has-text-success"></i></span>
            <div class="buttons is-centered">
                    <a href="{{ route('shop.index') }}" class="button is-medium is-outlined is-dark">Continue Shopping</a>
                    <a href="{{ route('account.orders') }}" class="button is-medium is-primary">View Your Orders</a>
            </div>
        </div>
    </section>
@endsection
