@extends('layouts.main_cms')

@section('container')
    <div class = "card">
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
                            <th class="col-3">Username</th>
                            <th class="col-2">email</th>
                            <th>Akses</th>
                            <th>Gambar</th>
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
                    <h5 class="modal-title" id="modal-title"></h5> <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="birth_city" class="col-sm-4 col-form-label">Role</label>
                            <div class="col-sm-8">
                                <select name="role" id="role" class="form-control">
                                    <option value="Admininstrator">Admininstrator</option>
                                    <option value="Headmaster">Kepala Sekolah</option>
                                    <option value="Teacher">Guru</option>
                                </select>
                            </div>
                        </div>

                        {{-- <div class="mb-3 row">
                            <label for="image_teacher" class="col-sm-4 col-form-label">Poto Profil</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="image_teacher" name="image_teacher">
                            </div>
                        </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
            $(fm).each(function() {
                this.reset();
            });
            $('#modal').modal('toggle');
            $("#modal-title").html("New");

            method = 'post';
            formUrl = `user`;
        }

        function edit(obj) {
            let idx = getSelectedRowDataTables(dt);
            if (idx) {
                let data = dt
                    .row(idx.row)
                    .data();
                // reset form
                $(fm).each(function() {
                    this.reset();
                });

                // mengambil data
                $(fm).deserialize(data)

                let id = data.id;

                // setting title modal
                $("#modal-title").html("Ubah")
                // open modal
                $('#modal').modal('toggle');

                method = 'PUT';
                formUrl = `/user/${id}`;
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
                                url: `/user/${dv}`,
                                type: "DELETE",
                                cache: false,
                                data: {
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function(data, textStatus, jqXHR) {
                                    let table = $('#dt').DataTable();
                                    table
                                        .ajax
                                        .reload();
                                    toastr.success('Data dihapus.');
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    toastr.error('Data dihapus.');
                                }
                            });
                        }
                    })

            }
        }

        $("form").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: formUrl,
                type: method,
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
        });

        $(document).ready(function() {

            dt = $('#dt').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                "scrollX": true,
                "ajax": {
                    "url": "{{ route('getUser') }}"
                },
                "columns": [{
                    data: "DT_RowIndex",
                    orderable: true,
                    searchable: true
                }, {
                    data: "name",
                    orderable: true,
                    searchable: true
                }, {
                    data: "image",
                    orderable: true,
                    searchable: true
                }, {
                    data: "email",
                    orderable: true,
                    searchable: true
                }, {
                    data: "role",
                    orderable: true,
                    searchable: true
                }],
                "columnDefs": [{
                    "render": function(data, type, row, meta) {
                        let image = row.image
                        return '<img width="50" height="50" src="' + image + '">'
                    },
                    "targets": 2
                }, ]
            });

            initSelectRowDataTables('#dt', dt);
        })

        function detail(id) {
            let idx = getSelectedRowDataTables(dt);
            if (idx) {
                let data = dt
                    .row(idx.row)
                    .data();
                // reset form
                $(fm).each(function() {
                    this.reset();
                });

                // mengambil data
                $(fm).deserialize(data)

                // setting title modal
                $("#modal-title").html("Edit")
                $(".modal-footer").hide()
                // open modal
                $('#modal').modal('toggle');

            }
        }
    </script>
@endsection
