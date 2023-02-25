@extends('admin.layouts.app')
@section('title')
    Data Quiz
@endsection
@section('breadcumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/dashboard">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Quiz</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Data Quiz</h6>
    </nav>
@endsection
@section('content')
    <div class="row m-auto">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                    </button>

                </div>
                @if (session()->has('success'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>{{session('success')}}</strong>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quiz
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Date Time</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah Soal</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah Peserta</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <p class="font-weight-bold mb-0">{{$loop->iteration}}</p>

                                    </td>
                                    <td>
                                        <div class="d-flex  align-middle">

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$item->quiz}}</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{date('M d, Y', strtotime($item->date))}} {{$item->time}}</p>

                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">{{$item->soals->count()}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">{{$item->quizuser->count()}}</span>
                                    </td>
                                    <td class="align-middle text-center  justify-content-center d-flex">
                                        <a class="btn bg-gradient-primary  me-md-1 btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail Soal" data-container="body" data-animation="true" href="/soal/{{$item->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z"/>
                                              </svg>
                                        </a>
                                        <a class="btn bg-gradient-warning  me-md-1 btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail Peserta" data-container="body" data-animation="true" href="/pesertaquiz/{{$item->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                              </svg>
                                        </a>
                                        <a class="btn bg-gradient-success text-white  me-md-1 btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail Hasil" data-container="body" data-animation="true" href="/hasilquiz/{{$item->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z"/>
                                              </svg>
                                        </a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn bg-gradient-info me-md-1" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$item->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                            </svg>
                                        </button>

                                        <form action="/hapusquiz/{{$item->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-gradient-danger me-md-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button>
                                        </form>
                                        <div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            @include('admin.dataquiz.edit')
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
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Quiz</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tambahquiz" method="post">
        @csrf

            <label for="example-text-input" class="form-control-label">Nama Quiz</label>
            <div class="input-group mb-3">


                <input type="text" class="form-control "  name="quiz" placeholder="Enter Nama Quiz" aria-label="Example text with button addon" aria-describedby="button-addon1">

            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Date</label>
                    <div class="input-group mb-3">


                        <input type="date" class="form-control "  name="date" placeholder="Enter Nama Quiz" aria-label="Example text with button addon" aria-describedby="button-addon1">

                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Time</label>
                    <div class="input-group mb-3">


                        <input type="time" class="form-control "  name="time" placeholder="Enter Nama Quiz" aria-label="Example text with button addon" aria-describedby="button-addon1">

                    </div>
                  </div>
                </div>

            </div>
            <label for="example-text-input" class="form-control-label">Deskripsi</label>
            <div class="input-group mb-3">


                <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>

            </div>
            <label for="example-text-input" class="form-control-label">Jenis Quiz</label>
            <div class="input-group mb-3">


                <input type="text" class="form-control "  name="jenisquiz" placeholder="Enter Jenis Quiz" aria-label="Example text with button addon" aria-describedby="button-addon1">

            </div>
            <label for="example-text-input" class="form-control-label">Info</label>
            <div class="input-group mb-3">


                <textarea class="form-control" name="info" id="" cols="30" rows="10"></textarea>

            </div>
            <label for="example-text-input" class="form-control-label">Info 2</label>
            <div class="input-group mb-3">


                <textarea class="form-control" name="info2" id="" cols="30" rows="10"></textarea>

            </div>
            <label for="example-text-input" class="form-control-label">Info 3</label>
            <div class="input-group mb-3">


                <textarea class="form-control" name="info3" id="" cols="30" rows="10"></textarea>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Submit</button>
              </div>
            </form>

      </div>

    </div>
  </div>
</div>
@endsection
