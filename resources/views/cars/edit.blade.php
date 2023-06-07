@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Horizontal Form</h4>
            <p class="text-muted font-14">
                Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
            </p>

            <form role="form" class="parsley-examples">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-4 col-form-label">Email<span class="text-danger">*</span></label>
                    <div class="col-7">
                        <input type="email" required parsley-type="email" class="form-control" id="inputEmail3" placeholder="Email" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="hori-pass1" class="col-4 col-form-label">Password<span class="text-danger">*</span></label>
                    <div class="col-7">
                        <input id="hori-pass1" type="password" placeholder="Password" required class="form-control" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="hori-pass2" class="col-4 col-form-label">Confirm Password <span class="text-danger">*</span></label>
                    <div class="col-7">
                        <input data-parsley-equalto="#hori-pass1" type="password" required placeholder="Password" class="form-control" id="hori-pass2" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="webSite" class="col-4 col-form-label">Web Site<span class="text-danger">*</span></label>
                    <div class="col-7">
                        <input type="url" required parsley-type="url" class="form-control" id="webSite" placeholder="URL" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-8 offset-4">
                        <div class="form-check ">
                            <input id="checkbox6" type="checkbox" class="form-check-input"/>
                            <label for="checkbox6"class="form-check-label">Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-8 offset-4">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Register</button>
                        <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection