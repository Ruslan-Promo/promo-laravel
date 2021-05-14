@extends('layouts.app', ['pageSlug' => 'products'])

@section('content')
    @if ($products->total() > 0)
        <div id="products">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-12 col-md-3">
                        <a href="{{ route('frontend.products.show', [$product->category->slug, $product->id]) }}">
                            {{ $product->name }}
                        </a>
                    </div>
                @endforeach
                {{ $products->links() }}
            </div>
        </div>
    @else
        <div class="">{{ __('Products Not Found') }}</div>
    @endif
@endsection
