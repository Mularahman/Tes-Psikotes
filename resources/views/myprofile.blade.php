@extends('layouts.app')
@section('title')
    My Profile
@endsection

@section('content')
    <main>
        <!-- Hero -->

        <section class="section section-lg bg-soft section-header overflow-hidden pt-8  pb-6  ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-4 mb-4">
                        <div class="card  border-0 shadow h-100">
                            <div class="card-header profile-cover d-sm-flex flex-row align-items-center flex-0">

                            </div>
                            <div class="card bg-gradient-success shadow border-0 text-center p-0  h-100">
                                <div class="card-body pb-3">
                                    @if (auth()->user()->image)
                            <img src="{{asset ('storage/'. auth()->user()->image)}}"
                            class="avatar-xl rounded-circle mx-auto mt-n6 mb-4 shadow" alt="{{ auth()->user()->name }}">
                            @else
                            <img src="{{ 'https://ui-avatars.com/api/?size=32&name=' . auth()->user()->name }}"
                            class="avatar-xl rounded-circle mx-auto mt-n6 mb-4 shadow" alt="{{ auth()->user()->name }}">
                            @endif

                                    <h4 class="h3">{{ auth()->user()->name }}</h4>
                                    <h5 class="fw-normal">{{ auth()->user()->email }}</h5>
                                    {{--  <p class="text-gray mb-4">New York, USA</p>  --}}
                                    {{--  <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="#">
                                        <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                            </path>
                                        </svg>
                                        Connect
                                    </a>
                                    <a class="btn btn-sm btn-secondary" href="#">Send Message</a>  --}}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mb-4">
                        <div class="card bg-yellow-100 border-0 shadow h-100">
                            <div class="card-header  flex-row align-items-center flex-0 ">
                                <div class="d-block ">
                                    <h2 class="h5 mb-5 text-success text-gradient text-center">Update Data</h2>
                                    @if (session()->has('errors'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ session('errors') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session()->has('successs'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('successs') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class=" ">
                                        <form action="/updateprofile/{{$id}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label>Your Name</label>
                                                <div class="input-group">
                                                    {{--  <span class="input-group-text " id="basic-addon1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-person-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                        </svg>
                                                    </span>  --}}
                                                    <input type="text" class="form-control" placeholder="Username"
                                                        name="name" value="{{ $data->name }}">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email">Your Email</label>
                                                <div class="input-group">
                                                    {{--  <span class="input-group-text" id="basic-addon1">
                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                                            </path>
                                                            <path
                                                                d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                                            </path>
                                                        </svg>
                                                    </span>  --}}
                                                    <input type="email" class="form-control" value="{{ $data->email }}"
                                                        placeholder="example@company.com" id="email" name="email">
                                                </div>
                                            </div>
                                            <label for="exampleInputEmail1" class="form-label">Upload Image</label>
                                            <input type="hidden" name="oldimage" value="{{$data->image}}">
                                            <div class="d-flex align-items-center form-control mb-4">
                                                <div class="me-3">
                                                    <!-- Avatar -->
                                                    <img  class="rounded avatar img img-preview " >
                                                </div>
                                                <div class="file-field">
                                                    <div class="d-flex justify-content-xl-center ms-xl-3">
                                                        <div class="d-flex">
                                                            <svg class="icon text-gray-500 me-2" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <input type="file" id="image" name="image" onchange="previewimage()">
                                                            {{--  <div class="d-md-block text-left">
                                                                <div class="fw-normal text-dark mb-1">Choose Image</div>
                                                                <div class="text-gray small">JPG, GIF or PNG. Max size of
                                                                    800K</div>
                                                            </div>  --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" class="btn bg-gradient-success">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mb-4">
                        <div class="card bg-yellow-100 border-0 shadow h-100 ">
                            <div class="card-header  flex-row align-items-center flex-0">
                                <div class="d-block mb-3 mb-sm-0">
                                    <h2 class="h5 mb-5 text-success text-gradient text-center">Update Password</h2>
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ session('error') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                    <form action="/update/{{$id}}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="password">Your Password</label>
                                            <div class="input-group">
                                                {{--  <span class="input-group-text" id="basic-addon2">
                                                    <svg class="icon icon-xs text-gray-600" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>  --}}
                                                <input type="password" name="old_password" placeholder="Password"
                                                    class="form-control" id="password" required>
                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <label for="password">New Password</label>
                                            <div class="input-group">
                                                {{--  <span class="input-group-text" id="basic-addon2">
                                                    <svg class="icon icon-xs text-gray-600" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>  --}}
                                                <input type="password" name="new_password" placeholder="Password"
                                                    class="form-control" id="password" required>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="confirm_password">Confirm Password</label>
                                            <div class="input-group">
                                                {{--  <span class="input-group-text" id="basic-addon2">
                                                    <svg class="icon icon-xs text-gray-600" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>  --}}
                                                <input type="password" placeholder="Confirm Password"
                                                    class="form-control" id="confirm_password"
                                                    name="confirm_password" required>
                                            </div>
                                        </div>
                                        <div class="d-grid pt-3">
                                            <button type="submit" class="btn bg-gradient-success">Save</button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script>
        function previewimage(){
            const image = document.querySelector('#image');
            const imgpreview = document.querySelector('.img-preview');

            imgpreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload =function(oFREvent) {
                imgpreview.src = oFREvent.target.result;
            }
        }

    </script>
@endsection
