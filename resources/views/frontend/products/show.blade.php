@extends('layouts.app', ['page' => __('Products'), 'pageSlug' => 'products.show'])
@section('title', __('main.Products'))
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-xs-6"><b>{{ __('admin.ProductName') }}:</b></div>
                                <div class="col-xs-6">{{ $product->name }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-xs-6"><b>{{ __('admin.ProductPriceYear') }}:</b></div>
                                <div class="col-xs-6">{{ $product->price_year }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-xs-6"><b>{{ __('admin.ProductDescription') }}:</b></div>
                                <div class="col-xs-6">{{ $product->description }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-xs-6"><b>{{ __('admin.ProductPriceSixMonth') }}:</b></div>
                                <div class="col-xs-6">{{ $product->price_six_month }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-xs-6"><b>{{ __('admin.ProductPriceOneMonth') }}:</b></div>
                                <div class="col-xs-6">{{ $product->price_one_month }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row mt-3">
                                @if ($product->images)
                                @foreach ($product->images as $image )
                                <div class="col-2">
                                    <img src="{{ asset($image->getStoragePath()) }}" alt="" title="">
                                </div>
                                @endforeach

                                @endif
                            </div>
                        </div>
                        @if(Auth::check())
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <form action="{{ route('frontend.products.purchase') }}" method="POST" enctype="multipart/form-data" style="width:100%">
                                @csrf
                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                <input type="hidden" name="paymentId" value="">
                                <input id="card-holder-name" type="text">
                                <div id="card-element"></div>
                                <select name="type">
                                    <option value="year">Годовая</option>
                                    <option value="one_month">1 месяц</option>
                                    <option value="price_six_month">6 месяцев</option>
                                </select>
                                <button id="card-button">Payment</button>
                            </form>
                            <script>
                                const stripe = Stripe('{{ env('STRIPE_KEY') }}');

                                const elements = stripe.elements();
                                const cardElement = elements.create('card');

                                cardElement.mount('#card-element');

                                const cardHolderName = document.getElementById('card-holder-name');
                                const cardButton = document.getElementById('card-button');

                                cardButton.addEventListener('click', async (e) => {
                                    e.preventDefault();
                                    const { paymentMethod, error } = await stripe.createPaymentMethod(
                                        'card', cardElement, {
                                            billing_details: { name: cardHolderName.value }
                                        }
                                    );

                                    if (error) {
                                        console.log(error);
                                    } else {
                                        console.log(paymentMethod);
                                        cardButton.parentElement.querySelector('input[name="paymentId"]').value = paymentMethod.id;
                                        cardButton.parentElement.submit();
                                        // The card has been verified successfully...
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <form action="{{ route('frontend.products.contactme') }}" method="POST" enctype="multipart/form-data" style="width:100%">
                                @csrf
                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                <button type="submit">Contact Me</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
