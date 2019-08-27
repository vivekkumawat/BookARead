@extends('layouts.app')
@section('title', 'Checkout')


@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Checkout</h1>
            <div class="columns is-centered is-variable is-8">
                <div class="column is-5">
                    <h2 class="subtitle">Shipping Details</h2>
                    <form method="POST" action="{{ route('cart.checkout.store') }}">
                        {{ csrf_field() }}
                        <div class="field">
                            <div class="control">
                                <input class="input" name="name" type="text" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" name="email" type="email" placeholder="Your Email Address">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" name="mobile_no" type="text" placeholder="Mobile Number">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" name="address" type="text" placeholder="Address">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" name="city" type="text" placeholder="City">
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <div class="control is-expanded">
                                <input class="input" name="state" type="text" placeholder="State">
                            </div>
                            <div class="control has-icons-left">
                                <div class="select">
                                    <select name="country">
                                        <option value="" selected>Country</option>
                                        <option>India</option>
                                    </select>
                                </div>
                                <div class="icon is-small is-left">
                                    <i class="fas fa-globe"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" name="pincode" type="text" placeholder="Pin Code">
                            </div>
                            @if ($errors->has('pincode'))
                                <p class="help is-danger">
                                    {{ $errors->first('pincode') }}
                                </p>
                            @endif
                        </div>
{{--                        <div class="field has-text-left">--}}
{{--                            <label class="checkbox">--}}
{{--                                <input type="checkbox" name="checkbox">--}}
{{--                                Save this address for future checkout--}}
{{--                            </label>--}}
{{--                        </div>--}}
                        <button type="submit" class="button is-primary is-fullwidth">Place Order</button>
                    </form>
                </div>
                <div class="column is-narrow">
                    <h2 class="subtitle">Order Details</h2>
                    @foreach(Cart::content() as $item)

                    <article class="media">
                        <figure class="media-left">
                            <p class="image is-64x64">
                                <img src="{{ asset('storage/'.$item->model->image) }}" alt="Awesome Book">
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <a href="{{ $item->model->slug }}">{{ $item->model->name }}</a>
                                    <br>
                                    Qty: {{ $item->qty }}
                                </p>
                            </div>
                        </div>
                    </article>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
