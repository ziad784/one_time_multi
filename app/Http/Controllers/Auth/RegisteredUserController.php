<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\notifications;
use App\Models\User;
use App\Notifications\RegisteredNewVendor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Subscription_plans;
use App\Models\Vendor;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
     
       
        return view('auth.register');
    }
    public function step2(): View
    {
        return view('auth.register.register_step2');
    }
    public function step3(): View
    {
        $plans = Subscription_plans::all();
        
        return view('auth.register.register_step3',[
            'plans'=> $plans
        ]);
    }
    public function step4(): View
    {
        
        return view('auth.register.register_step4');
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

     public function validation(Request $request)
     {
    

        $email = $request ->json("email");
        $password = $request ->json("password");
        // $username = $request ->json("username");

        $name = $request ->json("name");
        $id_number = $request ->json("id_number");
        $phone_number = $request ->json("phone_number");
        $birthdate = $request ->json("birthdate");
        $vendor = $request ->json("vendor");
        $vendor_type = $request ->json("vendor_type");


        if(isset($email)){
            $userEmail = Vendor::where("email",$email)->get();
            // $username = User::where("username",$username)->get();

         
   
            
            if( count($userEmail) == 0){
  
             
                    if(strlen($password)>= 8){
                        return response()->json(['messsage' => "step completeed","status"=>200]);
                    }else{
                        return response()->json(['messsage' => "password is very short","status"=>400]);
                    }
              
   
               
   
            }else{
               return response()->json(['messsage' => "email already in use","status"=>400]);
            }
        }
        if(isset($name)){
            if(strlen($name)>0){
                if(strlen($id_number)>0){
                    if(strlen($phone_number)>0){
                        if(strlen($birthdate)>0){
                            if(strlen($vendor_type)>0){
                                return response()->json(['messsage' => "step done","status"=>400]);
                            }else{
                                return response()->json(['messsage' => "برجاء ادخال حرفه التاجر","status"=>400]);
                            }
                        }else{
                            return response()->json(['messsage' => "برجاء ادخال تاريخ الميلاد","status"=>400]);
                        }
                    }else{
                        return response()->json(['messsage' => "برجاء ادخال رقم الهاتف","status"=>400]);
                    }
                }else{
                    return response()->json(['messsage' => "برجاء ادخال رقم الهويه","status"=>400]);
                }
            }else{
                return response()->json(['messsage' => "برجاء ادخال الاسم","status"=>400]);
            }
        }


       



        
     }



     public function wating(){


        if ( \Illuminate\Support\Facades\Auth::guard('admin')->check()) { // If the user making the incoming HTTP request is not authenticated, redirect to login page    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
            
            if(\Illuminate\Support\Facades\Auth::guard('admin')->user()->status == '0'){
                return view('/auth/waiting');
            }else{
                return redirect("/admin/dashboard");
            }
        
          
        }else{
            return redirect("/admin/login");
        }


     }

     public function markread(){


        if ( \Illuminate\Support\Facades\Auth::guard('admin')->check()) { // If the user making the incoming HTTP request is not authenticated, redirect to login page    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
            
         
            notifications::query()->update([
                'is_read' => 1,
                
            ]);


          
        }else{
            return redirect("/admin/login");
        }


     }


    public function store(Request $request): RedirectResponse
    {

        // dd($request->all());

        // $request->validate([
        //     // 'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'username' => ['required', 'string', 'max:100', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);



        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'birthdate'=> $request->birthdate,
            'id_number'=> $request->id_number,
            'vendor'=> $request->vendor,
            'vendor_type'=> $request->vendor_type,
            'phone_number'=> $request->phone_number,
            'subscription_id'=> $request->Subscription_plan,
        ]);

        if ($request->role == 'vendor'){
            self::completeVendorRegistration($user);
        }

     

        event(new Registered($user));

        Auth::login($user);

        // notify the admin
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new RegisteredNewVendor());

        return redirect(RouteServiceProvider::HOME);
    }

    public static function completeVendorRegistration($user){
        DB::table('vendor_shop')->insert([
            'shop_description' => null,
            'shop_name' => null,
            'user_id' => $user->id
        ]);
    }
}
