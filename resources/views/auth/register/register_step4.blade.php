<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('backend.includes.favicon')
    @include('backend.includes.css')
    <link rel="stylesheet" href="{{ asset('backend_assets/css/register.css') }}">
    <title>{{ __("translation.Create new account")}}</title>
</head>
<body class="bg-login">
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto" style="width: 100%">
                        <div class="my-4 text-center">
                            <img src="{{asset('backend_assets')}}/images/logo-img.png" width="180" alt="" />
                        </div>    
                        <div class="card" style="  height: 60vh;">
                            <div class="card-body">
                                <center>
                                    <p>{{ __("translation.already have an account")}}? <a href="/admin/login">{{ __("translation.login here")}}</a>
                                </center>
                                <div class=" p-4 rounded">
                                   <div class="payment_dev">
                                        <h1 class="payment_title"> {{ __("translation.Choose payment method")}} </h1>
                                        <!-- <input type="hidden" id="token_imp" name="_token" value="{{ csrf_token() }}" /> -->
                                        <form method="POST" id="form" action="/vendor/register">
                                            @csrf
                                            <input type="hidden" id="name" name="name" >
                                            <input type="hidden" id="username" name="username" >
                                            <input type="hidden" id="email" name="email" >
                                            <input type="hidden" id="password" name="password" >
                                            <input type="hidden" id="role" name="role">
                                            <input type="hidden" id="birthdate" name="birthdate">
                                            <input type="hidden" id="id_number" name="id_number">
                                            <input type="hidden" id="vendor" name="vendor" >
                                            <input type="hidden" id="vendor_type" name="vendor_type" >
                                            <input type="hidden" id="phone_number" name="phone_number" >
                                            <input type="hidden" id="Subscription_plan" name="Subscription_plan" >
                                            
                                        </form>
                                        
                                        <div class="payment_btn visa_payment">
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                                                <path fill="#1565C0" d="M45,35c0,2.209-1.791,4-4,4H7c-2.209,0-4-1.791-4-4V13c0-2.209,1.791-4,4-4h34c2.209,0,4,1.791,4,4V35z"></path><path fill="#FFF" d="M15.186 19l-2.626 7.832c0 0-.667-3.313-.733-3.729-1.495-3.411-3.701-3.221-3.701-3.221L10.726 30v-.002h3.161L18.258 19H15.186zM17.689 30L20.56 30 22.296 19 19.389 19zM38.008 19h-3.021l-4.71 11h2.852l.588-1.571h3.596L37.619 30h2.613L38.008 19zM34.513 26.328l1.563-4.157.818 4.157H34.513zM26.369 22.206c0-.606.498-1.057 1.926-1.057.928 0 1.991.674 1.991.674l.466-2.309c0 0-1.358-.515-2.691-.515-3.019 0-4.576 1.444-4.576 3.272 0 3.306 3.979 2.853 3.979 4.551 0 .291-.231.964-1.888.964-1.662 0-2.759-.609-2.759-.609l-.495 2.216c0 0 1.063.606 3.117.606 2.059 0 4.915-1.54 4.915-3.752C30.354 23.586 26.369 23.394 26.369 22.206z"></path><path fill="#FFC107" d="M12.212,24.945l-0.966-4.748c0,0-0.437-1.029-1.573-1.029c-1.136,0-4.44,0-4.44,0S10.894,20.84,12.212,24.945z"></path>
                                            </svg> --}}
                                            <svg height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                    viewBox="0 0 512 512" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path style="fill:#5D647F;" d="M472,72H40C17.945,72,0,89.945,0,112v288c0,22.055,17.945,40,40,40h432c22.055,0,40-17.945,40-40
                                                            V112C512,89.945,494.055,72,472,72z"/>
                                                    </g>
                                                    <g>
                                                        <path style="fill:#FFD100;" d="M176,232H80c-8.837,0-16-7.163-16-16v-64c0-8.837,7.163-16,16-16h96c8.837,0,16,7.163,16,16v64
                                                            C192,224.837,184.837,232,176,232z"/>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path style="fill:#B8BAC0;" d="M120,336H80c-8.837,0-16-7.163-16-16v-8c0-8.837,7.163-16,16-16h40c8.837,0,16,7.163,16,16v8
                                                                C136,328.837,128.837,336,120,336z"/>
                                                        </g>
                                                        <g>
                                                            <path style="fill:#B8BAC0;" d="M224,336h-40c-8.837,0-16-7.163-16-16v-8c0-8.837,7.163-16,16-16h40c8.837,0,16,7.163,16,16v8
                                                                C240,328.837,232.837,336,224,336z"/>
                                                        </g>
                                                        <g>
                                                            <path style="fill:#B8BAC0;" d="M328,336h-40c-8.837,0-16-7.163-16-16v-8c0-8.837,7.163-16,16-16h40c8.837,0,16,7.163,16,16v8
                                                                C344,328.837,336.837,336,328,336z"/>
                                                        </g>
                                                        <g>
                                                            <path style="fill:#B8BAC0;" d="M432,336h-40c-8.837,0-16-7.163-16-16v-8c0-8.837,7.163-16,16-16h40c8.837,0,16,7.163,16,16v8
                                                                C448,328.837,440.837,336,432,336z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path style="fill:#8A8895;" d="M232,384H72c-4.422,0-8-3.582-8-8s3.578-8,8-8h160c4.422,0,8,3.582,8,8S236.422,384,232,384z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path style="fill:#8A8895;" d="M336,384h-72c-4.422,0-8-3.582-8-8s3.578-8,8-8h72c4.422,0,8,3.582,8,8S340.422,384,336,384z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <path style="fill:#FF4F19;" d="M368,216.002C359.211,225.821,346.439,232,332.224,232c-26.51,0-48-21.49-48-48s21.49-48,48-48
                                                            c14.213,0,26.983,6.177,35.772,15.993"/>
                                                    </g>
                                                    <g>
                                                        <polygon style="fill:#FF9500;" points="192,192 112,192 112,176 192,176 192,160 112,160 112,136 96,136 96,232 112,232 112,208 
                                                            192,208 		"/>
                                                    </g>
                                                    <g>
                                                        <circle style="fill:#FFD100;" cx="400" cy="184" r="48"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <div>{{ __("translation.Credit card")}} </div> 
                                        </div>

                                        <div class="payment_btn stc_payment">
                                            <svg
                                                version="1.1"
                                                id="Layer_1"
                                                x="0px"
                                                y="0px"
                                                viewBox="0 0 552.09998 275.79999"
                                                xml:space="preserve"
                                                sodipodi:docname="STC-01.svg"
                                                width="552.09998"
                                                height="275.79999"
                                                inkscape:version="1.1 (c68e22c387, 2021-05-23)"
                                                xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                                xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:svg="http://www.w3.org/2000/svg"><defs
                                                id="defs25" /><sodipodi:namedview
                                                id="namedview23"
                                                pagecolor="#ffffff"
                                                bordercolor="#666666"
                                                borderopacity="1.0"
                                                inkscape:pageshadow="2"
                                                inkscape:pageopacity="0.0"
                                                inkscape:pagecheckerboard="0"
                                                showgrid="false"
                                                inkscape:zoom="0.773"
                                                inkscape:cx="276.19664"
                                                inkscape:cy="137.7749"
                                                inkscape:window-width="1920"
                                                inkscape:window-height="991"
                                                inkscape:window-x="-9"
                                                inkscape:window-y="-9"
                                                inkscape:window-maximized="1"
                                                inkscape:current-layer="Layer_1" />
                                                <style
                                                    type="text/css"
                                                    id="style18">
                                                    .st0{fill:white;}
                                                </style>
                                                <path
                                                class="st0"
                                                d="m 90.7,275.8 c 28.8,0 52.4,-9 67.9,-24.1 11.6,-11.6 18.5,-27.1 18.5,-45.1 0,-16.3 -6,-30.9 -17.2,-42.1 -11.2,-11.2 -27.1,-19.3 -47.3,-23.2 L 79.5,134.9 C 65.8,132.3 58,125.5 58,116 58,103.6 70,95 89.4,95 c 12,0 22.3,3.9 29.2,10.7 4.3,4.7 7.3,10.8 8.2,17.6 l 47.7,-10.7 C 173.2,98.9 166.8,86.8 156.9,76.9 141.4,61.4 117.4,51.6 89,51.6 c -26.2,0 -48.1,8.6 -63.2,22.3 -12.9,12 -20.2,28.4 -20.2,46.4 0,15.9 5.2,29.2 15.5,39.5 10.3,10.3 25.4,18 45.1,22.8 l 32.7,7.7 c 16.3,3.9 23.6,9.9 23.6,20.6 0,13.3 -12,21.1 -31.8,21.1 -14.2,0 -25.8,-4.7 -33.1,-12.5 -5.2,-5.2 -8.2,-12 -8.6,-19.8 L 0,210.4 c 1.3,14.6 8.2,27.5 18.5,37.8 16.4,17.3 42.6,27.6 72.2,27.6 m 362.6,0 c 31.8,0 56.3,-11.6 73,-27.9 13.3,-12.9 21.5,-27.9 25.8,-43.4 l -50.3,-16.8 c -2.1,7.7 -6.4,15.9 -13.3,22.3 -8.2,7.7 -19.3,13.3 -35.2,13.3 -14.6,0 -28.4,-5.6 -38.3,-15.5 -9.9,-10.3 -15.9,-25.4 -15.9,-44.3 0,-19.3 6,-33.9 15.9,-44.2 9.9,-9.9 23.2,-15 37.8,-15 15.5,0 26.2,5.2 33.9,12.9 6.4,6.5 10.3,14.6 12.9,22.8 l 51.1,-17.2 c -3.9,-15 -12,-30.1 -24.1,-42.5 -17.2,-16.8 -42.1,-28.8 -75.2,-28.8 -30.5,0 -58,11.6 -77.8,31.4 -19.5,20.2 -31.5,48.1 -31.5,80.8 0,32.7 12.5,60.6 32.6,80.8 19.8,19.7 47.7,31.3 78.6,31.3 m -173.5,0 c 22.3,0 38.2,-6.9 45.1,-12.9 v -46.4 c -5.2,3.9 -15.5,8.6 -28.8,8.6 -9.5,0 -16.3,-2.2 -21.5,-6.9 -4.3,-4.3 -6.4,-11.6 -6.4,-21.5 V 0 h -56.7 v 58 h 113.4 v 55 H 211.4 v 97.5 c 0,19.8 6,35.7 16.8,46.8 12,12.1 29.6,18.5 51.6,18.5"
                                                id="path20" />
                                            </svg>
                                            {{-- <div>STC</div>  --}}
                                        </div>

                                        <div class="payment_btn paypal_payment"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                                                <path fill="#1565C0" d="M18.7,13.767l0.005,0.002C18.809,13.326,19.187,13,19.66,13h13.472c0.017,0,0.034-0.007,0.051-0.006C32.896,8.215,28.887,6,25.35,6H11.878c-0.474,0-0.852,0.335-0.955,0.777l-0.005-0.002L5.029,33.813l0.013,0.001c-0.014,0.064-0.039,0.125-0.039,0.194c0,0.553,0.447,0.991,1,0.991h8.071L18.7,13.767z"></path><path fill="#039BE5" d="M33.183,12.994c0.053,0.876-0.005,1.829-0.229,2.882c-1.281,5.995-5.912,9.115-11.635,9.115c0,0-3.47,0-4.313,0c-0.521,0-0.767,0.306-0.88,0.54l-1.74,8.049l-0.305,1.429h-0.006l-1.263,5.796l0.013,0.001c-0.014,0.064-0.039,0.125-0.039,0.194c0,0.553,0.447,1,1,1h7.333l0.013-0.01c0.472-0.007,0.847-0.344,0.945-0.788l0.018-0.015l1.812-8.416c0,0,0.126-0.803,0.97-0.803s4.178,0,4.178,0c5.723,0,10.401-3.106,11.683-9.102C42.18,16.106,37.358,13.019,33.183,12.994z"></path><path fill="#283593" d="M19.66,13c-0.474,0-0.852,0.326-0.955,0.769L18.7,13.767l-2.575,11.765c0.113-0.234,0.359-0.54,0.88-0.54c0.844,0,4.235,0,4.235,0c5.723,0,10.432-3.12,11.713-9.115c0.225-1.053,0.282-2.006,0.229-2.882C33.166,12.993,33.148,13,33.132,13H19.66z"></path>
                                                </svg>
                                            {{-- <i class='bx bxl-paypal' ></i>  --}}
                                            <div>pay<span style="color: #039be5">pal</span></div>   
                                        </div>
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

                window.onload=()=>{
                    document.getElementById("name").value =localStorage.getItem("name")
                    document.getElementById("username").value =localStorage.getItem("username")
                    document.getElementById("email").value =localStorage.getItem("email")
                    document.getElementById("password").value =localStorage.getItem("password")
                    document.getElementById("role").value = "vendor"
                    document.getElementById("birthdate").value =localStorage.getItem("birthdate")
                    document.getElementById("id_number").value =localStorage.getItem("idnum")
                    document.getElementById("vendor").value =localStorage.getItem("vendor")
                    document.getElementById("vendor_type").value =localStorage.getItem("vendor_type")
                    document.getElementById("phone_number").value =localStorage.getItem("phone_num")
                    document.getElementById("Subscription_plan").value =localStorage.getItem("choosen_plan")
                }
                document.querySelectorAll(".payment_btn").forEach(e => {
                    e.addEventListener("click",(el)=>{
                        document.getElementById("form").submit()
                        // fetch('/register',{
                        //     method:"post",
                        //     headers: {
                        //     "Content-Type": "",
                        //     "X-CSRF-Token": document.getElementById("token_imp").value
                        //     },
                        //     body:{
                        //        name: localStorage.getItem("name"),
                        //        username: localStorage.getItem("username"),
                        //        email: localStorage.getItem("email"),
                        //        password: localStorage.getItem("password"),
                        //        role: "vendor",
                        //        birthdate: localStorage.getItem("birthdate"),
                        //        id_number: localStorage.getItem("idnum"),
                        //        vendor: localStorage.getItem("vendor"),
                        //        vendor_type: localStorage.getItem("vendor_type"),
                        //        phone_number: localStorage.getItem("phone_num"),
                        //        Subscription_plan: localStorage.getItem("choosen_plan"),
                        //     },
                        // })
                    })
                });

            </script>                   
</body>     
</html>