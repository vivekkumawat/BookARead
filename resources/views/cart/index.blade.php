@extends('layouts.app')
@section('title', 'BookARead|Home')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Your Cart</h1>
            <div class="columns is-centered">
                <div class="column is-half">
                    @if (Cart::count() > 0)
                    <div class="box">
                        <h2 class="subtitle has-text-centered">{{ Cart::count() }} Item(s) in cart</h2>
                        @foreach(Cart::content() as $item)
                        <div class="columns">
                            <div class="column">
                                <article class="media">
                                    <div class="media-left">
                                        <figure class="image is-64x64">
                                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <div class="content">
                                            <p>
                                                <a href="{{ route('shop.product', $item->model->slug) }}">{{ $item->model->name }}</a>
                                                <br>
                                                Qty: {{ $item->qty }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="media-right">
                                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="button is-danger"><i class="fas fa-trash-alt"></i>&nbsp; Remove</button>
                                        </form>
                                    </div>
                                </article>
                                <hr>
                            </div>
                        </div>
                        @endforeach
                        <a href="#" class="button is-primary is-fullwidth">Place Order</a>
                    </div>
                        @else
                        <h2>No items in cart</h2>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
