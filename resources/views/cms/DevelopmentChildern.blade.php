@extends('layouts.main_cms')

@section('container')
<div class = "card" >
<div class="card-header">
    <div class="d-flex justify-content-end ">
        <button class="btn btn-sm btn-primary" type="button" onclick="add(this)">Tambah</button>
        <button class="btn btn-sm btn-success mx-2" type="button" onclick="edit(this)">Ubah</button>
        <button class="btn btn-sm btn-danger " type="button" onclick="remove(this)">Hapus</button>
    </div>
</div>
<div class="card-body">
    <div class="mt-3">
        <table class="table table-striped w-100" id="dt">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th class="col-3">Argument</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
</div>

<div class="modal" id="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
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
        <label for="argument" class="col-sm-4 col-form-label">Argument</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="argument" name="argument"></div>
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
                        $(fm).each(function () {
                            this.reset();
                        });
                        $('#modal').modal('toggle');
                        $("#modal-title").html("New");

                        method = 'post';
                        formUrl = `DevelopmentChildern`;
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
                            formUrl = `/DevelopmentChildern/${id}`;
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
                                            url: `/DevelopmentChildern/${dv}`,
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
                                    let table = $('#dt').DataTable();
                                                table
                                                    .ajax
                                                    .reload();
                                                    $('#modal').modal('toggle');
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

                        dt = $('#dt').DataTable({
                            "destroy": true,
                            "processing": true,
                            "select": true,
                            "scrollX": true,
                            "ajax": {
                                "url": "{{ route('getDataDevelopmentChildern') }}"
                            },
                            "columns": [
                                {
                                    data: "DT_RowIndex",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "argument",
                                    orderable: true,
                                    searchable: true
                                },
                                {
                                    data: "index",
                                    orderable: true,
                                    searchable: true
                                }
                            ],
                            "columnDefs": [

                                {
                                    "render": function (data, type, row, meta) {
                                        let id = row.id
                                        return '<button class="btn btn-sm btn-primary" type="button" onclick="detail('+id+')">Detail</' +
                                            'button>'
                                    },
                                    "targets": 2
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
