@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Validation type</h4>
            <p class="text-muted font-14">
                Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
            </p>

            <form action="#" class="parsley-examples">
                <div class="mb-3">
                    <label for="heard" class="form-label">Heard about us via *:</label>
                    <select id="heard" class="form-select" required="">
                        <option value="">Choose..</option>
                        <option value="press">Press</option>
                        <option value="net">Internet</option>
                        <option value="mouth">Word of mouth</option>
                        <option value="other">Other..</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Required</label>
                    <input type="text" class="form-control" required placeholder="Type something" />
                </div>
                <div class="mb-3">
                    <label class="form-label">E-Mail</label>
                    <div>
                        <input type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">URL</label>
                    <div>
                        <input parsley-type="url" type="url" class="form-control" required placeholder="URL" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Digits</label>
                    <div>
                        <input data-parsley-type="digits" type="text" class="form-control" required placeholder="Enter only digits" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Number</label>
                    <div>
                        <input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter only numbers" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alphanumeric</label>
                    <div>
                        <input data-parsley-type="alphanum" type="text" class="form-control" required placeholder="Enter alphanumeric value" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Textarea</label>
                    <div>
                        <textarea required class="form-control"></textarea>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection