@extends('layouts.app')

@section('title', 'Your Account')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Your Account</h1>
            <div class="columns is-multiline is-centered">
                <div class="column">
                    <a href="{{ route('account.orders') }}">
                        <div class="box">
                            <article class="media">
                                <div class="media-left">
                                    <i class="fas fa-boxes fa-4x has-text-info"></i>
                                </div>
                                <div class="media-content">
                                    <h1 class="has-text-weight-bold">Your Orders</h1>
                                    <p>Track, return and manage your orders.</p>
                                </div>
                            </article>
                        </div>
                    </a>
                </div>
                <div class="column">
                    <a href="{{ route('account.settings') }}">
                        <div class="box">
                            <article class="media">
                                <div class="media-left">
                                    <i class="fas fa-user-cog fa-4x has-text-grey"></i>
                                </div>
                                <div class="media-content">
                                    <h1 class="has-text-weight-bold">Profile Settings</h1>
                                    <p>Update name, login and mobile numbers.</p>
                                </div>
                            </article>
                        </div>
                    </a>
                </div>
                <div class="column">
                    <a href="{{ route('account.addresses') }}">
                        <div class="box">
                            <article class="media">
                                <div class="media-left">
                                    <i class="fas fa-map-marker-alt fa-4x has-text-success"></i>
                                </div>
                                <div class="media-content">
                                    <h1 class="has-text-weight-bold">Your Addresses</h1>
                                    <p>Add or edit your addresses for orders.</p>
                                </div>
                            </article>
                        </div>
                    </a>
                </div>
                <div class="column">
                    <a href="{{ route('account.subscription') }}">
                        <div class="box">
                            <article class="media">
                                <div class="media-left">
                                    <i class="fas fa-money-check-alt fa-4x has-text-warning"></i>
                                </div>
                                <div class="media-content">
                                    <h1 class="has-text-weight-bold">Your Subscription</h1>
                                    <p>Upgrade and manage your subscription.</p>
                                </div>
                            </article>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
