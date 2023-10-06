@extends('admin.layouts.app')
@section('title')
    Tambah Peserta Quiz
@endsection
@section('breadcumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/dashboard">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="/quizadmin"  class="opacity-5 text-dark">Data Quiz</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="{{ url()->previous() }}"  class="opacity-5 text-dark">Data Peserta Quiz</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Peserta Quiz</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Tambah Peserta Quiz</h6>
    </nav>
@endsection
@section('content')
    <div class="row m-auto">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col">

                    <a href="{{ url()->previous() }}" class="btn bg-gradient-primary d-inline-flex me-md-2" >
                        Kembali
                    </a>
                </div>
                    <div class="col">
                        <form action="/enrolle/{{ $id }}" method="get">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="search" placeholder="Cari Nama User...">
                            </div>
                        </form>

                    </div>
                </div>

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

                <form action="/enrolle/{{$id}}" method="post">
                    @csrf
                <div class="card-body px-2 py-2 pt-0 pb-2">
                    <div class="table-responsive p-2" style="max-height: 400px !important">
                        <table class="table align-items-center mb-0"   id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><input type="checkbox"  id="example-select-all" class="selectall">
                                    </th>

                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Peserta
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email</th>


                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($data as $key => $value)
                                {{--  @dd($value->userquizs->where('quiz_id', $id)->first()->quiz_id)  --}}
                                @if (!$value->userquizs->where('quiz_id', $id)->first())

                                <tr>
                                    <td>
                                        <input class="select" type="checkbox" name="user[]" id="" value="{{ $value->id }}">

                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                @if ($value->image)
                                                <img src="{{ asset('storage/' . $value->image) }}"
                                                    class="avatar avatar-sm me-3" alt="{{ $value->name }}">
                                            @else
                                                <img src="{{ 'https://ui-avatars.com/api/?size=32&name=' . $value->name }}"
                                                    class="avatar avatar-sm me-3" alt="{{ $value->name }}">
                                            @endif
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$value->name}}</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$value->email}}</p>

                                    </td>
                                    {{--  <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                    </td>  --}}

                                </tr>


                                @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-primary me-5">Submit</button>
                  </div>
                </form>
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
            if (confirm(`Are you sure to delete ${selectVal.length} inactive users!`) == true) {
                $(this).html('Please Wait...').prop('disabled', true)
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
