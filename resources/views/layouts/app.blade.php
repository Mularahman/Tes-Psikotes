<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="/frontend/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/frontend/assets/img/favicon.png">


    <title>Tes Psikotes | @yield('title')</title>


    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="/frontend/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/frontend/assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/frontend/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="/frontend/assets/css/soft-design-system.css?v=1.0.9" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="index-page">

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @guest
                    <nav
                        class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                        <div class="container-fluid px-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                                <path
                                    d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                            </svg>
                            <a class="navbar-brand font-weight-bolder ms-sm-2" href="/" rel="tooltip"
                                title="Tes Psikotes" data-placement="bottom">
                                Tes Psikotes
                            </a>
                            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon mt-2">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </span>
                            </button>
                            <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                                <ul class="navbar-nav navbar-nav-hover justify-content-end w-100">
                                    <li class="ps-12">

                                    </li>
                                    <li class="nav-item  mx-2">
                                        <a class="nav-link d-flex justify-content-between cursor-pointer align-items-center"
                                            href="/" id="dropdownMenuPages" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Home
                                        </a>
                                    </li>
                                    <li class="nav-item my-auto ms-3 ms-lg-0">
                                        <a href="/login"
                                            class="btn btn-sm btn-outline-success btn-round mb-2 me-1 mt-2 mt-md-0">Login</a>
                                    </li>
                                    <li class="nav-item my-auto ms-3 ms-lg-0">

                                        <a href="/register"
                                            class="btn btn-sm  bg-gradient-success  btn-round mb-2 me-1 mt-2 mt-md-0">Register</a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                @endguest
                @auth
                    <nav
                        class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                        <div class="container-fluid px-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                                <path
                                    d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                            </svg>
                            <a class="navbar-brand font-weight-bolder ms-sm-2" href="/" rel="tooltip"
                                title="Tes Psikotes" data-placement="bottom">
                                Tes Psikotes
                            </a>
                            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon mt-2">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </span>
                            </button>
                            <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                                <ul class="navbar-nav navbar-nav-hover justify-content-end w-100">
                                    <li class="ps-12">

                                    </li>
                                    <li class="nav-item dropdown ">
                                        <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="media d-flex align-items-center">
                                                <div class="media-body ms-2 me-2 text-dark align-items-center d-none d-lg-block">
                                                    <span class="mb-0 font-small fw-bold ">Hi,
                                                        {{ auth()->user()->name }}</span>
                                                </div>
                                                @if (auth()->user()->image)
                                                    <img src="{{ asset('storage/' . auth()->user()->image) }}"
                                                        class="avatar avatar-sm rounded-circle mx-auto"
                                                        alt="{{ auth()->user()->name }}">
                                                @else
                                                    <img src="{{ 'https://ui-avatars.com/api/?size=32&name=' . auth()->user()->name }}"
                                                        class="card-img-top avatar-sm rounded-circle border-white"
                                                        alt="{{ auth()->user()->name }}">
                                                @endif

                                            </div>
                                        </a>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                                            <a class="dropdown-item d-flex align-items-center text-gray-800 " href="/home">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-house-fill dropdown-icon text-gray-400 me-2"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                                    <path
                                                        d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                                </svg>
                                                Home
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center text-gray-800 "
                                                href="/myprofile/{{ auth()->id() }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill dropdown-icon text-gray-400 me-2" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                              </svg>
                                                My Profile
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center text-gray-800 "
                                                href="/nilai/{{ auth()->id() }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy-fill dropdown-icon text-gray-400 me-2" viewBox="0 0 16 16">
                                                    <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z"/>
                                                  </svg>
                                                Nilai Saya
                                            </a>
                                            <div role="separator" class="dropdown-divider my-1"></div>
                                            <form action="/logout" method="post">
                                                @csrf
                                                <button class="dropdown-item d-flex align-items-center bg-gradient-danger text-white" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" dropdown-icon text-white me-2" viewBox="0 0 512 512"><path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/></svg>Logout</button>
                                            </form>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                @endauth


            </div>
        </div>
    </div>

    @yield('content')

    <footer class="footer pt-5 mt-5">
        <hr class="horizontal dark mb-5">
        <div class="container">
            <div class=" row">


                <div class="col-12">
                    <div class="text-center">
                        <p class="my-4 text-sm">
                            All rights reserved. Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Company</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!--   Core JS Files   -->
    <script src="/frontend/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="/frontend/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="/frontend/assets/js/plugins/perfect-scrollbar.min.js"></script>




    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="/frontend/assets/js/plugins/countup.min.js"></script>


    <script src="/frontend/assets/js/plugins/choices.min.js"></script>


    <script src="/frontend/assets/js/plugins/prism.min.js"></script>
    <script src="/frontend/assets/js/plugins/highlight.min.js"></script>



    <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
    <script src="/frontend/assets/js/plugins/rellax.min.js"></script>
    <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
    <script src="/frontend/assets/js/plugins/tilt.min.js"></script>
    <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
    <script src="/frontend/assets/js/plugins/choices.min.js"></script>


    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="/frontend/assets/js/plugins/parallax.min.js"></script>


    <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="/frontend/assets/js/soft-design-system.min.js?v=1.0.9" type="text/javascript"></script>


    <script type="text/javascript">
        if (document.getElementById('state1')) {
            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
                countUp.start();
            } else {
                console.error(countUp.error);
            }
        }
        if (document.getElementById('state2')) {
            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
            if (!countUp1.error) {
                countUp1.start();
            } else {
                console.error(countUp1.error);
            }
        }
        if (document.getElementById('state3')) {
            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
            if (!countUp2.error) {
                countUp2.start();
            } else {
                console.error(countUp2.error);
            };
        }
    </script>


</body>

</html>
