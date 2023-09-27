<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('backend.includes.favicon')
    @include('backend.includes.css')
    <link rel="stylesheet" href="{{ asset('backend_assets/css/register.css') }}">
    <title>{{ __("translation.Create new account")}}</title>
</head>
<body class="bg-login">
        <div class="wrapper">
            <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
                <div class="container" style="max-width: unset;">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                        <div class="col mx-auto" style="width: fit-content;">
                            <div class="my-4 text-center">
                                <img src="{{asset('backend_assets')}}/images/logo-img.png" width="180" alt="" />
                            </div>    
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <p>{{ __("translation.already have an account")}}? <a href="/admin/login">{{ __("translation.login here")}}</a>
                                    </center>
                                    <div class=" p-4 rounded">
                                        <div class="sub_plans_cont">
                                          
                                           @foreach($plans as $e)
                                                <div class="subs_card" >
                                                    <h2 class="plan_title">{{$e["plan_name"]}}</h2>
                                                    <h3 class="plan_price">{{$e["price"]}} ريال</h3>
                                                    <hr class="hr">
                                                    <div class="plan_disc">{{$e["description"]}}</div>
                                                    <button class="btn btn-primary sub_btn" onclick="sub({{$e['id']}})">{{ __("translation.Subscribe now")}}</button>
                                                </div>
                                                <!-- <div class="subs_card">
                                                    <h2 class="plan_title">اشتراك شهر</h2>
                                                    <h3 class="plan_price">600 ريال</h3>
                                                    <hr>
                                                    <div class="plan_disc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit amet vel reprehenderit est explicabo provident error facere ratione voluptatum ipsam beatae quas saepe fugiat expedita necessitatibus aliquam accusantium, ab repellat!</div>
                                                    <button class="btn btn-primary">اشترك الان</button>
                                                </div> -->
                                           @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            if(document.querySelector(".sub_plans_cont").children.length == 1){
                document.querySelector('.card').style.width = "60%"
                document.querySelector('.card').style.margin = "0 auto"
            }
            function sub (e){
               localStorage.setItem("choosen_plan",e)
               setInterval(() => {
                    if(localStorage.getItem("choosen_plan")){
                        // window.location.href= './register/register_step2.blade.php'
                        window.location.href = "{{URL::to('admin/register/step_4')}}"
                    }
                }, 1000);  
            }

            window.onload = ()=>{
                // if(localStorage.getItem("choosen_plan")){
                //         // window.location.href= './register/register_step2.blade.php'
                //         window.location.href = "{{URL::to('register/step_4')}}"
                // }
            }
        </script>
</body>
</html>