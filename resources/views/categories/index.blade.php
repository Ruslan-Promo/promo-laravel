@extends('layouts.app', ['page' => __('Categories'), 'pageSlug' => 'categories'])
@section('title', __('admin.Categories'))
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('admin.Categories') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">{{ __('admin.AddCategory') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">{{ __('admin.CategoryName') }}</th>
                                    <th scope="col">{{ __('admin.CategorySlug') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$categories->isEmpty())
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('categories.show', $category->id) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">{{ __('Categories Not Found') }}</td>
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
