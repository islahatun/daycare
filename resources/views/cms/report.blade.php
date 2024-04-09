@extends('layouts.main_cms')

@section('container')
<div class = "card" >
<div class="card-header">
    <div class="d-flex justify-content-end ">
        <a href="{{ route('reportTeacher') }}" class="btn btn-sm btn-primary" target="blank">Print</a>
        {{-- <button class="btn btn-sm btn-primary" type="button" onclick="print(this)">Print</button> --}}
        {{-- <button class="btn btn-sm btn-success mx-2" type="button" onclick="edit(this)">Edit</button>
        <button class="btn btn-sm btn-danger " type="button" onclick="remove(this)">Delete</button> --}}
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


@endsection

@section('script')

                <script>
                    let dt;
                    let formUrl = '';
                    let fm = '#form';
                    let method = '';
                    function print(obj) {
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
                            $("#modal-title").html("Ubah")
                            // open modal
                            $('#modal').modal('toggle');

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
                                        let id = row.id
                                        return '<button class="btn btn-sm btn-primary" type="button" onclick="detail('+id+')">Detail</' +
                                            'button>'
                                    },
                                    "targets": 6
                                }
                            ]
                        });

                        initSelectRowDataTables('#dt', dt);
                    })

                    function detail(id){
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

                            // setting title modal
                            $("#modal-title").html("Edit")
                            $(".modal-footer").hide()
                            // open modal
                            $('#modal').modal('toggle');

                        }
                    }
                </script>

                @endsection
