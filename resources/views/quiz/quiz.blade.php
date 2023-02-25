@extends('layouts.apps')
@section('title'){{$quiz->quiz}}
@endsection
@section('content')

<main>

<!-- Hero -->
<section class="section overflow-hidden pt-6 pb-9 pb-lg-7  ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Soal {{$data->no}}</h2>
                                </div>
                                @php

                                    $time = explode(':',$data->quiz->time);
                                @endphp

                                {{--  <div class="col text-end" id="demo">
                                    <a class="btn btn-sm btn-info time" >{{$data->quiz->time}}</a>
                                </div>  --}}
                                <div class="col text-end" >
                                    <a class="btn btn-sm bg-gradient-info "id="time" >00:00:00</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">

                                </thead>
                                <tbody>
                                <tr>
                                    <th class="text-gray-900 px-4 " colspan="3" scope="row" >
                                    <div class="row">
                                        <div class="col-6">

                                                {{$data->soal}}
                                            </div>
                                        </div>
                                    </th>

                                </tr>
                                <tr>
                                    <th class="text-gray-900" scope="row">
                                        <div class="row align-items-center">
                                            <div class="col-2 col-lg-1">
                                                @if($jawaban != null && $jawaban->jawaban == 'A')
                                            <button  onclick="send(this)" id="pilihan_a" class="btn-dark btn   d-inline-flex align-items-center me-md-3" type="submit">A</button>
                                            @else
                                            <button  onclick="send(this)" id="pilihan_a" class="{{$data->jawab == 'A' ?'btn-dark' : 'btn-outline-dark'}} btn  d-inline-flex align-items-center me-md-3" type="submit">A</button>
                                            @endif
                                            </div>
                                            <div class=" col-10 ">{{$data->a}}</div>
                                        </div>

                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-gray-900" scope="row">
                                        <div class="row align-items-center">
                                            <div class="col-2 col-lg-1">
                                                @if($jawaban != null && $jawaban->jawaban == 'B')
                                                <button  onclick="send(this)" id="pilihan_a" class="btn-dark btn  d-inline-flex align-items-center me-md-3" type="submit">B</button>
                                                @else
                                                <button  onclick="send(this)" id="pilihan_a" class="{{$data->jawab == 'B' ?'btn-dark' : 'btn-outline-dark'}} btn  d-inline-flex align-items-center me-md-3" type="submit">B</button>
                                                @endif
                                                </div>
                                        <div class=" col-10 ">{{$data->b}}</div>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-gray-900" scope="row">
                                        <div class="row align-items-center">
                                            <div class="col-2 col-lg-1">
                                                @if($jawaban != null && $jawaban->jawaban == 'C')
                                                <button  onclick="send(this)" id="pilihan_a" class="btn-dark btn  d-inline-flex align-items-center me-md-3" type="submit">C</button>
                                                @else
                                                <button  onclick="send(this)" id="pilihan_a" class="{{$data->jawab == 'C' ?'btn-primary' : 'btn-outline-dark'}} btn  d-inline-flex align-items-center me-md-3" type="submit">C</button>
                                                @endif
                                                </div>
                                        <div class=" col-10 ">{{$data->c}}</div>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-gray-900" scope="row">
                                        <div class="row align-items-center">
                                            <div class="col-2 col-lg-1">
                                            @if($jawaban != null && $jawaban->jawaban == 'D')
                                            <button  onclick="send(this)" id="pilihan_a" class="btn-dark btn  d-inline-flex align-items-center me-md-3" type="submit">D</button>
                                            @else
                                            <button  onclick="send(this)" id="pilihan_a" class="{{$data->jawab == 'D' ?'btn-dark' : 'btn-outline-dark'}} btn  d-inline-flex align-items-center me-md-3" type="submit">D</button>
                                            @endif
                                            </div>
                                        <div class=" col-10 ">{{$data->d}}</div>
                                    </th>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <li class="dropdown-divider mt-4 mb-0 border-gray-700"></li>
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    @if ($previous)
                                    <a href="/{{auth()->user()->id}}/{{$data->quiz->slug}}/{{$previous->no}}" class="btn bg-gradient-success text-white">previous</a>
                                    @endif

                                </div>
                                <div class="col text-end">
                                    @if ($next)
                                    <a href="/{{auth()->user()->id}}/{{$data->quiz->slug}}/{{$next->no}}" class="btn  bg-gradient-success text-white">Next</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="col-12 px-0 mb-4">
                        <div class="col-12 mb-4">
                            <div class="card shadow border-0 text-center p-0">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class=" mb-0 btn bg-gradient-info">Terjawab {{$jawabans->count()}}</h3>
                                        </div>
                                        <li class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                                        <div class=" justify text-center">
                                            <div class="row-cols-5 ">

                                                @foreach ($quiz->soals as $no )
                                                @forelse ($no->jawab->where('user_id',auth()->id()) as $jawabanuser )
                                                @if ($jawabanuser->soal_id == $no->id && $jawabanuser->user_id == auth()->id() )
                                                    <a  id="jawab" class="btn btn-dark w-25 align-items-center m-1 {{$jawabanuser->user_id == auth()->id() ? 'btn-dark' : 'btn-outline-dark'}} text-white" href="/{{auth()->user()->id}}/{{$quiz->slug}}/{{$no->no}}">{{$no->no}}</a>
                                                @else
                                                    <a  id="jawab" class="{{$no}}  btn btn-outline-dark  w-25 align-items-center m-1" href="/{{auth()->user()->id}}/{{$quiz->slug}}/{{$no->no}}">{{$no->no}}</a>
                                                @endif

                                                @empty
                                                    <a  id="jawab" class="{{$no}}  btn btn-outline-dark  w-25  align-items-center m-1 d-inline-flex " href="/{{auth()->user()->id}}/{{$quiz->slug}}/{{$no->no}}">{{$no->no}}</a>
                                                @endforelse

                                                @endforeach

                                            </div>
                                          </div>

                                        <li class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                                        <div class="col">
                                            <!-- Button trigger modal -->
                                                <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Akhiri Tes
                                                </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Anda Yakin Ingin Mengakhiri Tes ?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        Waktu Masih Tersisa <br>
       <h4 class="time" id="times">{{$data->quiz->time}}</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
        <a href="/{{$quiz->slug}}/hasil" class="btn  bg-gradient-danger">Akhiri Tes</a>
      </div>
    </div>
  </div>
