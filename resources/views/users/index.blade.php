@extends('layouts.app', ['pageSlug' => 'users'])
@section('title', __('admin.Users'))
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('admin.Users') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#" class="btn btn-sm btn-primary">{{ __('admin.AddUser') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">{{ __('admin.FullName') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('admin.Phone') }}</th>
                                    <th scope="col">{{ __('admin.Role') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->surname }} {{ $user->name }}
                                            {{ $user->patronymic }}</td>
                                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->role }}</td>
                                    </tr>
                                @endforeach
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
