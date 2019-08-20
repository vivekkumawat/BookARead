@extends('layouts.app')
@section('title', 'Plan Checkout')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@6/bulma-pricingtable/dist/css/bulma-pricingtable.min.css">
@endsection
@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Checkout Summary</h1>
            <div class="columns is-centered">
                <div class="column is-one-quarter">
                    <div class="box has-text-centered">
                        <h2 class="subtitle">Your plan details</h2>
                        <h3>{{ $plan->name }} Plan</h3>
                        <br>
                        <div class="columns">
                            <div class="column">Plan Price:</div>
                            <div class="column">{{ $plan->price }}Rs</div>
                        </div>
                        @if(session()->has('coupon_code'))
                            <div class="columns">
                                <div class="column has-text-weight-bold is-expanded">Coupon Discount ({{ session()->get('coupon_code')['name'] }}):</div>
                                <div class="column has-text-weight-bold">-{{ session()->get('coupon_code')['discount'] }}Rs</div>
                            </div>
                            <form action="{{ route('coupon.destroy') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="button" type="submit">Remove Code</button>
                            </form>
                        @endif
                        <div class="columns">
                            <div class="column">Security Deposit:</div>
                            <div class="column">{{ $plan->security_deposit }}Rs</div>
                        </div>
                        <div class="columns">
                            <div class="column has-text-weight-bold is-size-5">Order Total:</div>
                            <div class="column has-text-weight-bold is-size-5">{{ $plan->total_price - session()->get('coupon_code')['discount'] }}Rs</div>
                        </div>
                        <hr>
                        <h2 class="subtitle">Have a Coupon Code?</h2>
                        <form action="{{ route('coupon.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="field has-addons">
                                <p class="control">
                                    <input class="input" type="text" name="coupon_code" placeholder="Enter coupon code">
                                </p>
                                <p class="control">
                                    <button class="button is-dark" type="submit">
                                        Apply
                                    </button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="column is-half">
                    <div class="box has-text-centered">
                        <h2 class="subtitle">Billing Details</h2>
                        <form method="POST" action="{{ route('plans.pay') }}">
                            {{ csrf_field() }}
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
                            <div class="field">
                                <input type="hidden" name="plan" value="{{ $plan->id }}">
                            </div>
                            <div class="field has-text-left">
                                <label class="checkbox">
                                    <input type="checkbox" name="checkbox">
                                    I agree to the <a href="#">terms and conditions</a>
                                </label>
                                @if ($errors->has('checkbox'))
                                    <p class="help is-danger">
                                        {{ $errors->first('checkbox') }}
                                    </p>
                                @endif
                            </div>
                            <button type="submit" class="button is-primary is-fullwidth">Complete Purchase</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bulma-extensions@6/dist/js/bulma-extensions.min.js"></script>
@endsection
