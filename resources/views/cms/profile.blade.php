@extends('layouts.main_cms')

@section('container')
    @if ($roleUser == 'Parent')
        <div class="card">
            <div class="card-header">
                Profile
            </div>
            <div class="card-body mb-3">
                <form id="FormRegister" method="post" enctype="multipart/form-data"
                    action="/profileStudent/{{ $student->id }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="id" value="{{ $student->id }}">
                            <div class="mb-3 row">
                                <label for="student_name" class="col-sm-4 col-form-label">Nama Anak</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="student_name" name="student_name"
                                        value="{{ $student->student_name }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="birth_date" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="birth_date" name="birth_date"
                                        value="{{ $student->birth_date }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="birth_city" class="col-sm-4 col-form-label">Tmpat Lahir</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="birth_city" name="birth_city"
                                        value="{{ $student->birth_city }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="mother_name" class="col-sm-4 col-form-label">Nama Ibu</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="mother_name" name="mother_name"
                                        value="{{ $student->mother_name }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="mother_job" class="col-sm-4 col-form-label">Pekerjaan Ibu</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="mother_job" name="mother_job"
                                        value="{{ $student->mother_job }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="father_name" class="col-sm-4 col-form-label">Nama Ayah</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="father_name" name="father_name"
                                        value="{{ $student->father_name }}">
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="mb-3 row">
                                <label for="father_job" class="col-sm-4 col-form-label">Pekerjaan Ayah</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="father_job" name="father_job"
                                        value="{{ $student->father_job }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="telp" class="col-sm-4 col-form-label">Telp / No Hp</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="telp" name="telp"
                                        value="{{ $student->telp }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-7">
                                    <textarea type="text" class="form-control" id="address" name="address"> {{ $student->address }} </textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-4 col-form-label">Alamat E-Mail</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $student->email }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="student_image" class="col-sm-4 col-form-label">Gambar Anak</label>
                                <div class="col-sm-7">
                                    <img src="{!! asset('storage/' . $student->student_image) !!}" width="100" height="100">
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
    @elseif ($roleUser ==='Teacher')
    <div class="card">
        <div class="card-header">
            Profile
        </div>
        <div class="card-body mb-3">
            <form id="FormRegister" method="post" enctype="multipart/form-data"
                action="/profileTeacher/{{ $student->id }}">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="name_teacher" class="col-sm-4 col-form-label">Nama Guru</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name_teacher" name="name_teacher" value="{{ $teacher->name_teacher }}" ></div>
                    </div>
                    <div class="mb-3 row">
                        <label for="birth_date" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $teacher->birth_date }}" ></div>
                        </div>
                        <div class="mb-3 row">
                            <label for="birth_city" class="col-sm-4 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="birth_city" name="birth_city" value="{{ $teacher->birth_city }}" ></div>
                            </div>
                        <div class="mb-3 row">
                            <label for="telp" class="col-sm-4 col-form-label">No Telepon/ No Hp</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="telp" name="telp" value="{{ $teacher->telp }}" ></div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" id="address" name="address"></textarea value="{{ $teacher->address }}" ></div>
                                </div>
                            <div class="mb-3 row">
                                <label for="graduate_of" class="col-sm-4 col-form-label">Jenjang pendidika (SMA/D3/S1/S2/S3)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="graduate_of" name="graduate_of" value="{{ $teacher->graduate_of }}" ></div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="major" class="col-sm-4 col-form-label">Jurusan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="major" name="major" value="{{ $teacher->major }}" ></div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="university" class="col-sm-4 col-form-label">Universitas</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="university" name="university" value="{{ $teacher->university }}" ></div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="graduation_year" class="col-sm-4 col-form-label">Tahun Lulus</label>
                                            <div class="col-sm-8">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="graduation_year"
                                                    name="graduation_year" value="{{ $teacher->graduation_year }}" ></div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="image_teacher" class="col-sm-4 col-form-label">Poto Profil</label>
                                                <div class="col-sm-8">
                                                    <img src="{!! asset('storage/' . $teacher->image_teacher) !!}" width="100" height="100">
                                                    <input type="file" class="form-control" id="image_teacher" name="image_teacher"  ></div>
                                                </div>

                                            </div>
                <div class="card text-end">
                    <button class="btn btn-primary" type="submit">Update</button>
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
            <form id="FormPassword" method="post" enctype="multipart/form-data"
                action="/profileUser/{{ $user->id }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="mail" class="col-sm-4 col-form-label">E-Mail</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}">
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
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: `/profileStudent`,
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

        // $('#FormPassword').submit(function(e) {
        //     var id = $('#id').val();
        //     e.preventDefault();
        //     var formData = new FormData(this);
        //     $.ajax({
        //         url: `/profileUser/${id}`,
        //         type: 'PUT',
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
    </script>
@endsection
