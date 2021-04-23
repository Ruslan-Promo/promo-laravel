@extends('layouts.app', ['page' => __('Products'), 'pageSlug' => 'products.show'])
@section('title', __('admin.Products'))
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('admin.Product') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">{{ __('main.Edit') }}</a>
                            <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{ __('main.Back') }}</a>
                        </div>
                    </div>
                </div>
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
                            <div class="row">
                                <div class="col-xs-6"><b>{{ __('admin.Agent') }}:</b></div>
                                <div class="col-xs-6">{{ $product->agent_name }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-xs-6"><b>{{ __('admin.Advantages') }}:</b></div>
                                <div class="col-xs-6">{{ $product->advantages }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-xs-6"><b>{{ __('admin.Discount') }}:</b></div>
                                <div class="col-xs-6">{{ $product->discount }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row mt-3">
                                @if ($product->images)
                                @foreach ($product->images as $image )
                                <div class="col-2">
                                    <img src="{{ asset('storage/'.$image->path) }}" alt="" title="">
                                </div>
                                @endforeach

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
