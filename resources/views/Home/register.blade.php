@extends('layouts.main')

@section('container')
    <div class="p-3"></div>
    <div class="d-flex justify-content-center p-5">
        <div class="card border-primary mb-3">
            <div class="text-primary p-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Register</button>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button"
                            role="tab" aria-controls="list" aria-selected="false">List Student</button>
                    </li> -->
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form id="formLogin" method="post" action="/login">
                            @csrf
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">E-Mail</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="staticEmail" name="email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="inputPassword" name="password">
                                </div>
                            </div>
                            <div class="card text-end">
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form id="FormRegister" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label for="student_name" class="col-sm-4 col-form-label">Nama Anak</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="student_name"
                                                name="student_name">
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
                                            <input type="text" class="form-control" id="birth_city"
                                                name="birth_city">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="mother_name" class="col-sm-4 col-form-label">Nama Ibu</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="mother_name"
                                                name="mother_name">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="mother_job" class="col-sm-4 col-form-label">Pekerjaan Ibu</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="mother_job"
                                                name="mother_job">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="father_name" class="col-sm-4 col-form-label">Nama Ayah</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="father_name"
                                                name="father_name">
                                        </div>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label for="father_job" class="col-sm-4 col-form-label">Pekerjaan Ayah</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="father_job"
                                                name="father_job">
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
                                            <input type="file" class="form-control" id="student_image"
                                                name="student_image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card text-end">
                                <button class="btn btn-primary" type="submit">Daftar</button>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                        <div>
                            <table class="table table-striped table-hover w-100" id="dt">
                                <thead>
                                    <td>No</td>
                                    <td>Name</td>
                                    <td>Age (Years)</td>
                                    <td>Status</td>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // $('#formLogin').submit(function(e) {
        //     e.preventDefault();
        //     var formData = new FormData(this);
        //     $.ajax({
        //         url: '/login',
        //         type: 'post',
        //         data: formData,
        //         processData: false,
        //         contentType: false, // Pastikan konten tipe diatur ke false
        //         success: function(data, textStatus, jqXHR) {

        //             let view = jQuery.parseJSON(data);
        //             if (view.status == true) {
        //                 toastr.success(view.message);
        //                 setTimeout(function() {
        //                     location.reload();
        //                 }, 1000);
        //             } else {
        //                 toastr.error(view.message);
        //                 setTimeout(function() {
        //                     location.reload();
        //                 }, 1000);
        //             }
        //         },
        //         error: function(reject) {

        //             var response = $.parseJSON(reject.responseText);
        //             $.each(response.errors, function(key, val) {
        //                 $("#" + key + "_error").text(val[0]);
        //             })


        //         }

        //     });
        // })

        $('#FormRegister').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '/registration',
                type: 'post',
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

        $(document).ready(function() {
            $('input[name="birth_date"]').datepicker();

            dt = $('#dt').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                "ajax": {
                    "url": "{{ route('getDataList') }}",
                },
                "columns": [{
                        data: "DT_RowIndex",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "student_name",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "student_age",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "status",
                        orderable: true,
                        searchable: true
                    }
                ]
            })
        })
    </script>
@endsection
