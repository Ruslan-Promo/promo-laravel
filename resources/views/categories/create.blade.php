@extends('layouts.app', ['page' => __('Categories'), 'pageSlug' => 'categories'])
@section('title', __('admin.Categories'))
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ __('admin.AddCategory') }}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">{{ __('main.Back') }}</a>
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
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('admin.CategoryName')}}:</b>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('admin.CategoryDescription')}}:</b>
                                <textarea class="form-control" style="height:50px" name="description" placeholder="{{__('main.Description')}}"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('admin.CategoryParent')}}:</b>
                                <select name="parent_id">
                                    <option value="0">Без родителя</option>
                                    @if (!$categories->isEmpty())
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('admin.CategorySlug')}}:</b>
                                <input type="text" name="slug" class="form-control" placeholder="Slug category">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <b>{{__('main.Order')}}:</b>
                                <input type="number" name="order" class="form-control" placeholder="{{__('main.Order')}}">
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
