@extends('layouts.apps')
@section('title')
Hasil Tes {{$quiz->quiz}}

@endsection
@section('content')

<main>
    <!-- Hero -->
    <section class="section overflow-hidden pt-7    ">
        <div class="container ">
            <div class="row justify-content-center ">
                <div class="card col-lg-6 shadow">
                    <div class="card-body">
                        <thead>
                            <tr >
                                <h5 class="text-start text-success text-gradient"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>Tes Selesai</h5>
                            </tr>
                            <li role="separator" class="dropdown-divider  mb-3 border"></li>
                        </thead>
                        <div class="table-responsive">
                        <table class="table  table-centered table-nowrap mb-0 rounded">
                            @foreach ($hasil as $item)
                            <tr>
                                <td>Username</td>
                                <td>: {{auth()->user()->name}}</td>
                            </tr>
                            <tr class="bg-gradient-success text-white">
                                <td>Email</td>
                                <td>: {{auth()->user()->email}}</td>
                            </tr>
                            <tr>
                                <td>Quiz</td>
                                <td>: {{$item->quiz->quiz}}</td>
                            </tr>
                            {{--  <tr>
                                <td>Mulai Mengerjakan</td>
                                <td>: 08:00</td>
                            </tr>
                            <tr>
                                <td>Selesai Mengerjakan</td>
                                <td>: 09:00</td>
                            </tr>  --}}
                            <tr class="bg-gradient-success text-white">
                                <td>Total Soal</td>
                                <td>: {{$item->quiz->soals->count()}}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Benar</td>
                                <td>: {{$item->benar}}</td>
                            </tr>
                            <tr class="" >
                                <td colspan="2" class="text-center"><h4  class="text-success">Nilai</h4></td>
                            </tr>
                            <tr class="" >
                                <td colspan="2" class="text-center"><h4 class="text-success"> {{$item->nilai}}</h4></td>
                            </tr>
                            @endforeach
                        </table>
                        </div>
                    </div>
                </div>
                <p class="text-center pt-3">
                    <a href="/home" class="d-flex align-items-center justify-content-center">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        Back to homepage
                    </a>
                </p>
            </div>
        </div>
    </section>
</main>

@endsection
