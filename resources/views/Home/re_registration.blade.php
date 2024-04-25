@extends('layouts.main')

@section('container')
    <div class="p-3"></div>
    <div class="d-flex justify-content-center p-5">
        <div class="card border-primary mb-3 w-80">

            <div class="card-body">

                        <form id="FormRegister" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label for="student_name" class="col-sm-4 col-form-label">Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="student_name"
                                                name="student_name" value="{{ $student->student_name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="birth_date" class="col-sm-4 col-form-label">Birth Date</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $student->birth_date }}" readonly >
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="birth_city" class="col-sm-4 col-form-label">Birth city</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="birth_city" name="birth_city" value="{{ $student->birth_city }}" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="mother_name" class="col-sm-4 col-form-label">Mother Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="mother_name"
                                                name="mother_name" value="{{ $student->mother_name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="mother_job" class="col-sm-4 col-form-label">Mother Job</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="mother_job"
                                                name="mother_job" value="{{ $student->mother_job }}" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="father_name" class="col-sm-4 col-form-label">Father Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="father_name"
                                                name="father_name" value="{{ $student->father_name }}" readonly>
                                        </div>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label for="father_job" class="col-sm-4 col-form-label">Father job</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="father_job"
                                                name="father_job" value="{{ $student->father_job }}" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="telp" class="col-sm-4 col-form-label">Telp / No Hp</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="telp" name="telp" value="{{ $student->telp }}" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="address" class="col-sm-4 col-form-label">Address</label>
                                        <div class="col-sm-7">
                                            <textarea type="text" class="form-control" id="address" name="address">{{ $student->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-4 col-form-label">Email Address</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $student->email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="student_image" class="col-sm-4 col-form-label">Image</label>
                                        <div class="col-sm-7">
                                            <img src="{!! asset('storage/'.$student->student_image) !!}" width="100" height="100">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="payment_image" class="col-sm-4 col-form-label">Payment Image</label>
                                        <div class="col-sm-7">
                                            <input type="file" class="form-control" id="payment_image"
                                                name="payment_image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card text-end">
                                <button class="btn btn-primary" type="submit">Register</button>
                            </div>
                        </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#FormRegister').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '/submitRegistration',
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

    </script>
@endsection
