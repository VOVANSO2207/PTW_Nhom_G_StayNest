@extends('admin.layouts.master')

@section('admin-container')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST"
                        action="{{ route('admin.user.update', $user->user_id) }}" enctype="multipart/form-data">
                        @csrf <!-- Token để bảo mật cho form -->
                        @method('PUT') <!-- Thêm phương thức PUT -->

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
                                <input class="form-control" type="text" name="username" id="username"
                                    placeholder="username" value="{{ old('username', $user->username) }}" required />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Role</label>
                                <select id="role" name="role_id" class="select2 form-select" required>
                                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>User</option>
                                    <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-7">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Email"
                                    value="{{ old('email', $user->email) }}" required />
                            </div>
                            <div class="mb-3 col-md-7">
                                <label class="form-label">Password (Leave blank to keep the current password)</label>
                                <input class="form-control" type="password" id="password" name="password"
                                    placeholder="Password" />
                            </div>
                            <div class="mb-3 col-md-7">
                                <label class="form-label">Phonenumber</label>
                                <input class="form-control" type="text" id="phonenumber" name="phone_number"
                                    placeholder="Phonenumber" value="{{ old('phone_number', $user->phone_number) }}"
                                    required />
                            </div>
                            <div class="mb-3 col-md-7">
                                <label class="form-label">Status</label>
                                <select id="status" name="status" class="form-select" required>
                                    <option value="1" {{ $user->status ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$user->status ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-7">
                                <label class="form-label">Avatar</label>
                                <input class="form-control" type="file" id="avatar" name="avatar" accept="image/*"
                                    onchange="previewImage(event)" />
                                <small class="form-text text-muted">Current Avatar:
                                    <img id="currentAvatar" src="{{ asset('images/' . $user->avatar) }}"
                                        alt="Current Avatar" style="width: 50px; height: 50px;"
                                        onerror="this.onerror=null; this.src='{{ asset('images/default-avatar.png') }}';">
                                </small>
                            </div>

                            <script>
                                function previewImage(event) {
                                    const input = event.target;
                                    const avatarPreview = document.getElementById('currentAvatar');

                                    if (input.files && input.files[0]) {
                                        const reader = new FileReader();

                                        reader.onload = function (e) {
                                            avatarPreview.src = e.target.result; // Hiển thị ảnh được chọn
                                        }

                                        reader.readAsDataURL(input.files[0]); // Đọc tệp hình ảnh
                                    } else {
                                        // Nếu không có tệp nào được chọn, quay về ảnh đại diện hiện tại
                                        avatarPreview.src = '{{ asset('images/' . $user->avatar) }}';
                                    }
                                }
                            </script>
                        </div>

                        <div class="mt-2" style="text-align: right">
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            <button type="button" class="btn btn-outline-danger"
                                onclick="window.location.href='{{ route('admin.viewuser') }}'">Close</button>
                            <button type="submit" class="btn btn-outline-success me-2">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection