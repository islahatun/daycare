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
    <div class="d-flex mt-3">
        <div class="row">
            <div class="col col-8">
                <div class="input-group mb-3 ">
                    <span class="input-group-text" >Filter</span>
                    <input type="text" class="form-control" name="year" id="yearFilter" placeholder="Year">
                  </div>
            </div>
        </div>

    </div>
    <div class="mt-3">
        <table class="table table-striped w-100" id="dt">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th class="col-3">Student Name</th>
                    <th class="col-2">Student Age</th>
                    <th>Birth Date</th>
                    <th>Address</th>
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
                        $('#yearFilter').yearpicker();

                        dt = $('#dt').DataTable({
                            "destroy": true,
                            "processing": true,
                            "select": true,
                            "scrollX": true,
                            "ajax": {
                                "url"   : "{{ route('getReportStudent') }}",
                                "data"  : function (d) {
        d.year = $('#yearFilter').val();
    }
                            },
                            "columns": [
                                {
                                    data: "DT_RowIndex",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "student_name",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "student_age",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "birth_date",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "address",
                                    orderable: true,
                                    searchable: true
                                }
                            ]
                        });

                        initSelectRowDataTables('#dt', dt);

                        $('#yearFilter').change(function(){
                            dt.ajax.reload();
                        })
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