</div>
    </div>
</section>


</main>

    {{--  <script>

        var time =@json($time);
        console.log(time);
        $('.time').text(time[1]+':'+time[2]);


        var seccond = time[2];
        var minutes = time[1];


        setInterval(() => {
        if(seccond <= 0) {
            minutes--;
            seccond = 59;
        }

        if(minutes <= 0){
            window.location.href = "{{ route('hasil')}}";
        }

        let tempMinutes = minutes.toString().length > 1? minutes:'0'+minutes;
        let tempSeccond = seccond.toString().length > 1? seccond:'0'+seccond;

        var set = $('.time').text(tempMinutes+':'+ tempSeccond );



        seccond--;

        }, 1000);



    </script>  --}}
    <script>
        // Set the date we're counting down to


        var countTime = "{{date('M d, Y', strtotime($data->quiz->date))}} " +"{{$data->quiz->time}}"

        var countDownDate = new Date(countTime);
        console.log(countTime);
        // Update the count down every 1 second
        var x = setInterval(function() {

          // Get today's date and time
          var now = new Date();

          // Find the distance between now and the count down date
          var distance = countDownDate - now;

          // Time calculations for days, hours, minutes and seconds

          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Output the result in an element with id="demo"
          document.getElementById("time").innerHTML =  hours + ":"
          + minutes + ": " + seconds ;
          document.getElementById("times").innerHTML =  hours + ":"
          + minutes + ": " + seconds ;


          // If the count down is over, write some text
          if (distance <= 0) {
            window.location.href = "{{ route('hasil',$quiz)}}";
          }
        }, 1000);
        </script>
    <script>

    function send(object) {
        console.log(
            )
            const btn = document.querySelectorAll('#pilihan_a')
            btn.forEach((item) => {
            item.classList.remove('btn-dark')
            item.classList.add('btn-outline-dark')
            })
    $.ajax({
        type:'POST',
        url:"{{ route('jawab') }}",
        data:{
        '_token':'{{csrf_token()}}',
        'jawaban':  $(event.target).html(),
        'user_id': '{{auth()->user()->id}}',
        'quiz_id': '{{$data->quiz_id}}',
        'soal_id': '{{$data->id}}'
        },
        success:function(result){

                $(object).removeClass('btn-outline-dark')
                $(object).addClass('btn-dark')
            }

    });
    }


    </script>

@endsection
