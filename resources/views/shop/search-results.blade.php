@extends('layouts.app')
@section('title', 'Search Result')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Search Results</h1>
            <p class="subtitle has-text-centered">{{ $products->count() }} Book(s) found for <span class="shadow is-success">{{ request()->input('query') }}</span></p>
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
