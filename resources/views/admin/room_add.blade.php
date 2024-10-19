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
                    <form id="formAccountSettings" method="GET" onsubmit="return false" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-md-5">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" name="username" id="username"
                                    placeholder="username" required />
                            </div>
                            <div class="mb-3 col-md-5">
                                <label class="form-label">RoomType</label>
                                <select id="role" class="select2 form-select">
                                    <option value="admin" selected>Roomtype1</option>
                                    <option value="user">Roomtype2</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-5">
                                <label class="form-label">Price Base</label>
                                <input class="form-control" type="text" id="pricebase" name="pricebase"
                                    placeholder="Price Base" autofocus required />
                            </div>
                            <div class="mb-3 col-md-5">
                                <label class="form-label">Price Sales</label>
                                <input class="form-control" type="text" id="pricesales" name="pricesales"
                                    placeholder="Price Sales Base" autofocus required />
                            </div>
                            <div class="mb-3 col-md-5">
                                <label class="form-label">Availabity</label>
                                <input class="form-control" type="text" id="availabity" name="availabity"
                                    placeholder="Availabity" autofocus required />
                            </div>
                            <div class="mb-3 col-md-5">
                                <label class="form-label">Discount percent</label>
                                <input class="form-control" type="text" id="discountpercent" name="discountpercent"
                                    placeholder="Discount percent" autofocus required />
                            </div>
                            <div class="mb3 col-md-5">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="{{ asset('/images/img-upload.jpg') }}" alt="user-avatar"
                                                class="d-block rounded" height="100" width="100" id="fileUpload" />
                                            <div class="button-wrapper">
                                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Upload</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input type="file" id="upload" name="fileUpload"
                                                        class="account-file-input" hidden
                                                        accept="image/png, image/jpeg, image/jpg" />
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-3 col-md-5">
                                <label class="form-label">Room amenities</label>
                                <select id="role" class="select2 form-select">
                                    <option value="admin" selected>Room amenities 1</option>
                                    <option value="user">Room amenities 2</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="mt-2" style="text-align: right">
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            <button type="button" class="btn btn-outline-danger" onclick="window.location.href='{{ route('admin.viewroom') }}'">Close</button>
                            <button type="submit" class="btn btn-outline-success me-2 add_post">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<script>
      window.onload = function() {
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "path/to/upload/image"
        });
    };
</script>
@endsection