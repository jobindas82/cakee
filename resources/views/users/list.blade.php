@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if(session('success'))
        <section class="content-header">
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    User updated successfully.
                </div>
            </div>
        </section>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            @can('User-alter')
                            <div class="ml-auto p-2">
                                <a class="btn btn-primary" href="{{ route('users.create') }}">Create</a>
                            </div>
                            @endcan
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/datatable.css') }}">
@endpush


@push('scripts')
    <script src="{{ mix('js/datatable.js') }}"></script>
    {{ $dataTable->scripts() }}
@endpush
