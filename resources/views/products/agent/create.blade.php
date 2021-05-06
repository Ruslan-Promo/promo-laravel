@extends('layouts.app', ['page' => __('Products'), 'pageSlug' => 'products'])
@section('title', __('admin.Products'))
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ __('admin.AddProduct') }}</h4>
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
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name">{{__('admin.ProductName')}}:</label>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="form-group col-3">
                                    <label for="price_year">{{__('admin.ProductPriceYear')}}:</label>
                                    <input type="number" name="price_year" class="form-control" placeholder="Put the price">
                                </div>
                                <div class="form-group col-3">
                                    <label for="price_six_month">{{__('admin.ProductPriceSixMonth')}}:</label>
                                    <input type="number" name="price_six_month" class="form-control" placeholder="Put the price">
                                </div>
                                <div class="form-group col-3">
                                    <label for="price_one_month">{{__('admin.ProductPriceOneMonth')}}:</label>
                                    <input type="number" name="price_one_month" class="form-control" placeholder="Put the price">
                                </div>
                                <div class="form-group col-3">
                                    <label for="discount">{{__('admin.Discount')}}:</label>
                                    <input type="number" name="discount" class="form-control" placeholder="Discount">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="description">{{__('admin.ProductDescription')}}:</label>
                                <textarea class="form-control" style="height:50px" name="description"
                                    placeholder="{{__('main.Description')}}"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="advantages">{{__('admin.Advantages')}}:</label>
                                <textarea class="form-control" style="height:50px" name="advantages"
                                    placeholder="{{__('main.Advantages')}}"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="category_id">{{__('admin.Category')}}:</label>
                                <select name="category_id" class="form-control">
                                    <option value="">None</option>
                                    @if($categories)
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="status_id">{{__('admin.Status')}}:</label>
                                <select name="status_id" class="form-control">
                                    <option value="">None</option>
                                    @if($categories)
                                        @foreach ($statuses as $status)
                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="expiration_date">{{__('admin.ExpirationDate')}}:</label>
                                <input type="text" name="expiration_date" class="form-control" placeholder="Expiration Date">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="images">{{__('admin.ProductImages')}}:</label>
                                <input type="file" name="images[]" class="form-control" multiple="multiple" />
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
