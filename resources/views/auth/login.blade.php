@extends('layouts.app')
@section('title', 'Sign in')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns is-centered is-vcentered">
                <div class="column is-two-fifths is-full-tablet">
                    <h1 class="title">Hey, Welcome Back</h1>
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
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
                        <div class="field is-grouped">
                            <div class="control is-expanded">
                                <label class="checkbox">
                                    <input type="checkbox"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                            <div class="control">
                                <a href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-primary is-fullwidth">Sign in</button>
                            </div>
                        </div>
                    </form>
                    <h2 class="subtitle is-size-6">New to BookARead? <a href="{{ route('register') }}">Sign up now</a></h2>
                </div>
            </div>
        </div>
    </section>
@endsection
