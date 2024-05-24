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
                <h1 class="mt-3">Validasi Raport Anak</h1>
            </div>
        </div>
        <div class="card-body">

            {{-- <div class="d-flex justify-content-end mt-3">
                <div class="row">
                    <div class="col col-8">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text">Filter</span>
                            <input type="text" class="form-control" name="year" id="yearFilter" placeholder="Year">
                        </div>
                    </div>
                    <div class="col col-4">
                        <button class="btn btn-md btn-primary d-flex " type="button" onclick="print(this)">Cetak</button>
                    </div>

                </div>


            </div> --}}
            <div class="mt-3">
                <table class="table table-striped w-100" id="dt">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th class="col-3">Nama Anak</th>
                            <th class="col-2">Umur Anak (Tahun)</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Penilaian</th>
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

                <input type="hidden" name="student_id" id="student_id">
                <div class="mb-3">
                    <h2 class="text-center">Peliaian 1</h2>
                    <div class="justify-content-end">
                        <button class="btn btn-primary mb-3"  id="validasiData1" onclick="validasi1(1)">Validasi</button>
                    </div>

                    <table class="table table-bordered w-100 mb-3" id="dt-assessment1">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Deskripsi</th>
                                <th>Kurang Baik</th>
                                <th>Baik</th>
                                <th>Sangat Baik</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="mb-3">
                    <h2 class="text-center">Penilaian 2</h2>
                    <button class="btn btn-primary mb-3"  id="validasiData2" onclick="validasi2(2)">Validasi</button>
                    <table class="table table-bordered w-100 mb-3" id="dt-assessment2">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Deskripsi</th>
                                <th>Kurang Baik</th>
                                <th>Baik</th>
                                <th>Sangat Baik</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="mb-3">
                    <h2 class="text-center">Penilaian 3</h2>
                    <button class="btn btn-primary" id="validasiData3" onclick="validasi3(3)">Validasi</button>
                    <table class="table table-bordered w-100 mb-3" id="dt-assessment3">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Deskripsi</th>
                                <th>Kurang Baik</th>
                                <th>Baik</th>
                                <th>Sangat Baik</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="mb-3">
                    <h2 class="content-center">Penilaian 4</h2>
                    <button class="btn btn-primary mb-3"  id="validasiData4" onclick="validasi4(4)">Validasi</button>
                    <table class="table table-bordered w-100 mb-3" id="dt-assessment4">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Deskripsi</th>
                                <th>Kurang Baik</th>
                                <th>Baik</th>
                                <th>Sangat Baik</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="mb-3">
                    <h2 class="text-center">Penilaian 5</h2>
                    <button class="btn btn-primary mb-3"  id="validasiData5" onclick="validasi5(5)">Validasi</button>
                    <table class="table table-bordered w-100 mb-3" id="dt-assessment5">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Deskripsi</th>
                                <th>Kurang Baik</th>
                                <th>Baik</th>
                                <th>Sangat Baik</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="mb-3">
                    <h2 class="text-center">Penilaian 6</h2>
                    <button class="btn btn-primary mb-3"  id="validasiData6" onclick="validasi6(6)">Validasi</button>
                    <table class="table table-bordered w-100 mb-3" id="dt-assessment6">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Deskripsi</th>
                                <th>Kurang Baik</th>
                                <th>Baik</th>
                                <th>Sangat Baik</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

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
                $('#student_id').val(data.id);
                $("#modal-title").html("Penilaian: "+data.student_name)

                $('#dt-assessment1').DataTable({
                            "destroy": true,
                            "processing": true,
                            "select": true,
                            "ajax": {
                                "url": "{{ route('getReportAssessment') }}",
                                data: {
                                                "_token": "{{ csrf_token() }}",
                                                "student_id":data.id,
                                                'assessment':1
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
                                },{
                                    data: "score",
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
                                return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/sad.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 2},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 3){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/happiness.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 3},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 5){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return ' <label for="sad"'+style+'> <img src="{!! asset("assets/img/happy.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 4}
                            ],
                            "createdRow": function (row, data, dataIndex) {
        // Apply custom style based on the score value
        if (data.validasi == 1) {
            $(row).css('background-color', '#dff0d8'); // light red for danger
        }
    }
            });

            $('#dt-assessment2').DataTable({
                            "destroy": true,
                            "processing": true,
                            "select": true,
                            "ajax": {
                                "url": "{{ route('getReportAssessment') }}",
                                data: {
                                                "_token": "{{ csrf_token() }}",
                                                "student_id":data.id,
                                                'assessment':2
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
                                },{
                                    data: "score",
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
                                return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/sad.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 2},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 3){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/happiness.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 3},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 5){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return ' <label for="sad"'+style+'> <img src="{!! asset("assets/img/happy.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 4}
                            ],
                            "createdRow": function (row, data, dataIndex) {
        // Apply custom style based on the score value
        if (data.validasi == 1) {
            $(row).css('background-color', '#dff0d8'); // light red for danger
        }
    }

            });

            $('#dt-assessment3').DataTable({
                            "destroy": true,
                            "processing": true,
                            "select": true,
                            "ajax": {
                                "url": "{{ route('getReportAssessment') }}",
                                data: {
                                                "_token": "{{ csrf_token() }}",
                                                "student_id":data.id,
                                                'assessment':3
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
                                },{
                                    data: "score",
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
                                return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/sad.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 2},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 3){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/happiness.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 3},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 5){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return ' <label for="sad"'+style+'> <img src="{!! asset("assets/img/happy.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 4}
                            ],
                            "createdRow": function (row, data, dataIndex) {
        // Apply custom style based on the score value
        if (data.validasi == 1) {
            $(row).css('background-color', '#dff0d8'); // light red for danger
        }
    }

            });

            $('#dt-assessment4').DataTable({
                            "destroy": true,
                            "processing": true,
                            "select": true,
                            "ajax": {
                                "url": "{{ route('getReportAssessment') }}",
                                data: {
                                                "_token": "{{ csrf_token() }}",
                                                "student_id":data.id,
                                                'assessment':4
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
                                },{
                                    data: "score",
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
                                return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/sad.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 2},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 3){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/happiness.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 3},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 5){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return ' <label for="sad"'+style+'> <img src="{!! asset("assets/img/happy.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 4}
                            ],
                            "createdRow": function (row, data, dataIndex) {
        // Apply custom style based on the score value
        if (data.validasi == 1) {
            $(row).css('background-color', '#dff0d8'); // light red for danger
        }
    }

            });

            $('#dt-assessment5').DataTable({
                            "destroy": true,
                            "processing": true,
                            "select": true,
                            "ajax": {
                                "url": "{{ route('getReportAssessment') }}",
                                data: {
                                                "_token": "{{ csrf_token() }}",
                                                "student_id":data.id,
                                                'assessment':5
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
                                },{
                                    data: "score",
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
                                return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/sad.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 2},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 3){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/happiness.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 3},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 5){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return ' <label for="sad"'+style+'> <img src="{!! asset("assets/img/happy.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 4}
                            ],
                            "createdRow": function (row, data, dataIndex) {
        // Apply custom style based on the score value
        if (data.validasi == 1) {
            $(row).css('background-color', '#dff0d8'); // light red for danger
        }
    }

            });

            $('#dt-assessment6').DataTable({
                            "destroy": true,
                            "processing": true,
                            "select": true,
                            "ajax": {
                                "url": "{{ route('getReportAssessment') }}",
                                data: {
                                                "_token": "{{ csrf_token() }}",
                                                "student_id":data.id,
                                                'assessment':6
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
                                },{
                                    data: "score",
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
                                return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/sad.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 2},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 3){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return '<label for="sad"'+style+'> <img src="{!! asset("assets/img/happiness.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 3},
                                {"render": function ( data, type, row, meta ) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if(row.score == 5){
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return ' <label for="sad"'+style+'> <img src="{!! asset("assets/img/happy.png")!!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                                },
                                "targets": 4}
                            ],
                            "createdRow": function (row, data, dataIndex) {
        // Apply custom style based on the score value
        if (data.validasi == 1) {
            $(row).css('background-color', '#dff0d8'); // light red for danger
        }
    }

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
        function validasi1(value) {
                submit(value)
            }

            function validasi2(value) {
                submit(value)
            }

            function validasi3(value) {
                submit(value)
            }

            function validasi4(value) {
                submit(value)
            }

            function validasi5(value) {
                submit(value)
            }

            function validasi6(value) {
                submit(value)
            }

            function submit(value) {

                $.ajax({
                    url: `/submitValidate`,
                    type: 'post',
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "student_id": $('#student_id').val(),
                        'assessment': value
                    },

                    success: function(data, textStatus, jqXHR) {

                        let view = jQuery.parseJSON(data);
                        if (view.status == true) {
                            toastr.success(view.message);
                        //     let table = $('#dt-assessment').DataTable();
                        // table.ajax.reload();

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
            }
    </script>
@endsection
