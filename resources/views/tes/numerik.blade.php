@extends('layouts.app')
@section('title')
Tes {{$data->quiz}} 
@endsection

@section('content')
<main>
    <!-- Hero -->
    <section class="section overflow-hidden pt-8 pt-lg-9  ">
        {{--  <span class="mask bg-gradient-success opacity-8"></span>  --}}
                {{--  <img src="/frontend/assets/img/shapes/waves-white.svg" alt="pattern-lines"
                    class="position-absolute start-0 top-md-0 w-100 opacity-6">  --}}
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 justify-content-center text-center">
                    {{--  <div class="bootstrap-big-icon d-none d-lg-block" style="z-index: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="700" height="622" class="d-block my-1" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
                            </div>  --}}
                    <h2 class="lead fw-normal text-muted">{{$data->jenisquiz}}</h2>
                    <h1 class="fw-bolder mb-3">{{$data->quiz}}</h1>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-lg-0 ">
                    <div class="rounded text-start">
                        <p class="lead text-muted ">{{$data->info}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-lg-0 ">
                    <div class="rounded text-start">
                        <p class="lead text-muted ">{{$data->info2}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-lg-0 ">
                    <div class="rounded text-start">
                        <p class="lead text-muted ">{{$data->info3}}</p>
                    </div>
                </div>
            </div>
            <div class="text-center ">
                <a class="btn bg-gradient-success d-inline-flex align-items-center me-4"
                    style="display:inline-block;font-weight:500px;font-size:20px;z-index:10000000000;"
                    href="/{{auth()->user()->id}}/{{$data->slug}}/{{$data->soals[0]->no}}">
                    Tes {{$data->quiz}} <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
                        <path fill-rule="evenodd"
                            d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
</main>

@endsection
