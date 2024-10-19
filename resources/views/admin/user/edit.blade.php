<form id="formAccountSettings" method="POST"
    action="{{ route('admin.user.update', $user->user_id) }}" enctype="multipart/form-data">
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
        <div class="mb-3 col-md-6">
            <label for="username" class="form-label">Tên tài khoản</label>
            <input class="form-control" type="text" id="username" name="username"
                value="{{ old('username', $user->username) }}" autofocus />
        </div>

        <div class="mb-3 col-md-6">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" type="text" id="email" name="email"
                value="{{ old('email', $user->email) }}" />
        </div>

        <div class="mb-3 col-md-6">
            <label for="phone_number" class="form-label">Số điện thoại</label>
            <input class="form-control" type="text" id="phone_number" name="phone_number"
                value="{{ old('phone_number', $user->phone_number) }}" />
        </div>

        <div class="mb-3 col-md-6">
            <label for="role_id" class="form-label">Vai trò</label>
            <select id="role_id" name="role_id" class="form-select">
                <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <div class="mb-3 col-md-6">
            <label for="status" class="form-label">Trạng thái</label>
            <select id="status" name="status" class="form-select">
                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Không hoạt động</option>
            </select>
        </div>

        <div class="mb-3 col-md-6">
            <label for="avatar" class="form-label">Ảnh đại diện</label>
            <input type="file" id="avatar" name="avatar" class="form-control" />
        </div>

        <div class="mb-3 col-md-6">
            <label for="password" class="form-label">Mật khẩu</label>
            <input class="form-control" type="password" id="password" name="password" />
            <small class="form-text text-muted">Để trống nếu không thay đổi mật khẩu.</small>
        </div>

        <div class="mb-3 col-md-6">
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
            <input class="form-control" type="password" id="password_confirmation"
                name="password_confirmation" />
        </div>
    </div>

    <div class="mt-2">
        <button type="submit" class="btn btn-primary me-2">Lưu thay đổi</button>
        <a href="{{ route('admin.viewuser') }}" class="btn btn-outline-secondary">Hủy</a>
    </div>
</form>
