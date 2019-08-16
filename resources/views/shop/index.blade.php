@extends('layouts.app')
@section('title', 'BookARead|Home')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1/slick/slick.min.css">
@endsection

@section('categories')
    @foreach($categories as $category)
    <a href="#" class="navbar-item">
        {{ $category->name }}
    </a>
    @endforeach
@endsection

@section('content')
    <section class="hero is-primary is-medium is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title has-text-centered">
                    Renting books is never easier than before.
                </h1>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container is-fullhd is-widescreen">
            <div class="columns">
                <div class="column">
                    <div class="box">
                        <article class="media">
                            <div class="media-left">
                                <i class="fas fa-money-check-alt fa-5x"></i>
                            </div>
                            <div class="media-content">
                                <h1 class="has-text-weight-bold">Subscribe to a plan</h1>
                                <p>Get free fast shipping with every order.</p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="column">
                    <div class="box">
                        <article class="media">
                            <div class="media-left">
                                <i class="fas fa-book fa-5x"></i>
                            </div>
                            <div class="media-content">
                                <h1 class="has-text-weight-bold">Rent your favourite books</h1>
                                <p>Get free fast shipping with every order.</p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="column">
                    <div class="box">
                        <article class="media">
                            <div class="media-left">
                                <i class="fas fa-shipping-fast fa-5x"></i>
                            </div>
                            <div class="media-content">
                                <h1 class="has-text-weight-bold">Free shipping & returns</h1>
                                <p>Get free fast shipping with every order.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="product-blocks">
                <div class="title has-text-centered">New Arrivals</div>
                <div class="product-slider">
                @foreach($products as $product)
                    <div>
                        <figure class="image is-3by4">
                            <a href="{{route('shop.product', $product->slug)}}"><img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image"></a>
                        </figure>
                    </div>
                @endforeach
            </div>
            </div>
            <div class="product-blocks">
                <div class="title has-text-centered">Bestseller Books</div>
                <div class="product-slider">
                    @foreach($products as $product)
                        <div>
                            <figure class="image is-3by4">
                                <a href="{{route('shop.product', $product->slug)}}"><img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image"></a>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="product-blocks">
                <div class="title has-text-centered">Most Popular</div>
                <div class="product-slider">
                    @foreach($products as $product)
                        <div>
                            <figure class="image is-3by4">
                                <a href="{{route('shop.product', $product->slug)}}"><img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image"></a>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="product-blocks">
                <div class="title has-text-centered">Popular Authors</div>
                <div class="product-slider">
                    @foreach($products as $product)
                        <div>
                            <figure class="image is-128x128">
                                <a href="{{route('shop.product', $product->slug)}}"><img class="is-rounded" src="https://bulma.io/images/placeholders/256x256.png" alt="Placeholder image"></a>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="section donate-books-sec">
        <div class="container">
            <h1 class="title has-text-white">Donate books</h1>
            <p class="subtitle has-text-white">Donate books and get 20% off coupon code</p>
            <a href="#" class="button is-light is-medium is-outlined">Donate Books</a>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1/slick/slick.min.js"></script>
@endsection
