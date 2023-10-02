<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ __("translation.Create new account")}}</title>
    @include('backend.includes.favicon')
    @include('backend.includes.css')
    <link rel="stylesheet" href="{{ asset('backend_assets/css/register.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
</head>
<body class="bg-login">
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
                                <center>
                                    <p>{{ __("translation.already have an account")}}? <a href="/admin/login">{{ __("translation.login here")}}</a>
                                </center>
                                <div class="border p-4 rounded">
                                    <form class="row g-3"  id="form">
                                            <div class="col-sm-12">
                                                <label for="inputName" class="form-label">{{ __("translation.Name")}}</label>
                                                <input name="name" type="text" class="form-control" id="inputName"
                                                    placeholder="{{ __("translation.Your name")}}" autocomplete="name" value="{{old('name')}}"
                                                    autofocus
                                                    required>
                                            
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="inputName" class="form-label">{{ __("translation.ID number")}}</label>
                                                <input name="name" type="number" class="form-control" id="idnum"
                                                    placeholder="{{ __("translation.ID number")}}" autocomplete="name" value="{{old('name')}}"
                                                    autofocus
                                                    required>
                                            
                                            </div>
                                            
                                            <div class="col-sm-12" style="display:flex;flex-direction: column;">
                                                <label for="inputName" class="form-label">{{ __("translation.Phone Number")}}</label>

                                           
                                                <input name="name" type="number" class="form-control" id="phone_num"
                                                    placeholder="{{ __("translation.Phone Number")}}" autocomplete="name" value="{{old('name')}}"
                                                    autofocus
                                                    required>
                                             
                                            
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="inputName" class="form-label"> {{ __("translation.Birthdate")}} </label>
                                                <input name="name" type="date" class="form-control" id="birthdate"
                                                    placeholder="{{ __("translation.Birthdate")}}" autocomplete="name" value="{{old('name')}}"
                                                    autofocus
                                                    required>
                                            
                                            </div>

                                         <div class="tabs_cont">
                                            <div id="degital_ven" onclick="swtich(1)" class="tab_switch active_tab"> {{ __("translation.E-Vendor")}} </div>
                                            <div id="scifi_ven" onclick="swtich(2)" class="tab_switch"> {{ __("translation.scientific Vendor")}} </div>
                                         </div>  

                                         <select class="type_select" id="select_degital" onchange="select_change()" required>
                                            <option value="" hidden selected disabled> {{ __("translation.Choose profession")}}</option>
                                            <option value="كن تاجر"> {{ __("translation.Vendor")}}</option>
                                            <option value="حرفي"> {{ __("translation.Craftsman")}}</option>
                                            <option value=" منتجات اخري "> {{ __("translation.Other")}}</option>
                                         </select>

                                         <select class="type_select hidden_selecet" id="other_stuff" >
                                            <option value="" hidden selected disabled> {{ __("translation.Choose profession")}}</option>
                                            <option value="قسم موضه رجالي"> {{ __("translation.Men's fashion section")}}</option>
                                            <option value=" قسم موضه حريمي"> {{ __("translation.WOmen's fashion section")}} </option>
                                            <option value="  قسم موضه اطفالي "> {{ __("translation.Kids's fashion section")}}</option>
                                         </select>

                                         <select class="type_select hidden_selecet" name="" id="select_scifi" >
                                            <option value="" hidden selected disabled> {{ __("translation.Choose profession")}}</option>
                                            <option value="اكاديمي">{{ __("translation.Academic")}}</option>
                                            <option value="مختبارات">{{ __("translation.Laboratories")}}</option>
                                         </select>
                                         <div class="d-grid" style="padding:unset">
                                                <button type="submit" id="sumbit_btn" class="btn btn-primary"> {{ __("translation.Continue")}}  </button>
                                                <!-- <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button> -->
                                         </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                     </div>
                 </div>
             </div>
         </div>
   </div>


   <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script>
  
  const input = document.querySelector("#phone_num");
const button = document.querySelector("#btn");
const errorMsg = document.querySelector("#error-msg");
const validMsg = document.querySelector("#valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialise plugin
const iti = window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
});

const reset = () => {
  input.classList.remove("error");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
};

// on click button: validate
button.addEventListener('click', () => {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
      validMsg.classList.remove("hide");
    } else {
      input.classList.add("error");
      const errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
    }
  }
});

// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);
</script>
   <script>

            window.onload=()=>{
                localStorage.setItem("vendor","تجاره الالكتروني")

            
                
                // if(localStorage.getItem("vendor_type")){
                //         // window.location.href= './register/register_step2.blade.php'
                //         window.location.href = "{{URL::to('register/step_4')}}"
                // }
            
            }
        function swtich(e){
            document.querySelectorAll(".tab_switch").forEach(el => {
                el.classList.remove("active_tab")
            });
            document.querySelectorAll(".type_select").forEach(el => {
                el.classList.add("hidden_selecet")
                el.removeAttribute('required');
            });



            if(e == 1){
                document.getElementById("degital_ven").classList.add("active_tab")
                document.getElementById("select_degital").classList.remove("hidden_selecet")
                select_change()
                localStorage.setItem("vendor","تجاره الالكتروني")
                document.getElementById("select_degital").setAttribute('required', '');
            }
            if(e == 2){
                document.getElementById("scifi_ven").classList.add("active_tab")
                document.getElementById("select_scifi").classList.remove("hidden_selecet")
                document.getElementById("select_scifi").setAttribute('required', '');
                localStorage.setItem("vendor","العلمي")
            }
        }

        function select_change() {
            console.log(document.getElementById("select_degital").value, );
          if(document.getElementById("select_degital").value == " منتجات اخري "){
                document.getElementById("other_stuff").classList.remove("hidden_selecet")
                document.getElementById("other_stuff").setAttribute('required', '');
          }else{
            document.getElementById("other_stuff").classList.add("hidden_selecet")
            document.getElementById("other_stuff").removeAttribute('required');
          }
        }


    document.getElementById("form").addEventListener('submit', function(e) {
        e.preventDefault();
        // document.getElementById("sumbit_btn").addEventListener("click",(e)=>{
            const select_scifi = document.getElementById("select_scifi")
            const select_degital = document.getElementById("select_degital")
            const other_stuff = document.getElementById("other_stuff")

            const name = document.getElementById("inputName").value
            const idnum = document.getElementById("idnum").value
            const phone_num = document.getElementById("phone_num").value
            const birthdate = document.getElementById("birthdate").value
            localStorage.setItem("name",name)
            localStorage.setItem("idnum",idnum)
            localStorage.setItem("phone_num",phone_num)
            localStorage.setItem("birthdate",birthdate)
            
            console.log(select_degital.value,!select_degital.value == " منتجات اخري ");
            if(select_degital.value == " منتجات اخري "){
                localStorage.setItem("vendor_type",other_stuff.value)
            }if(!select_scifi.classList.contains("hidden_selecet")){
                localStorage.setItem("vendor_type",select_scifi.value)
            }else if(other_stuff.classList.contains("hidden_selecet")) {
                localStorage.setItem("vendor_type",select_degital.value)
            }

            setTimeout(() => {
                console.log(localStorage.getItem("password"));
            if(localStorage.getItem("password")){
                // window.location.href= './register/register_step2.blade.php'
                window.location.href = "{{URL::to('admin/register/step_3')}}"
            }
            }, 1000);  
        //  })
        
    });
   </script>
</body>
</html>