@extends('layouts.app')
@section('title', $product->name)

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-one-quarter">
                    <figure class="image is-4by5">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="Awesome Book">
                    </figure>
                </div>
                <div class="column is-half">
                        <h1 class="title">{{ $product->name }}</h1>
                        <h2 class="subtitle shadow is-success">By: {{ $product->author }}</h2>
                        <p>{{ $product->description }}</p>
                    <form action="{{ route('cart.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <button type="submit" class="button is-primary is-fullwidth">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
