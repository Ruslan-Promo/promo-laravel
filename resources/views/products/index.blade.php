@extends('layouts.app', ['page' => __('Products'), 'pageSlug' => 'products'])
@section('title', __('admin.Products'))
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('admin.Products') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">{{ __('admin.AddProduct') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">{{ __('Name product') }}</th>
                                    <th scope="col">{{ __('Price (year)') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$products->isEmpty())
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price_year }}</td>
                                            <td>{{ $product->Status }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('products.show', $product->id) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">{{ __('Products Not Found') }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
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
