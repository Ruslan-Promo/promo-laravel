@extends('layouts.app', ['page' => __('Products'), 'pageSlug' => 'products'])
@section('title', __('admin.Products'))
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ __('admin.EditProduct') }}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('products.agent.index') }}" class="btn btn-sm btn-primary">{{ __('main.Back') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('products.update', $product->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('admin.ProductName')}}:</b>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('admin.ProductPriceYear')}}:</b>
                                <input type="number" name="price_year" value="{{ $product->price_year }}" class="form-control" placeholder="Put the price">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('admin.ProductDescription')}}:</b>
                                <textarea class="form-control" style="height:50px" name="description"
                                    placeholder="{{__('main.Description')}}">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('admin.ProductPriceSixMonth')}}:</b>
                                <input type="number" name="price_six_month" value="{{ $product->price_six_month }}" class="form-control" placeholder="Put the price">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('admin.ProductPriceOneMonth')}}:</b>
                                <input type="number" name="price_one_month" value="{{ $product->price_one_month }}" class="form-control" placeholder="Put the price">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('main.Images')}}:</b>
                                <div class="row">
                                @foreach ($product->images as $image)
                                    <div class="col-2">
                                        <img src="{{ asset('storage/'. $image->path) }}" alt="" title="">
                                        <input type="hidden" name="images[]" value="{{$image->id}}" />
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('main.AddImages')}}:</b>
                                <input type="file" name="new_images[]" class="form-control" multiple="multiple" />
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">{{__('main.Submit')}}</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
