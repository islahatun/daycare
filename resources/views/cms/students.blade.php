@extends('layouts.main_cms');

@section('container')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end ">
                <button class="btn btn-sm btn-success mx-2" type="button" onclick="validateRegist(this)">Validate</button>
                <button class="btn btn-sm btn-danger " type="button" onclick="remove(this)">Delete</button>
            </div>
        </div>
        <div class="card-body">
            <div class="mt-3">
                <table class="table table-striped w-100" id="dt">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th class="col-2">Nama Anak</th>
                            <th class="col-1">Umur Anak (Tahun)</th>
                            <th>Telepon/No. Hp</th>
                            <th>E-mail</th>
                            <th>Status Registrasi</th>
                            <th>Validasi</th>
                            <th>Status Pembayaran</th>
                            <th>Bukti Pembayaran</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end ">
                Daftar Anak Lulus
            </div>
        </div>
        <!-- <div class="card-body">
            <div class="mt-3">
                <table class="table table-striped w-100" id="dt1">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th class="col-2">Nama Anak</th>
                            <th class="col-1">Umur Anak (Tahun)</th>
                            <th>Telepon/No. Hp</th>
                            <th>E-mail</th>
                            <th>Status Registrasi</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div> -->

    </div>

    <div class="modal" id="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Detail Anak</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" method="post" enctype="multipart/form-data">
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
                                    <img src="" id="student_image" name="student_image" width="100" height="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

          </div>
        </div>
      </div>
@endsection

@section('script')
    <script>
                    let formUrl = '';
                    let fm = '#form';
                    let method = '';

        $(document).ready(function() {
            dt = $('#dt').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                "scrollX": true,
                "ajax": {
                    "url": "{{ route('getDataListStudents') }}",
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
                        data: "telp",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "email",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "status",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "validate",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "payment_status",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "payment_image",
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
                {"render": function ( data, type, row, meta ) {
                    let status = row.status;
                    let  color = 'bg-success';
                    if(status != 'Student'){
                        color  = 'bg-warning';
                    }
                    return '<span class="badge '+color+'">'+status+'</span>'
                },
                "targets": 5},
                {"render": function ( data, type, row, meta ) {
                    let status = row.validate;
                    let  color = 'bg-success';
                    if(status != '1'){
                        color  = 'bg-warning';
                    }
                    return '<span class="badge '+color+'">'+status+'</span>'
                },
                "targets": 6},
                {"render": function ( data, type, row, meta ) {
                    let status = row.payment_status;
                    let  color = 'bg-success';
                    if(status != 'PAID'){
                        color  = 'bg-warning';
                    }
                    return '<span class="badge '+color+'">'+status+'</span>'
                },
                "targets": 7},
                {"render": function ( data, type, row, meta ) {

                    return "<a href="+row.payment_image+" target='blank'><span class='badge bg-success' >Gambar</span></a>"
                },
                "targets": 8},
                {"render": function ( data, type, row, meta ) {
                    let id = row.id
                    return '<button class="btn btn-sm btn-primary" type="button" onclick="detail('+id+')">Detail</button>'
                },
                "targets": 9},
            ]
            });

            initSelectRowDataTables('#dt', dt);

            // dt1 = $('#dt1').DataTable({
            //     "destroy": true,
            //     "processing": true,
            //     "select": true,
            //     "scrollX": true,
            //     "ajax": {
            //         "url": "{{ route('getDataListStudentsGardulate') }}",
            //     },
            //     "columns": [{
            //             data: "DT_RowIndex",
            //             orderable: true,
            //             searchable: true
            //         },
            //         {
            //             data: "student_name",
            //             orderable: true,
            //             searchable: true
            //         },
            //         {
            //             data: "student_age",
            //             orderable: true,
            //             searchable: true
            //         },
            //         {
            //             data: "telp",
            //             orderable: true,
            //             searchable: true
            //         },
            //         {
            //             data: "email",
            //             orderable: true,
            //             searchable: true
            //         },
            //         {
            //             data: "status",
            //             orderable: true,
            //             searchable: true
            //         },
            //         {
            //             data: "index",
            //             orderable: true,
            //             searchable: true
            //         }
            //     ],
            //     "columnDefs": [
            //     {"render": function ( data, type, row, meta ) {
            //         let status = row.registration_status;
            //         let  color = 'bg-success';
            //         if(status != 'Student'){
            //             color  = 'bg-warning';
            //         }
            //         return '<span class="badge '+color+'">'+status+'</span>'
            //     },
            //     "targets": 5},
            //     {"render": function ( data, type, row, meta ) {
            //         let id = row.id
            //         return '<button class="btn btn-sm btn-primary" type="button" onclick="detail('+id+')">Detail</button>'
            //     },
            //     "targets": 6},
            // ]
            // });
        })

        function validateRegist(obj){
            let idx = getSelectedRowDataTables(dt);

            if (idx) {
                let data = dt.row(idx.row).data();
                $.ajax({
                url: '/student/validateRegist/'+data.id,
                type: 'get',
                data: $(this).serialize(),
                success: function(data, textStatus, jqXHR) {

                    let view = jQuery.parseJSON(data);
                    if (view.status == true) {
                        toastr.success(view.message);
                        let table = $('#dt').DataTable();
                        table.ajax.reload();
                        $('#Modal').modal('hide');

                    } else {
                        toastr.error(view.message);
                    }
                },
                error: function(reject) {

                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                    })


                }

            });
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
                                url: `/student/${dv}`,
                                type: "DELETE",
                                cache: false,
                                data: {
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function(data, textStatus, jqXHR) {
                                    var data = JSON.parse(data);
                        
                                    let table = $('#dt').DataTable();
                                    table
                                        .ajax
                                        .reload();
                                        if(data.status== true){
                                            toastr.success(data.message);
                                        }else{
                                            toastr.error(data.message);
                                        }
                                    
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    toastr.error('Data tidak dapat dihapus');
                                }
                            });
                        }
                    })

            }
        }

        function detail(id){

                        let idx = getSelectedRowDataTables(dt);
                        if (idx) {

                            let data = dt.row(idx.row).data();
                            // reset form
                            $(fm).each(function () {
                                this.reset();
                            });
                            // mengambil data
                            $(fm).deserialize(data)
                            if (data.student_image) {
            $('#student_image').attr('src', data.student_image);
        } else {
            $('#student_image').attr('src', ''); // Reset to blank if no image URL
        }
                            $('#modal').modal('toggle');

                        }


                    }


    </script>
@endsection
