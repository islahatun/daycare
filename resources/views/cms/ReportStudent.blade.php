@extends('layouts.main_cms')

@section('style')
@endsection

@section('container')
    <div class = "card">
        <div class="card-header">
            <div class="d-flex">
                <h1 class="mt-3">Rapot Anak</h1>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end mt-3">
                <div class="row">
                    <div class="col col-4">
                        <button class="btn btn-md btn-primary d-flex mb-3 " type="button"
                            onclick="print(this)">Cetak</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="syudent_id" id="student_id" value="{{ $user->student_id }}">
            <div class="mb-3">
                <h2 class="text-center">Peliaian 1</h2>
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
                <h2 class="text-center">Penilaian 4</h2>
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
@endsection

@section('script')
    <script>
        let dt;
        let dtTeacher;
        let dt_assessment;
        let formUrl = '';
        var id_student = '';
        let fm = '#form';
        let method = '';


        function print() {
            window.location.href = "{{ route('Printassessment') }}"

        }



        $(document).ready(function() {
            var data = $('#student_id').val();
            $('#dt-assessment1').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                "ajax": {
                    "url": "{{ route('getReportAssessment') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "student_id": data,
                        "assessment": 1
                    },
                    "type": "post",
                },
                "columns": [{
                        data: "DT_RowIndex",
                        orderable: true,
                        searchable: true,
                        class: "text-end"
                    }, {
                        data: "argument",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "score",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }
                ],
                "columnDefs": [{
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 1) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/sad.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 2
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 3) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happiness.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 3
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 5) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return ' <label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happy.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 4
                    }
                ]

            });

            $('#dt-assessment2').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                "ajax": {
                    "url": "{{ route('getReportAssessment') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "student_id": data,
                        "assessment": 2
                    },
                    "type": "post",
                },
                "columns": [{
                        data: "DT_RowIndex",
                        orderable: true,
                        searchable: true,
                        class: "text-end"
                    }, {
                        data: "argument",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "score",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }
                ],
                "columnDefs": [{
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 1) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/sad.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 2
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 3) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happiness.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 3
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 5) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return ' <label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happy.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 4
                    }
                ]

            });

            $('#dt-assessment3').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                "ajax": {
                    "url": "{{ route('getReportAssessment') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "student_id": data,
                        "assesment": 3
                    },
                    "type": "post",
                },
                "columns": [{
                        data: "DT_RowIndex",
                        orderable: true,
                        searchable: true,
                        class: "text-end"
                    }, {
                        data: "argument",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "score",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }
                ],
                "columnDefs": [{
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 1) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/sad.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 2
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 3) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happiness.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 3
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 5) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return ' <label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happy.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 4
                    }
                ]

            });

            $('#dt-assessment4').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                "ajax": {
                    "url": "{{ route('getReportAssessment') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "student_id": data,
                        "assesment": 4
                    },
                    "type": "post",
                },
                "columns": [{
                        data: "DT_RowIndex",
                        orderable: true,
                        searchable: true,
                        class: "text-end"
                    }, {
                        data: "argument",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "score",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }
                ],
                "columnDefs": [{
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 1) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/sad.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 2
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 3) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happiness.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 3
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 5) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return ' <label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happy.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 4
                    }
                ]

            });

            $('#dt-assessment5').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                "ajax": {
                    "url": "{{ route('getReportAssessment') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "student_id": data,
                        "assesment": 5
                    },
                    "type": "post",
                },
                "columns": [{
                        data: "DT_RowIndex",
                        orderable: true,
                        searchable: true,
                        class: "text-end"
                    }, {
                        data: "argument",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "score",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }
                ],
                "columnDefs": [{
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 1) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/sad.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 2
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 3) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happiness.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 3
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 5) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return ' <label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happy.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 4
                    }
                ]

            });

            $('#dt-assessment6').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                "ajax": {
                    "url": "{{ route('getReportAssessment') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "student_id": data,
                        "assessment": 6
                    },
                    "type": "post",
                },
                "columns": [{
                        data: "DT_RowIndex",
                        orderable: true,
                        searchable: true,
                        class: "text-end"
                    }, {
                        data: "argument",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }, {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: "score",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }
                ],
                "columnDefs": [{
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 1) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/sad.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 2
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 3) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return '<label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happiness.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 3
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var style = "style ='filter: grayscale(1)'"
                            if (row.score == 5) {
                                var style = "style ='filter: grayscale(0)'"
                            }
                            return ' <label for="sad"' + style +
                                '> <img src="{!! asset('assets/img/happy.png') !!}" alt="sad" width="50" height="50" class="mx-auto d-block"> </label>'
                        },
                        "targets": 4
                    }
                ]

            });


        })
    </script>
@endsection
