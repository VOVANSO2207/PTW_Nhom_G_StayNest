@extends('admin.layouts.master')
@section('admin-container')
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center" style="width: 100%;">
            <div class="nav-item d-flex align-items-center" style="width: 100%;">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" id="search_post" placeholder="Search..." aria-label="Search..." style="width: 100%;" />
            </div>
        </div>
    </div>
</nav>

<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div id="successMessage" class="alert alert-success d-none" role="alert">
            Xóa phòng thành công!
        </div>
        <div class="card">
            <h5 class="card-header" style="background-color: #696cff; border-color: #696cff; color:#fff">ROOM</h5>
            <div class="add">
                <a class="btn btn-success" href="{{ route('room_add') }}">Add</a>
            </div>
            <div class="table-responsive text-nowrap content1">
                <table class="table">
                    <thead>
                        <tr class="color_tr">
                            <th>STT</th>
                            <th>Image</th>
                            <th>Name Room</th>
                            <th>Capacity</th>
                            <th>Room Type</th>
                            <th>Price Base</th>
                            <th>Discount Percent</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 alldata">
                        @forelse($rooms as $key => $room)
                        <tr data-room="{{ $room->toJson() }}" style="cursor: pointer;">
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @foreach ($room->room_images as $image)
                                <img class="room-image" style="width: 100px;" src="/images/{{ $image->image_url }}" alt="Image">
                                @endforeach
                            </td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->capacity }}</td>
                            <td>{{ $room->roomType ? $room->roomType->name : 'N/A' }}</td>
                            <td>{{ $room->price }}</td>
                            <td>{{ $room->discount_percent }}%</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Không có room nào để hiển thị.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="roomModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roomModalLabel">Room Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Name Room:</strong> <span id="modalName"></span></p>
                <p><strong>Capacity:</strong> <span id="modalCapacity"></span></p>
                <p><strong>Description:</strong> <span id="modalDescription"></span></p>
                <p><strong>Room Type:</strong> <span id="modalRoomType"></span></p>
                <div id="modalImages"></div>
                <p><strong>Price Base:</strong> <span id="modalPriceBase"></span></p>
                <p><strong>Price Sales:</strong> <span id="modalPriceSales"></span></p>
                <p><strong>Discount Percent:</strong> <span id="modalDiscountPercent"></span></p>
                <p><strong>Room Amenities:</strong> <span id="modalAmenities"></span></p>

                <!-- Form xóa phòng -->
                <form id="deleteRoomForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Room</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.querySelectorAll('.table tbody tr').forEach(function(row) {
        row.addEventListener('click', function() {
            var room = JSON.parse(this.getAttribute('data-room'));
            console.log(room);
            document.getElementById('modalName').innerText = room.name;
            document.getElementById('modalCapacity').innerText = room.capacity;
            document.getElementById('modalDescription').innerText = room.description;
            document.getElementById('modalRoomType').innerText = room.roomType ? room.roomType.name : 'N/A';
            document.getElementById('modalPriceBase').innerText = room.price;
            document.getElementById('modalPriceSales').innerText = room.price * (1 - room.discount_percent / 100);
            document.getElementById('modalDiscountPercent').innerText = room.discount_percent + '%';

            // Xử lý ảnh
            var imagesContainer = document.getElementById('modalImages');
            imagesContainer.innerHTML = '';
            room.room_images.forEach(function(image) {
                var imgElement = document.createElement('img');
                imgElement.src = '/images/' + image.image_url;
                imgElement.style.width = '100px';
                imgElement.style.marginRight = '10px';
                imagesContainer.appendChild(imgElement);
            });

            var amenities = room.amenities.map(function(amenity) {
                return amenity.amenity_name;
            }).join(', ');
            document.getElementById('modalAmenities').innerText = amenities;

            // Cập nhật form xóa
            var deleteForm = document.getElementById('deleteRoomForm');
            deleteForm.action = "{{ url('admin/room') }}/" + room.room_id;

            var roomModal = new bootstrap.Modal(document.getElementById('roomModal'));
            roomModal.show();
        });
    });

    // Thêm sự kiện cho form xóa
    document.getElementById('deleteRoomForm').addEventListener('submit', function(e) {
        var confirmation = confirm("Are you sure you want to delete this room?");
        if (!confirmation) {
            e.preventDefault(); // Ngăn chặn hành động xóa nếu người dùng không xác nhận
        } else {
            // Hiển thị thông báo xóa thành công sau khi xóa
            setTimeout(function() {
                document.getElementById('successMessage').classList.remove('d-none');
                setTimeout(function() {
                    document.getElementById('successMessage').classList.add('d-none');
                }, 3000); // Ẩn thông báo sau 3 giây
            }, 100); // Đợi một chút trước khi hiển thị thông báo
        }
    });
</script>
@endsection
