@extends('layouts.app', ['page' => __('Products'), 'pageSlug' => 'products'])
@section('title', __('admin.Products'))
@section('content')

<form class="bd-search d-flex align-items-center mb-4" action="{{ route('news.index') }}" method="GET">
    <input type="search" class="form-control ds-input" name="s" placeholder="Search..." aria-label="Search for..." value="{{request('s')}}">
    <button class="btn btn-link bd-search-docs-toggle p-0 ml-3" type="submit" data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs navigation">
        Найти
    </button>
</form>
@if(request('s') && $news)
<div class="row">
    @foreach ($news as $item)
    <div class="col-sm-6">
        <div class="card">
            <img class="card-img-top" src="{{$item->image}}" alt="{{$item->name}}">
            <div class="card-body">
            <h5 class="card-title">{{$item->name}}</h5>
            <p class="card-text">{{$item->description}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@elseif($news->total() > 0 )
<div class="row">
    @foreach ($news as $item)
    <div class="col-sm-6">
        <div class="card">
            <img class="card-img-top" src="{{$item->image}}" alt="{{$item->name}}">
            <div class="card-body">
            <h5 class="card-title">{{$item->name}}</h5>
            <p class="card-text">{{$item->description}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col-12">
    {{ $news->onEachSide(5)->links() }}
    </div>
</div>
@else
<div class="info"> Новостей нет </div>
@endif
@endsection
