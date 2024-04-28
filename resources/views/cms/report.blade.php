@extends('layouts.main_cms')

@section('style')
<style>
    .assessment input{
        display: none
    }
    .assessment{
        filter: grayscale(1)
    }
    .assessment input:hover+label,
    .assessment input:checked+label{
        filter: grayscale(0)
    }
</style>

@endsection

@section('container')
    <div class = "card">
        <div class="card-header">
            <div class="d-flex">
                <h1 class="mt-3">Report Student</h1>
            </div>
        </div>
        <div class="card-body">

            <div class="d-flex justify-content-end mt-3">
                <div class="row">
                    <div class="col col-8">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text">Filter</span>
                            <input type="text" class="form-control" name="year" id="yearFilter" placeholder="Year">
                        </div>
                    </div>
                    <div class="col col-4">
                        <button class="btn btn-md btn-primary d-flex " type="button" onclick="print(this)">Print</button>
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
                            <th>Assessment</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div></div>
        </div>
    </div>

    <div class = "card">
        <div class="card-header">
            <div class="d-flex ">
                <h1 class="mt-3">Report Teacher</h1>
            </div>
        </div>
        <div class="card-body">

            <div class="d-flex justify-content-end mt-3">
                <div class="row">

                    <div class="col col-4">
                        <button class="btn btn-md btn-primary d-flex " type="button" onclick="printTeacher(this)">Print</button>
                    </div>

                </div>


            </div>
            <div class="mt-3">
                <table class="table table-striped w-100" id="dt-teacher">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th class="col-3">Teacher Name</th>
                            <th class="col-2">Telp</th>
                            <th>Birth Date</th>
                            <th>Gradulation</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div></div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="modal-assessment">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-title"> </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered w-100" id="dt-assessment">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>Kurang Baik</th>
                            <th>Baik</th>
                            <th>Sangat Baik</th>
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
        let dt;
        let dtTeacher;
        let dt_assessment;
        let formUrl = '';
        var id_student ='';
        let fm = '#form';
        let method = '';


        function print() {
            var year = $('#yearFilter').val();
            var urlDownload = "{{ route('reportStudent', ':year') }}"
            urlDownload = urlDownload.replace(":year", year)
            window.location.href = urlDownload

        }

        function printTeacher() {
            window.location.href = "{{ route('reportTeacher') }}"

        }

        // function asessment(obj){
        //     $('#modal-assessment').modal('toggle');
        // }

        function asessment(id) {
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
                $("#modal-title").html("Penilaian: "+data.student_name)

                $('#dt-assessment').DataTable({
                            "destroy": true,
                            "processing": true,
                            "select": true,
                            "ajax": {
                                "url": "{{ route('getReportAssessment') }}",
                                data: {
                                                "_token": "{{ csrf_token() }}",
                                                "student_id":data.id
                                            },
                                "type": "post",
                            },
                            "columns": [
                                {
                                    data: "DT_RowIndex",
                                    orderable: true,
                                    searchable: true,
                                    class:"text-end"
                                }, {
                                    data: "argument",
                                    orderable: true,
                                    searchable: true
                                }, {
                                    data: "index",
                                    orderable: true,
                                    searchable: true,
                                    class:"text-center"
                                }, {
                                    data: "index",
                                    orderable: true,
                                    searchable: true,
                                    class:"text-center"
                                },
                                {
                                    data: "index",
                                    orderable: true,
                                    searchable: true,
                                    class:"text-center"
                                }
                            ],
                            "columnDefs": [
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 1){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/sad.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block" </label>'
                                },
                                "targets": 2},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 3){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/happiness.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block" </label>'
                                },
                                "targets": 3},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 5){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return ' <label for="sad"'+style+'> <img src="{!! asset("assets/img/happy.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block" </label>'
                                },
                                "targets": 4}
                            ]

            });


                // open modal
                $('#modal-assessment').modal('toggle');
            }
        }

        $(document).ready(function() {
            $('#yearFilter').yearpicker();

            $('#student_id').val();

            dt = $('#dt').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                "scrollX": true,
                "ajax": {
                    "url": "{{ route('getReportStudent') }}",
                    "data": function(d) {
                        d.year = $('#yearFilter').val();
                    }
                },
                "columns": [{
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
                },{
                    data: "index",
                    orderable: true,
                    searchable: true
                }],
                "columnDefs": [
                                {
                                    "render": function (data, type, row, meta) {
                                        let id = row.id
                                        return '<button class="btn btn-sm btn-primary" type="button" onclick="asessment('+id+')">Asessment</' +
                                            'button>'
                                    },
                                    "targets": 5
                                }
                            ]

            });

            initSelectRowDataTables('#dt', dt);

            $('#yearFilter').change(function() {
                dt.ajax.reload();
            })

            dtTeacher = $('#dt-teacher').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                "scrollX": true,
                "ajax": {
                    "url": "{{ route('getReportTeacher') }}",
                },
                "columns": [{
                    data: "DT_RowIndex",
                    orderable: true,
                    searchable: true
                }, {
                    data: "teacher_name",
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
                    data: "gradulation",
                    orderable: true,
                    searchable: true
                }]
            });


        })
    </script>
@endsection
