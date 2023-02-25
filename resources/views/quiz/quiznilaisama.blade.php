<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
        <!-- Primary Meta Tags -->
        <title>Volt - Free Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="title" content="Volt - Free Bootstrap 5 Admin Dashboard">
        <meta name="author" content="Themesberg">
        <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
        <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
        <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
        <meta property="og:title" content="Volt - Free Bootstrap 5 Admin Dashboard">
        <meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
        <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
        <meta property="twitter:title" content="Volt - Free Bootstrap 5 Admin Dashboard">
        <meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
        <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="120x120" href="/frontend/assets/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/frontend/assets/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/frontend/assets/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="/frontend/assets/img/favicon/site.webmanifest">
        <link rel="mask-icon" href="/frontend/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        <!-- Sweet Alert -->
        <link type="text/css" href="/frontend/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

        <!-- Notyf -->
        <link type="text/css" href="/frontend/vendor/notyf/notyf.min.css" rel="stylesheet">

        <!-- Volt CSS -->
        <link type="text/css" href="/frontend/css/volt.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>

<main>

<!-- Hero -->
<section class="section ">
    @php
        $time = explode(':',$data->quiz->time);
    @endphp
        <h2 id="demo" class="time text-center mb-4" >{{$data->quiz->time}}</h2>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col col-lg-8">
                    <div class="card border-0 shadow bg-gray-800 px-5 py-2 ">
                        <div class="text-center mt-3 mb-3">
                            <div class="text-white">
                                <h5>Tes {{$data->quiz->jenisquiz}}</h5>
                            <h3 class="mb-5">{{$data->quiz->quiz}}</h3>
                            <h5>Pilihlah Pernyataan yang sesuai dan mencerminkan diri atau keadaan anda :</h5>
                            </div>
                            <div class="card justify-content-center mt-4 mb-4">
                                    <h5 class="mt-3">{{$data->soal}}</h5>
                                    <div class="table-responsive justify-content-start">
                                        <table class="table table-flush">
                                            <tbody>
                                                <tr></tr>
                                            <tr>
                                                <th class="text-gray-900" scope="row">
                                                        <div class="col-2 col-lg-1">
                                                            <button onclick="send(this)" id="pilihan_a" class="{{$data->jawab == 'A' ?'btn-primary' : 'btn-outline-primary'}} btn d-inline-flex align-items-center me-md-3 "
                                                            type="submit"
                                                            >A</button> {{$data->a}}
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="text-gray-900" scope="row">
                                                        <div class="col-2 col-lg-1">
                                                            <button onclick="send(this)" id="pilihan_a" class="{{$data->jawab == 'A' ?'btn-primary' : 'btn-outline-primary'}} btn d-inline-flex align-items-center me-md-3 "
                                                            type="submit"
                                                            >B</button> {{$data->b}}
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="text-gray-900" scope="row">
                                                        <div class="col-2 col-lg-1">
                                                            <button onclick="send(this)" id="pilihan_a" class="{{$data->jawab == 'A' ?'btn-primary' : 'btn-outline-primary'}} btn d-inline-flex align-items-center me-md-3 "
                                                            type="submit"
                                                            >C</button> {{$data->c}}
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="text-gray-900" scope="row">
                                                        <div class="col-2 col-lg-1">
                                                            <button onclick="send(this)" id="pilihan_a" class="{{$data->jawab == 'A' ?'btn-primary' : 'btn-outline-primary'}} btn d-inline-flex align-items-center me-md-3 "
                                                            type="submit"
                                                            >D</button> {{$data->d}}
                                                        </div>
                                                    </div>

                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-11 col-lg-9 text-end mt-3">
        <h4>
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Akhiri Tes
                </button>
            <a href="/hasil">
            Akhiri Tes <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
              </svg>
            </a>
        </h4>
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
       <h4 class="time">{{$data->quiz->time}}</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        <a href="/hasil" class="btn  btn-danger">Akhiri Tes</a>
      </div>
    </div>
  </div>
</div>
</section>


</main>

    <script>

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

        var jawab=set;
        sessionStorage.setItem("jawab", jawab);

    </script>



    <script>

    function send(object) {
        console.log(
            )
            const btn = document.querySelectorAll('#pilihan_a')
            btn.forEach((item) => {
            item.classList.remove('btn-primary')
            item.classList.add('btn-outline-primary')
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

                $(object).removeClass('btn-outline-primary')
                $(object).addClass('btn-primary')
            }

    });
    }


    </script>

    <!-- Core -->
    <script src="/frontend/vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="/frontend/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Vendor JS -->
    <script src="/frontend/vendor/onscreen/dist/on-screen.umd.min.js"></script>

    <!-- Slider -->
    <script src="/frontend/vendor/nouislider/distribute/nouislider.min.js"></script>

    <!-- Smooth scroll -->
    <script src="/frontend/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Charts -->
    <script src="/frontend/vendor/chartist/dist/chartist.min.js"></script>
    <script src="/frontend/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

    <!-- Datepicker -->
    <script src="/frontend/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Sweet Alerts 2 -->
    <script src="/frontend/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="/frontend/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Notyf -->
    <script src="/frontend/vendor/notyf/notyf.min.js"></script>

    <!-- Simplebar -->
    <script src="/frontend/vendor/simplebar/dist/simplebar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="/frontend/assets/js/volt.js"></script>
    @livewireScripts
    </body>
    </html>
