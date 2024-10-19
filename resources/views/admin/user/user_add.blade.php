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
                    <form id="formAccountSettings" method="POST" action="{{ route('user_add') }}"
                        enctype="multipart/form-data">
                        @csrf <!-- Token để bảo mật cho form -->
                        <div class="row">
                            <div class="mb-3 col-md-7">
                                <label class="form-label">Username</label>
                                <input class="form-control" type="text" name="username" id="username"
                                    placeholder="Username" required />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Role</label>
                                <select id="role" name="role_id" class="select2 form-select" required>
                                    <option value="2" selected>User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-7">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Email"
                                    required />
                            </div>
                            <div class="mb-3 col-md-7">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" id="password" name="password"
                                    placeholder="Password" required />
                            </div>
                            <div class="mb-3 col-md-7">
                                <label class="form-label">Phonenumber</label>
                                <input class="form-control" type="text" id="phonenumber" name="phone_number"
                                    placeholder="Phonenumber" required />
                            </div>
                            <div class="mb-3 col-md-7">
                                <label class="form-label">Avatar</label>
                                <input class="form-control" type="file" id="avatar" name="avatar" accept="image/*"
                                    onchange="previewImage(event)" />
                                <small class="form-text text-muted">Current Avatar:
                                    <img id="currentAvatar" src="{{ asset('images/default-avatar.png') }}"
                                        alt="Default Avatar" style="width: 50px; height: 50px;">
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
                                        // Nếu không có tệp nào được chọn, quay về ảnh đại diện mặc định
                                        avatarPreview.src = '{{ asset('images/default-avatar.png') }}';
                                    }
                                }
                            </script>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

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