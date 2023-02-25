@extends('admin.layouts.app')
@section('title')
    Tuntas
@endsection
@section('breadcumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/dashboard">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="/dashboard"  class="opacity-5 text-dark">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tuntas</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Nilai >= 70</h6>
    </nav>
@endsection
@section('content')
    <div class="row m-auto">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <a class="btn bg-gradient-primary d-inline-flex me-md-2 " href="/tuntas/cetak">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-printer-fill me-md-2" viewBox="0 0 16 16">
                            <path
                                d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                            <path
                                d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        </svg>
                        Download
                    </a>

                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"><strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                @endif


                <div class="card-body px-2 py-2 pt-0 pb-2">
                    <div class="table-responsive p-2" style="max-height: 400px !important">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Quiz</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username
                                    </th>
                                    {{--  <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>  --}}
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nilai</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold mb-0">{{ $loop->iteration }}</p>

                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$item->user->name}}</p>

                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs">{{$item->quiz->quiz}}</h6>

                                                </div>
                                            </div>
                                        </td>
                                        {{--  <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                    </td>  --}}
                                        <td class="align-middle text-center text-sm justify-content-center d-flex">


                                            {{$item->nilai}}



                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
