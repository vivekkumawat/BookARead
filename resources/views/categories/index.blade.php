@extends('layouts.app')
@section('title', $categoryName)


@section('content')
    <section class="hero category-hero is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title has-text-centered has-text-white">
                    {{ $categoryName }}
                </h1>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered"></h1>
            <div class="columns is-multiline">
                @forelse($products as $product)
                        <div class="column is-2">
                            <figure class="image is-3by4">
                                <a href="{{route('shop.product', $product->slug)}}"><img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image"></a>
                            </figure>
                        </div>
                @empty
                    <div class="column">
                        <h2 class="subtitle has-text-centered">Sorry No Books found</h2>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            {{ $products->appends(request()->input())->links('partials.pagination') }}
        </div>
    </section>
@endsection
