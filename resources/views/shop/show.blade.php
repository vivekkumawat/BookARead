@extends('layouts.app')
@section('title', $product->name)

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-one-quarter">
                    <figure class="image is-4by5">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/91ZXbuNExRL.jpg">
                    </figure>
                </div>
                <div class="column is-half">
                        <h1 class="title">{{ $product->name }}</h1>
                        <h2 class="subtitle shadow is-success">By: {{ $product->author }}</h2>
                        <p>{{ $product->description }}</p>
                        <a href="#" class="button is-primary is-fullwidth">Add to cart</a>
                </div>
            </div>
        </div>
    </section>
@endsection
