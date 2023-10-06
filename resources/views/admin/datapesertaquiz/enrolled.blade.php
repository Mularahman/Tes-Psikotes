@extends('admin.layouts.app')
@section('title')
    Data Peserta Quiz
@endsection
@section('breadcumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/dashboard">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="/quizadmin"
                    class="opacity-5 text-dark">Data Quiz</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Peserta Quiz</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Data Peserta Quiz</h6>
    </nav>
@endsection
@section('content')
    <div class="row m-auto">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col">

                    <a href="/enrolle/{{ $id }}" class="btn bg-gradient-primary d-inline-flex me-md-2"
                        type="submit">

                        Tambah Data
                    </a>



                    <button class="btn bg-gradient-danger d-inline-flex me-md-2"
                        type="submit" id="deleteSelected">

                        Hapus Data Pilihan
                    </button>


                    <a class="btn bg-gradient-success d-inline-flex me-md-2 " href="/enrolle/{{$id}}/cetak">
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

                     </div>

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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><input type="checkbox"  id="example-select-all" class="selectall">
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No
                                    </th>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Peserta
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <input class="select" type="checkbox" name="user[]" id="" value="{{ $item->id }}">

                                        </td>
                                        <td>
                                            <p class="font-weight-bold mb-0">{{ $loop->iteration }}</p>

                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    @if ($item->user->image)
                                                <img src="{{ asset('storage/' . $item->user->image) }}"
                                                    class="avatar avatar-sm me-3" alt="{{ $item->user->name }}">
                                            @else
                                                <img src="{{ 'https://ui-avatars.com/api/?size=32&name=' . $item->user->name }}"
                                                    class="avatar avatar-sm me-3" alt="{{ $item->user->name }}">
                                            @endif
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->user->name }}</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->user->email }}</p>

                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($item->status == 1)
                                            <span class="badge badge-sm bg-gradient-success">Sudah Mengerjakan</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-warning">Belum Mengerjakan</span>
                                            @endif

                                        </td>
                                        <td class="align-middle text-center  justify-content-center d-flex">
                                            <!-- Button trigger modal -->
                                        <button type="button" class="btn bg-gradient-danger me-md-1" data-bs-toggle="modal" data-bs-target="#exampleModal2{{$item->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </button>
                                        <div class="modal fade" id="exampleModal2{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            @include('admin.datapesertaquiz.hapus')


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
    <script>


        $('.selectall').change(function() {
            $(".select").not(this).prop('checked', this.checked)
        });
        $('.select').change(function() {
            if ($('.select:checked').length == $(
                    '.select').length) {
                $('.selectall').prop('checked', true);
            } else {
                $('.selectall').prop('checked', false);
            }
        });

        var selectVal = [];
        $('#deleteSelected').on('click', function() {
            $(".select:checked").each(function() {
                selectVal.push($(this).val());
            });
            if (confirm(`Anda Yakin Ingin Menghapus ${selectVal.length} Peserta Quiz!`) == true) {
                $(this).html('Mohon Tunggu...').prop('disabled', true)
            } else {
                console.log('ok');
            }
            $.post('{{ route('delete.selected') }}', {
                    "_token": "{{ csrf_token() }}",
                    data: selectVal ? selectVal : []
                },
                function(data) {
                    $("input[type='checkbox']").prop('checked', false);
                    selectVal = []
                    $('#deleteSelected').html('Delete Selected')
                    $('#deleteSelected').removeAttr('disabled')
                    location.reload()
                });
        })

    </script>

@endsection
