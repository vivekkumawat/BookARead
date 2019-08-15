@extends('layouts.app')
@section('title', 'Sign up')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns is-centered is-vcentered">
                <div class="column is-two-fifths is-full-tablet">
                    <h1 class="title">Sign up to get started</h1>
                    <form class="register-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input" type="name" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                                <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                      </span>
                            </p>
                            @if ($errors->has('name'))
                                <p class="help is-danger">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                      </span>
                            </p>
                            @if ($errors->has('email'))
                                <p class="help is-danger">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                        <div class="field">
                            <p class="control has-icons-left">
                                <input class="input" type="password" name="password" placeholder="Password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </p>
                            @if ($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-primary is-fullwidth">Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <h2 class="subtitle is-size-6">Already have an account? <a href="{{ route('login') }}">Sign in</a></h2>
                </div>
            </div>
        </div>
    </section>
@endsection
