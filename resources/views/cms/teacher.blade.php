@extends('layouts.main_cms')

@section('container')
<div class = "card" >
<div class="card-header">
    <div class="d-flex justify-content-end ">
        <button class="btn btn-sm btn-primary" type="button" onclick="add(this)">Add</button>
        <button class="btn btn-sm btn-success mx-2" type="button" onclick="edit(this)">Edit</button>
        <button class="btn btn-sm btn-danger " type="button" onclick="remove(this)">Delete</button>
    </div>
</div>
<div class="card-body">
    <div class="mt-3">
        <table class="table table-striped w-100" id="dt">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th class="col-3">Teacher Name</th>
                    <th class="col-2">Teacher Image</th>
                    <th>Telp</th>
                    <th>E-mail</th>
                    <th>Birth Date</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
</div>

<div class="modal" id="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title"></h5 > <button
    type="button"
    class="btn-close"
    data-bs-dismiss="modal"
    aria-label="Close"></button>
</div>
<div class="modal-body">
<form id="form" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row">
        <label for="name_teacher" class="col-sm-4 col-form-label">Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="name_teacher" name="name_teacher"></div>
        </div>
        <div class="mb-3 row">
            <label for="birth_date" class="col-sm-4 col-form-label">Birth Date</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="birth_date" name="birth_date"></div>
            </div>
            <div class="mb-3 row">
                <label for="birth_city" class="col-sm-4 col-form-label">Birth City</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="birth_city" name="birth_city"></div>
                </div>
            <div class="mb-3 row">
                <label for="telp" class="col-sm-4 col-form-label">Telp Number</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="telp" name="telp"></div>
                </div>
                <div class="mb-3 row">
                    <label for="address" class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control" id="address" name="address"></textarea></div>
                    </div>
                <div class="mb-3 row">
                    <label for="graduate_of" class="col-sm-4 col-form-label">Graduate Of</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="graduate_of" name="graduate_of"></div>
                    </div>
                    <div class="mb-3 row">
                        <label for="major" class="col-sm-4 col-form-label">Major</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="major" name="major"></div>
                        </div>
                        <div class="mb-3 row">
                            <label for="university" class="col-sm-4 col-form-label">University</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="university" name="university"></div>
                            </div>
                            <div class="mb-3 row">
                                <label for="graduation_year" class="col-sm-4 col-form-label">Graduation year</label>
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="graduation_year"
                                        name="graduation_year"></div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="image_teacher" class="col-sm-4 col-form-label">Photo Profile</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" id="image_teacher" name="image_teacher"></div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @endsection @section('script')

                <script>
                    let dt;
                    let formUrl = '';
                    let fm = '#form';
                    let method = '';
                    function add(obj) {
                        // reset form
                        $(fm).each(function () {
                            this.reset();
                        });
                        $('#modal').modal('toggle');
                        $("#modal-title").html("New");

                        method = 'post';
                        formUrl = `teacher`;
                    }

                    function edit(obj) {
                        let idx = getSelectedRowDataTables(dt);
                        if (idx) {
                            let data = dt
                                .row(idx.row)
                                .data();
                            // reset form
                            $(fm).each(function () {
                                this.reset();
                            });

                            // mengambil data
                            $(fm).deserialize(data)

                            let id = data.id;

                            // setting title modal
                            $("#ModalLabel").html("Ubah")
                            // open modal
                            $('#Modal').modal('toggle');

                            method = 'PUT';
                            formUrl = `/teacher/${id}`;
                        }
                    }

                    function remove(obj) {
                        let idx = getSelectedRowDataTables(dt);
                        if (idx) {
                            let data = dt
                                .row(idx.row)
                                .data();
                            let dv = data.id
                            let value = {
                                id: dv
                            }

                            Swal
                                .fire({
                                    title: 'Apakah anda yakin.?',
                                    text: "Data yang dihapus tidak dapat dikembalikan!",
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ya!'
                                })
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: `/teacher/${dv}`,
                                            type: "DELETE",
                                            cache: false,
                                            data: {
                                                "_token": "{{ csrf_token() }}"
                                            },
                                            success: function (data, textStatus, jqXHR) {
                                                let table = $('#dt').DataTable();
                                                table
                                                    .ajax
                                                    .reload();
                                                toastr.success('Data sandi berhasil dihapus.');
                                            },
                                            error: function (jqXHR, textStatus, errorThrown) {
                                                toastr.error('Data sandi gagal dihapus.');
                                            }
                                        });
                                    }
                                })

                        }
                    }

                    $("form").submit(function (e) {
                        e.preventDefault();
                        var formData = new FormData(this);
                        $.ajax({
                            url: formUrl,
                            type: method,
                            data: formData,
                            processData: false,
                            contentType: false, // Pastikan konten tipe diatur ke false
                            success: function (data, textStatus, jqXHR) {

                                let view = jQuery.parseJSON(data);
                                if (view.status == true) {
                                    toastr.success(view.message);
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1000);
                                } else {
                                    toastr.error(view.message);
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1000);
                                }
                            },
                            error: function (reject) {

                                var response = $.parseJSON(reject.responseText);
                                $.each(response.errors, function (key, val) {
                                    $("#" + key + "_error").text(val[0]);
                                })

                            }

                        });
                    });

                    $(document).ready(function () {
                        $('input[name="birth_date"]').datepicker({changeYear: true, changeMonth: true});

                        dt = $('#dt').DataTable({
                            "destroy": true,
                            "processing": true,
                            "select": true,
                            "scrollX": true,
                            "ajax": {
                                "url": "{{ route('getDataTeacher') }}"
                            },
                            "columns": [
                                {
                                    data: "DT_RowIndex",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "name_teacher",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "image",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "telp",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "birth_date",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "graduate_of",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "index",
                                    orderable: true,
                                    searchable: true
                                }
                            ],
                            "columnDefs": [
                                {
                                    "render": function (data, type, row, meta) {
                                        let image   = row.image
                                        return '<img src="' + image + '">'
                                    },
                                    "targets": 2
                                },
                                {
                                    "render": function (data, type, row, meta) {

                                        return '<button class="btn btn-sm btn-primary" type="button" onclick="add(this)">Add</' +
                                            'button>'
                                    },
                                    "targets": 6
                                }
                            ]
                        });

                        initSelectRowDataTables('#dt', dt);
                    })
                </script>

                @endsection
