@extends('layouts.main_cms');

@section('container')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end ">
                <button class="btn btn-sm btn-success" type="button" onclick="sent(this)">Send E-mail</button>
                <button class="btn btn-sm btn-success mx-2" type="button" onclick="validateRegist(this)">Validate</button>
            </div>
        </div>
        <div class="card-body">
            <div class="mt-3">
                <table class="table table-striped w-100" id="dt">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th class="col-4">Student Name</th>
                            <th class="col-2">Age (years)</th>
                            <th>Telp</th>
                            <th>E-mail</th>
                            <th>Registration Status</th>
                            <th>Validate</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        function sent(obj){

            let idx = getSelectedRowDataTables(dt);

            if (idx) {
                let data = dt.row(idx.row).data();

                $.ajax({
                url: '/student/sentEmail/'+data.id,
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
            ]
            });

            initSelectRowDataTables('#dt', dt);
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


    </script>
@endsection
