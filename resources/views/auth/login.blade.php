<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="{{ asset("authv2/assets/js/color-modes.js") }}"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="{{ asset('authv2/assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
        
        .bg--custom{
            background-image: url('{{ asset('img/auth4.jpg') }}');
            background-size: cover;
            /* filter: blur(8px); */
            /* -webkit-filter: blur(8px); */
            z-index: -1;
        }

        .bg--custom::before{
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: #005bea;
            background: -webkit-linear-gradient(bottom, #005bea, #00c6fb);
            background: -o-linear-gradient(bottom, #005bea, #00c6fb);
            background: -moz-linear-gradient(bottom, #005bea, #00c6fb);
            background: linear-gradient(bottom, #005bea, #00c6fb);
            opacity: .7;
        }

        .radius--30{
            border-radius: 30px;
        }

        /* Card Flip */

        .container{
            transform-style: preserve-3d;
        }

        .container .box{
            position: relative;
            width: 390px;
            min-height: 523px;
            max-height: 523px;
            margin: 20px;
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .container .box .body{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: 0.9s ease;
        }

        .container .box .body .content1{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
        }
        
        .container .box .body .content2{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            transform-style: preserve-3d;
            transform: rotateY(180deg);
        }

        .cursor--pointer{
            cursor: pointer;
        }


    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('authv2/assets/sign-in.css') }}" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg--custom">
    @if ($errors->has('username_tech') || $errors->has('password_tech') || $errors->has('redirect_tech'))
        <div class="error-text d-none" id="errorLists">
            {{ $errors->first('username_tech') }}
            {{ $errors->first('password_tech') }}
            {{ $errors->first('redirect_tech') }}
        </div>
    @endif
    <div class="container d-flex align-items-center justify-content-center flex-wrap">
        <div class="box">
            <div class="body">
                <div class="content1">
                    <div class="card radius--30 card-front">
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <img class="mb-4" src="{{ asset('img/AP2.svg') }}" alt="" width="100%">
                                <h1 class="h3 mb-1 fw-normal text-center fw-bold">Please sign in</h1>
                                <h6 class="text-center mb-3">Sign In Non-Techical</h6>
                                @error('username')
                                    <h6 class=" pl-3 text-danger text-center" role="alert">
                                        {{ $message }}
                                    </h6>
                                @enderror
                                @error('password')
                                    <h6 class=" pl-3 text-danger text-center" role="alert">
                                        {{ $message }}
                                    </h6>
                                @enderror
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control radius--30" id="floatingInput" placeholder="Username" name="username">
                                    <label for="floatingInput">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control radius--30" id="floatingPassword" placeholder="Password" name="password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                    
                                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                                <div class="form-check text-center fw-bold text-primary my-3">
                                    <span href="#" class="txt1 cursor--pointer" id="to_technical">
                                        Login to user technical
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content2">
                    <div class="card radius--30 card-front">
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <img class="mb-4" src="{{ asset('img/AP2.svg') }}" alt="" width="100%">
                                <h1 class="h3 mb-1 fw-normal text-center fw-bold">Please sign in</h1>
                                <h6 class="text-center mb-3">Sign In Techical</h6>
                                @error('username_tech')
                                    <h6 class=" pl-3 text-danger text-center" role="alert">
                                        {{ $message }}
                                    </h6>
                                @enderror
                                @error('password_tech')
                                    <h6 class=" pl-3 text-danger text-center" role="alert">
                                        {{ $message }}
                                    </h6>
                                @enderror
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control radius--30" id="floatingInput" placeholder="Username" name="username_tech">
                                    <label for="floatingInput">Username</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control radius--30" id="floatingPassword" placeholder="Password" name="password_tech">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                
                                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                                <div class="form-check text-center fw-bold text-primary my-3">
                                    <span href="#" class="txt1 cursor--pointer" id="to_main">
                                        Login to user main
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('authv2/assets/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
		$('#to_technical').on('click', function(){
            $('.container .box .body .content1').css('backface-visibility', 'hidden');
            $('.container .box .body .content2').css('backface-visibility', '');
            $('.container .box .body').css('transform', 'rotateY(180deg)');
		});
		$('#to_main').on('click', function(){
            $('.container .box .body .content1').css('backface-visibility', '');
            $('.container .box .body .content2').css('backface-visibility', 'hidden');
            $('.container .box .body').css('transform', 'rotateY(0deg)');
		});
	</script>

	<script>
		$(document).ready(function() {
			// Cek apakah ada pesan kesalahan dengan nama 'username_tech'
			if ($('#errorLists').length) {
                $('.container .box .body').css('transform', 'rotateY(180deg)')
			}
		});
	</script>
</body>

</html>
