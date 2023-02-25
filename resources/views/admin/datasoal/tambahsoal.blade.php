@extends('admin.layouts.app')
@section('title')
    Data Soal
@endsection
@section('breadcumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/dashboard">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="/quizadmin"  class="opacity-5 text-dark">Data Quiz</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="{{ url()->previous() }}"  class="opacity-5 text-dark">Data Soal</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Data Soal</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Tambah Data Soal</h6>
    </nav>
@endsection
@section('content')
    <div class="row m-auto">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <a href="{{ url()->previous() }}" class="btn bg-gradient-primary d-inline-flex me-md-2" >
                        Kembali
                    </a>

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
                    <div class="table-responsive p-2">
                        <table class="table align-items-center mb-0">
                            <form action="/tambahsoal/{{$id}}" method="post">
                                @csrf

                                <table class="table table-bordered">
                                    <tbody>

                                        <tr>
                                            <th scope="row" class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Soal</th>
                                            <td colspan="3" >
                                                <input type="number" class="form-control " id="no" name="no" >

                                            </td>
                                        </tr>
                                    <tr>
                                        <th scope="row" class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Soal</th>
                                        <td colspan="3">
                                            <textarea id="soal" class=" form-control" name="soal" cols="100" rows="10"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pilihan A</th>
                                        <td colspan="3">
                                            <textarea id="pilihana" class="form-control ckeditor" name="a" cols="100" rows="10"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pilihan B</th>
                                        <td colspan="3">
                                            <textarea id="pilihanb" class="form-control" name="b" cols="100" rows="10"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pilihan C</th>
                                        <td colspan="3">
                                            <textarea id="pilihanc" class="form-control" name="c" cols="100" rows="10"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pilihan D</th>
                                        <td colspan="3">
                                            <textarea id="pilihand" class="form-control" name="d" cols="100" rows="10"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jawaban Benar</th>
                                        <td colspan="3">
                                            <select class="form-control" id="jawaban" name="jawaban">
                                                <option {{old('jawaban') ? '' : 'selected disabled'}}>Pilihan Jawaban</option>
                                                <option {{old('jawaban') == 'a' ? 'selected' : ''}} value="a">A</option>
                                                <option {{old('jawaban') == 'b' ? 'selected' : ''}} value="b">B</option>
                                                <option {{old('jawaban') == 'c' ? 'selected' : ''}} value="c">C</option>
                                                <option {{old('jawaban') == 'd' ? 'selected' : ''}} value="d">D</option>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="modal-footer">

                                    <button type="submit" class="btn bg-gradient-primary">Submit</button>
                                  </div>
                                </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
