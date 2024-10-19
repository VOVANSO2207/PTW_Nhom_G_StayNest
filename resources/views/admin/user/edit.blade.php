@extends('admin.layouts.master')

@section('admin-container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{ route('admin.user.update', $user->user_id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Hiển thị thông báo lỗi -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="mb-3 col-md-7">
                                <label class="form-label">Username</label>
                                <input class="form-control" type="text" name="username" id="username" placeholder="username" value="{{ old('username', $user->username) }}" required />
                            </div>
                            <div class="mb-3 col-md-5">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{ old('email', $user->email) }}" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input class="form-control" type="text" name="phone_number" id="phone_number" placeholder="Phone Number" value="{{ old('phone_number', $user->phone_number) }}" required />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Role</label>
                                <select class="form-select" name="role_id" id="role_id" required>
                                    <option selected disabled>Chọn quyền người dùng</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Enter new password (optional)" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status" id="status" required>
                                    <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Avatar</label>
                            <input class="form-control" type="file" name="avatar" id="avatar" accept="image/*" />
                            <img src="{{ asset('images/' . $user->avatar) }}" alt="avatar" style="width: 100px; height: 100px; margin-top: 10px;">
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
