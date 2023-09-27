<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __("translation.Login")}}</title>
    @include('backend.includes.favicon')
    @include('backend.includes.css')
    <title>{{ __("translation.Create new account")}}</title>
</head>
<body>
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            <img src="{{asset('backend_assets')}}/images/logo-img.png" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded" style="display: flex;flex-direction: column;gap:20px">
                                    {{-- <div class="text-center">
                                        <h3 class="">{{ __("translation.Create new account")}}</h3>
                                        <!-- <p>Already have an account? <a href="/login">Sign in here</a> -->
                                        <p>{{ __("translation.already have an account")}}? <a href="/admin/login">{{ __("translation.login here")}}</a>
                                        </p>
                                    </div> --}}
                                        <h1 style="white-space: normal;text-align: center;font-size: 2vw">
                                            {{ __("translation.Thank you for your registeration")}} , <br> {{ __("translation.Please wait till admin verify your account")}}
                                        </h1>
                                        <button style="margin: 0 auto"  class="btn btn-primary" onclick="redirect()">
                                            {{ __("translation.Back to the home page")}}
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function redirect() {
        window.location.href = "{{URL::to('/')}}"
    }
</script>                  
    
</body>
</html>