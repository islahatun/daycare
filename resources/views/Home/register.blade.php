@extends('layouts.main')

@section('container')

<div class="p-3"></div>
    <div class="d-flex justify-content-center p-5">
        <div class="card border-primary mb-3 w-50">
            <div class="text-primary p-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="home-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#home"
                            type="button"
                            role="tab"
                            aria-controls="home"
                            aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="profile-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#profile"
                            type="button"
                            role="tab"
                            aria-controls="profile"
                            aria-selected="false">Register</button>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div
                        class="tab-pane fade show active"
                        id="home"
                        role="tabpanel"
                        aria-labelledby="home-tab">
                        <form id="formLogin">
                            @csrf
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-7">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="staticEmail">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" id="inputPassword">
                                </div>
                            </div>
                            <div class="card text-end">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="profile"
                        role="tabpanel"
                        aria-labelledby="profile-tab">
                        <form id="FormRegister">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label for="student_name" class="col-sm-4 col-form-label">Name</label>
                                        <div class="col-sm-7">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="student_name"
                                                name="student_name">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="birth_date" class="col-sm-4 col-form-label">Birth Date</label>
                                        <div class="col-sm-7">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="birth_date"
                                                name="birth_date">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="birth_city" class="col-sm-4 col-form-label">Birth city</label>
                                        <div class="col-sm-7">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="birth_city"
                                                name="birth_city">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="mother_name" class="col-sm-4 col-form-label">Mother Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="mother_name" name="mother_name">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="mother_job" class="col-sm-4 col-form-label">Mother Job</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="mother_job" name="mother_job">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="father_name" class="col-sm-4 col-form-label">Father Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="father_name" name="father_name">
                                        </div>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label for="father_job" class="col-sm-4 col-form-label">Father job</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="father_job" name="father_job">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="address" class="col-sm-4 col-form-label">Address</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="address" name="address">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="address" class="col-sm-4 col-form-label">Address</label>
                                        <div class="col-sm-7">
                                            <textarea type="text" class="form-control" id="address" name="address"> </textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-4 col-form-label">Email Address</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="student_image" class="col-sm-4 col-form-label">Image</label>
                                        <div class="col-sm-7">
                                            <input type="file" class="form-control" id="student_image" name="student_image">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card text-end">
                                <button class="btn btn-primary" type="">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')
<script>

$(document).ready(function(){

})
</script>
@endsection
