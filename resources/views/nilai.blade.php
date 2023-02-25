@extends('layouts.app')
@section('title')
    Nilai
@endsection

@section('content')
    <main>
        <!-- Hero -->

        <section class="section section-lg bg-soft section-header overflow-hidden pt-7   ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="card border-0 shadow ">
                            <div class="card-body">
                                <thead>
                                    <tr >
                                        <h5 class="text-start  text-success text-gradient "><svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" fill="currentColor" class="bi bi-trophy-fill  me-2" viewBox="0 0 16 16">
                                            <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z"/>
                                          </svg>Nilai Saya</h5>
                                    </tr>
                                    <li role="separator" class="dropdown-divider  mb-3 border"></li>
                                </thead>
                                <div class="table-responsive">
                                <table class="table  table-centered table-nowrap mb-0 rounded">
                                    @foreach ($data as $item)
                                    <tr >
                                        <td> {{$item->quiz->quiz}}</td>
                                        <td>: {{$item->nilai}}</td>

                                    </tr>
                                    @endforeach

                                    <tr  >
                                        <td colspan="2" class="text-center"><h4  class="text-success">Nilai Rata-rata</h4></td>
                                    </tr>
                                    <tr  >
                                        <td colspan="2" class="text-center"><h4  class="text-success"> {{$nilai}}</h4></td>
                                    </tr>

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
            </div>
        </section>

    </main>

@endsection
