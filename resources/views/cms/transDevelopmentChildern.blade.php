@extends('layouts.main_cms')

@section('container')
    <div class = "card">
        <div class="card-header">
            <div class="d-flex justify-content-end ">
                <button class="btn btn-sm btn-success mx-2" type="button" onclick="edit(this)">Penilaian</button>
            </div>
        </div>
        <div class="card-body">
            <div class="mt-3">
                <table class="table table-striped w-100" id="dt">
                    <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th class="col-3">Nama</th>
                        <th class="col-2">Umur (Tahun)</th>
                        <th>Status Penilaian</th>
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
                    <h5 class="modal-title" id="modal-title"></h5> <button type="button" class="btn-close"
                                                                           data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <select class="form-control mb-3" name="assessment_from" id="assessment_from_val"
                                onchange="onchangeData()">
                            <option value="">---Pilih Penilaian---</option>
                            <option value="1">Penilaian 1</option>
                            <option value="2">Penilaian 2</option>
                            <option value="3">Penilaian 3</option>
                            <option value="4">Penilaian 4</option>
                            <option value="5">Penilaian 5</option>
                            <option value="6">Penilaian 6</option>
                        </select>
                        <input type="hidden" id="student_id" name="student_id">
                        <table class="table table-bordered w-100" id="dt-assessment">
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

                    </form>
                </div>
            </div>
        </div>
        @endsection
        @section('script')
            <script>
                let dt;
                var dt_assessment;
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
                    formUrl = `teacher`;
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
                        $("#student_id").val(id)


                        // setting title modal
                        $("#modal-title").html("Penilaian")
                        // open modal
                        $('#modal').modal('toggle');

                        method = 'PUT';
                        formUrl = `/teacher/${id}`;
                    }
                }





                $(document).ready(function() {
                    dt = $('#dt').DataTable({
                        "destroy": true,
                        "processing": true,
                        "select": true,
                        "scrollX": true,
                        "ajax": {
                            "url": "{{ route('getDataStudent') }}"
                        },
                        "columns": [{
                            data: "DT_RowIndex",
                            orderable: true,
                            searchable: true,
                            class: "text-center"
                        }, {
                            data: "student_name",
                            orderable: true,
                            searchable: true
                        }, {
                            data: "student_age",
                            orderable: true,
                            searchable: true
                        }, {
                            data: "status",
                            orderable: true,
                            searchable: true
                        }],

                    });

                    initSelectRowDataTables('#dt', dt);

                })

                function onchangeData() {
                    var from = $('#assessment_from_val').val();
                    var student_id = $('#student_id').val();
                    dt_assessment = $('#dt-assessment').DataTable({
                        "destroy": true,
                        "processing": true,
                        "select": true,
                        "ajax": {
                            "url": "/getData-assessment/" + from + '/'+student_id
                        },
                        "columns": [{
                            data: "DT_RowIndex",
                            orderable: true,
                            searchable: true
                        }, {
                            data: "argument",
                            orderable: true,
                            searchable: true
                        }, {
                            data: "index",
                            orderable: true,
                            searchable: true
                        },
                        {
                                data: "score",
                                orderable: true,
                                searchable: true
                        }
                        ],
                        "columnDefs": [{
                            "render": function(data, type, row, meta) {
                                console.log(row)

                                if (row.score == 1) {
                                    var style = "style ='filter: grayscale(0)'"
                                }else{
                                var style = "style ='filter: grayscale(1)'"
                                }
                                return '<input name="flexRadioDefault" id="sad" type="radio" value="1" onclick="setSad(' +
                                    row.id +
                                    ',1)"> <label for="sad"' + style +
                                    ' class="value-assessment"> <img src="{!! asset('assets/img/sad.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block" </label>'
                            },
                            "targets": 2
                        },
                            {
                                "render": function(data, type, row, meta) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if (row.score == 3) {
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return '<input name="flexRadioDefault" id="happiness" type="radio" value="3" onclick="setHappiness(' +
                                        row.id +
                                        ',3)"> <label for="happiness"' + style +
                                        ' class="value-assessment"> <img src="{!! asset('assets/img/happiness.png') !!}" alt="happiness" width="50" height="50" class="mx-auto d-block" </label>'
                                },
                                "targets": 3
                            },
                            {
                                "render": function(data, type, row, meta) {
                                    var style = "style ='filter: grayscale(1)'"
                                    if (row.score == 5) {
                                        var style = "style ='filter: grayscale(0)'"
                                    }
                                    return '<input name="flexRadioDefault" id="happy" type="radio" value="5" onclick="setHappy(' +
                                        row.id +
                                        ',5)"> <label for="happy"' + style +
                                        ' class="value-assessment"> <img src="{!! asset('assets/img/happy.png') !!}" alt="happy" width="50" height="50" class="mx-auto d-block" </label>'
                                },
                                "targets": 4
                            }
                        ]

                    });
                }


                function setSad(id, value) {
                    submit(id, value)
                }

                function setHappy(id, value) {
                    submit(id, value)
                }

                function setHappiness(id, value) {
                    submit(id, value)
                }

                function submit(id, value) {

                    $.ajax({
                        url: `/submitAssessment`,
                        type: 'post',
                        cache: false,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id,
                            "score": value,
                            "student_id": $('#student_id').val(),
                            'assessment_from': $('#assessment_from_val').val()
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

