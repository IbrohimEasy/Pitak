@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">Buttons example</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('user.create')}}">{{translate('Create')}}</a>
            </div>
            <p class="text-muted font-14 mb-3">
                The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
            </p>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Phone number</th>
                        <th>Avatar</th>
                        <th>Updated at</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Twain</td>
                    <td>+998904567834</td>
                    <td class="text-center"><img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt=""></td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('user.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('user.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('user.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Mark</td>
                    <td>Twain</td>
                    <td>+998904567834</td>
                    <td class="text-center"><img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt=""></td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('user.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('user.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('user.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Mark</td>
                    <td>Twain</td>
                    <td>+998904567834</td>
                    <td class="text-center"><img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt=""></td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('user.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('user.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('user.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Mark</td>
                    <td>Twain</td>
                    <td>+998904567834</td>
                    <td class="text-center"><img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt=""></td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('user.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('user.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('user.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Mark</td>
                    <td>Twain</td>
                    <td>+998904567834</td>
                    <td class="text-center"><img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt=""></td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('user.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('user.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('user.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Mark</td>
                    <td>Twain</td>
                    <td>+998904567834</td>
                    <td class="text-center"><img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt=""></td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('user.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('user.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('user.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Mark</td>
                    <td>Twain</td>
                    <td>+998904567834</td>
                    <td class="text-center"><img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt=""></td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('user.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('user.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('user.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Mark</td>
                    <td>Twain</td>
                    <td>+998904567834</td>
                    <td class="text-center"><img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt=""></td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('user.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('user.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('user.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>Mark</td>
                    <td>Twain</td>
                    <td>+998904567834</td>
                    <td class="text-center"><img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt=""></td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('user.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('user.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('user.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>Mark</td>
                    <td>Twain</td>
                    <td>+998904567834</td>
                    <td class="text-center"><img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt=""></td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('user.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('user.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('user.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">11</th>
                    <td>Mark</td>
                    <td>Twain</td>
                    <td>+998904567834</td>
                    <td class="text-center"><img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt=""></td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('user.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('user.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('user.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection