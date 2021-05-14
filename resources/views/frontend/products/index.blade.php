@extends('layouts.app', ['pageSlug' => 'products'])

@section('content')
    @if($categories)
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-12 col-md-3">
                <a href="{{ route('frontend.products.category', $category->slug) }}">
                {{ $category->name }}
                </a>
            </div>
        @endforeach
    </div>
    @endif
@endsection
