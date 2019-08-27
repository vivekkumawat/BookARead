@extends('layouts.app')
@section('title', 'Your Orders')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Your Orders</h1>
            <div class="columns is-centered">
                <div class="column is-half">
                        <div class="box">
                            <h2 class="subtitle has-text-centered">Orders</h2>
                                <div class="columns">
                                    <div class="column">
                                        <article class="media">
                                            <div class="media-left">
                                                <figure class="image is-64x64">
                                                    <img src="#" alt="Awesome Book">
                                                </figure>
                                            </div>
                                            <div class="media-content">
                                                <div class="content">
                                                    <p>
                                                        <a href="#">Book Name</a>
                                                        <br>
                                                        Qty: 1
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <form action="#" method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="button is-info"><i class="fas fa-undo-alt"></i>&nbsp; Return</button>
                                                </form>
                                            </div>
                                        </article>
                                        <hr>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection
