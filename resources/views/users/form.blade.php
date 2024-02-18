@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ is_null($user) ? 'Create user' : 'Edit user '. $user->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.list') }}">Users</a></li>
                        <li class="breadcrumb-item active">{{ is_null($user) ? 'Create user' : $user->name }}</li>
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
                    <form method="POST" action="{{ route('users.save') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Basic info</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="hidden" name="id"
                                                   value="{{ is_null($user) ? null : $user->id }}">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                   name="name"
                                                   value="{{ old('name', is_null($user) ? null : $user->name) }}"
                                                   required>
                                            @error('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email', is_null($user) ? null : $user->email) }}"
                                                   name="email" required>
                                            @error('email')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="is_active" class="form-control">
                                                <option
                                                    value="1" {{ !is_null($user) && $user->is_active == 1 ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option
                                                    value="0" {{ !is_null($user) && $user->is_active == 0 ? 'selected' : '' }}>
                                                    Disabled
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password">
                                            @error('password')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Roles</label>
                                            <select class="select2 @error('roles') is-invalid @enderror" multiple="multiple" name="roles[]"
                                                    data-placeholder="Select roles" style="width: 100%;">
                                                @php
                                                    $selections = [];
                                                    if(!is_null($user)){
                                                        $selections = $user->getRoleNames()->toArray();
                                                    }
                                                @endphp
                                                @foreach($roles as $role)
                                                    <option {{ in_array($role, $selections)  ? 'selected'  : '' }}>{{ $role }}</option>
                                                @endforeach
                                            </select>
                                            @error('roles')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Direct Permissions</label>
                                            <select class="select2" multiple="multiple" name="permissions[]"
                                                    data-placeholder="Select permissions" style="width: 100%;">
                                                @php
                                                    $selections = [];
                                                    if(!is_null($user)){
                                                        $selections = $user->getDirectPermissions()->pluck('name')->toArray();
                                                    }
                                                @endphp
                                                @foreach($permissions as $permission)
                                                    <option {{ in_array($permission, $selections)  ? 'selected'  : '' }}>{{ $permission }}</option>
                                                @endforeach
                                            </select>
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
