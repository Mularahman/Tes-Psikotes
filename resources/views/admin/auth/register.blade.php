<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/backend/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/backend/assets/img/favicon.png">
    <title>
       Register | Tes Psikotes
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="/backend/assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="/backend/assets/css/nucleo-svg.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/backend/assets/css/nucleo-svg.css" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="/backend/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet">
</head>

<body class="">

    <main class="main-content ">
        <section>
            <div class="page-header min-vh-75">
                <span class="mask bg-gradient-success opacity-8"></span>
                <img src="/frontend/assets/img/shapes/waves-white.svg" alt="pattern-lines"
                    class="position-absolute start-0 top-md-0 w-100 opacity-6">

                <div class="container">

                    <div class="row">
                        <p class=" ps-2 text-center d-flex pt-4 align-items-center justify-content-center">
                            <a href="/" class="d-flex align-items-center justify-content-center">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Back to homepage
                            </a>
                        </p>
                        <div class="col-xl-5 col-lg-6 col-md-6 d-flex flex-column mx-auto">

                            <div class="card card-plain mt-1 mb-6 bg-white shadow">
                                <div class="card-header pb-0 text-left bg-white">
                                    <h3 class="font-weight-bolder text-center text-success text-gradient">Create Account </h3>
                                    <p class="mb-0 text-center">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    @if (session()->has('error'))
                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            <strong >{{ session('error') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <form action="/registeruser" method="POST" class="mt-2">
                                        @csrf
                                        <!-- Form -->
                                        <div class="form-group mb-3">
                                            <label >Your Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                      </svg>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Username"  name="name" autofocus required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email">Your Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                </span>
                                                <input type="email" class="form-control" placeholder="example@company.com" id="email" name="email" autofocus required>
                                            </div>
                                        </div>
                                        <!-- End of Form -->
                                        <div class="form-group">
                                            <!-- Form -->
                                            <div class="form-group mb-3">
                                                <label for="password">Your Password</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                                    </span>
                                                    <input type="password" name="password" placeholder="Password" class="form-control" id="password" required>
                                                </div>
                                            </div>
                                            <!-- End of Form -->

                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="remember" required>
                                                    <label class="form-check-label fw-normal mb-0" for="remember" >
                                                        I agree to the <a href="#" class="fw-bold">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn bg-gradient-success">Sign up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="javascript:;" class="text-success text-gradient font-weight-bold">Sign
                                            up</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>




    <!--   Core JS Files   -->
    <script src="/backend/assets/js/core/popper.min.js"></script>
    <script src="/backend/assets/js/core/bootstrap.min.js"></script>
    <script src="/backend/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/backend/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/backend/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>


</body>

</html>
