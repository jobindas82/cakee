@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ 'Edit role '. $role->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roles.list') }}">Roles</a></li>
                        <li class="breadcrumb-item active">{{ $role->name }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <form method="POST" action="{{ route('roles.save') }}">
                        @csrf
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="hidden" name="id"
                                                   value="{{ $role->id }}">
                                            <input type="text" class="form-control"
                                                   value="{{ old('name', $role->name) }}"
                                                   disabled>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Permissions</label>
                                            <select class="select2 @error('permissions') is-invalid @enderror" multiple="multiple" name="permissions[]"
                                                    data-placeholder="Select permissions" style="width: 100%;">
                                                @php
                                                    $selections = $role->permissions->pluck('name')->toArray();
                                                @endphp
                                                @foreach($permissions as $permission)
                                                    <option {{ in_array($permission, $selections)  ? 'selected'  : '' }}>{{ $permission }}</option>
                                                @endforeach
                                            </select>
                                            @error('permissions')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('scripts')
    <script>
        $('.select2').select2();
    </script>
@endpush
