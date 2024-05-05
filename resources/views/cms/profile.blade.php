@extends('layouts.main_cms')

@section('container')
@if ($roleUser =='parent')

<div class="card">
    <div class="card-header">
        Profile
    </div>
    <div class="card-body mb-3">
        <form id="FormRegister" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label for="student_name" class="col-sm-4 col-form-label">Nama Anak</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="student_name" name="student_name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="birth_date" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="birth_date" name="birth_date">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="birth_city" class="col-sm-4 col-form-label">Tmpat Lahir</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="birth_city" name="birth_city">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="mother_name" class="col-sm-4 col-form-label">Nama Ibu</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="mother_name" name="mother_name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="mother_job" class="col-sm-4 col-form-label">Pekerjaan Ibu</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="mother_job" name="mother_job">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="father_name" class="col-sm-4 col-form-label">Nama Ayah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="father_name" name="father_name">
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label for="father_job" class="col-sm-4 col-form-label">Pekerjaan Ayah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="father_job" name="father_job">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telp" class="col-sm-4 col-form-label">Telp / No Hp</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="telp" name="telp">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="address" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-7">
                            <textarea type="text" class="form-control" id="address" name="address"> </textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-4 col-form-label">Alamat E-Mail</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="student_image" class="col-sm-4 col-form-label">Gambar Anak</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" id="student_image" name="student_image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card text-end">
                <button class="btn btn-primary" type="submit">Daftar</button>
            </div>
        </form>
    </div>
</div>

@endif



    <div class="card">
        <div class="card-header">
            Profile User
        </div>
        <div class="card-body mb-3">
            <form id="FormPassword" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="mail" class="col-sm-4 col-form-label">E-Mail</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="mail" name="mail">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-end">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $('#FormRegister').submit(function(e) {
            var id = $('#id').val();
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: `/profileStudent/${id}`,
                type: 'PUT',
                data: formData,
                processData: false,
                contentType: false, // Pastikan konten tipe diatur ke false
                success: function(data, textStatus, jqXHR) {

                    let view = jQuery.parseJSON(data);
                    if (view.status == true) {
                        toastr.success(view.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        toastr.error(view.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function(reject) {

                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                    })


                }

            });
        })

        $('#FormPassword').submit(function(e) {
            var id = $('#id').val();
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: `/profileUser/${id}`,
                type: 'PUT',
                data: formData,
                processData: false,
                contentType: false, // Pastikan konten tipe diatur ke false
                success: function(data, textStatus, jqXHR) {

                    let view = jQuery.parseJSON(data);
                    if (view.status == true) {
                        toastr.success(view.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        toastr.error(view.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function(reject) {

                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                    })


                }

            });
        })
    </script>
@endsection
