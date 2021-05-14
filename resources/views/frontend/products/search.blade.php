@extends('layouts.app', ['pageSlug' => 'products'])
@section('content')
    <table style="width: 100%">
        <thead>
            <tr>
                <th>{{__('main.ProductName')}}</th>
                <th>{{__('main.PriceYear')}}</th>
                <th>{{__('main.CategoryName')}}</th>
                <th>{{__('main.CompanyName')}}</th>
            </tr>
        </thead>
        <tbody>
        @if($products->total() > 0)
            @foreach ($products as $product)
                <tr>
                    <td>
                        <a href="{{ route('frontend.products.show', [$product->category->slug, $product->id]) }}">
                        {{ $product->name }}
                        </a>
                    </td>
                    <td>{{ $product->price_year }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->company}}</td>
                </tr>
            @endforeach
        @else
        <tr>
            <td colspan="4">{{ __('Products Not Found') }}</td>
        </tr>
        @endif
        </tbody>
    </table>
    <form action="{{ route('frontend.products.search') }}" method="GET" enctype="multipart/form-data" >
        <table class="form-group" style="width: 100%">
            <tbody>
                <tr>
                    <td><input type="text" class="form-controller" name="name" placeholder="Search..." value="{{isset($_GET['name']) ? $_GET['name'] : ''}}"/></td>
                    <td><input type="text" class="form-controller" name="price" placeholder="Search..." value="{{isset($_GET['price']) ? $_GET['price'] : ''}}"/></td>
                    <td><input type="text" class="form-controller" name="category" placeholder="Search..." value="{{isset($_GET['category']) ? $_GET['category'] : ''}}"/></td>
                    <td><input type="text" class="form-controller" name="company" placeholder="Search..." value="{{isset($_GET['company']) ? $_GET['company'] : ''}}"/></td>
                </tr>
                <tr>
                    <td colspan="4"><input class="btn btn-info" type="submit" value="Искать"></td>
                </tr>
            </tbody>
        </table>
    </form>

    @if($products->total() > 0)
        {{ $products->links() }}
    @endif
@endsection
