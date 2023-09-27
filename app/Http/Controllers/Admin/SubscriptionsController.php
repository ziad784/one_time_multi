<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription_plans;
use App\Models\Vendor;
use Illuminate\Http\Request;
// Auth without a namespace here works fine because the Admin.php model extends Authenticatable
use Illuminate\Support\FacadesAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Symfony\Component\VarDumper\VarDumper;

class SubscriptionsController extends Controller{

    public function index(){

        if ( \Illuminate\Support\Facades\Auth::guard('admin')->check()) { // If the user making the incoming HTTP request is not authenticated, redirect to login page    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
            
            if(\Illuminate\Support\Facades\Auth::guard('admin')->user()->type == "superadmin"){

    Session::put('page', 'subscriptions');


                return view("admin.subscriptions.subscriptions",["subscriptions"=>Subscription_plans::all()]);
            }else{
                return redirect("/admin/login");
            }

        }else{
            return redirect("/admin/login");
        }

     
    }


    public function delete($id) { 
        \App\Models\Subscription_plans::where('id', $id)->delete();
        
        $message = 'Subscription_plan has been deleted successfully!';
        
        return redirect()->back()->with('success_message', $message);
    }

    public function addEdit(Request $request, $id = null) { // If the $id is not passed, this means Add a Section, if not, this means Edit the Section    
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'subscriptions');

      

        if ($id == '') { // if there's no $id is passed in the route/URL parameters, this means Add a new section
            $title = 'Add subscription';
            $section = new \App\Models\Subscription_plans();
            // dd($section);
            $message = 'subscription added successfully!';
        } else { // if the $id is passed in the route/URL parameters, this means Edit the Section
            $title = 'Edit subscription';
            $section = \App\Models\Subscription_plans::find($id);
            // dd($section);
            $message = 'subscription updated successfully!';
        }

        if ($request->isMethod('post')) { // WHETHER Add or Update <form> submission!!
            $data = $request->all();
            // dd($data);
           
            // Laravel's Validation    // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    
            $rules = [
                'plan_name' => 'required', // only alphabetical characters and spaces
                'price' => 'required', 
                'description' => 'required', 
          
          
            ];

            $customMessages = [ // Specifying A Custom Message For A Given Attribute: https://laravel.com/docs/9.x/validation#specifying-a-custom-message-for-a-given-attribute
                'section_name.required' => 'Section Name is required',
                'section_name.regex'    => 'Valid Section Name is required',
            ];

            $this->validate($request, $rules, $customMessages);

            
            // Saving inserted/updated data    // Inserting & Updating Models: https://laravel.com/docs/9.x/eloquent#inserts AND https://laravel.com/docs/9.x/eloquent#updates
            $section->plan_name   = $data['plan_name']; // WHETHER ADDING or UPDATING
            $section->price   = $data['price']; // WHETHER ADDING or UPDATING
            $section->description   = $data['description']; // WHETHER ADDING or UPDATING
            // $section->status = 1;  // WHETHER ADDING or UPDATING
            $section->save(); // Save all data in the database


            return redirect('admin/subscriptions')->with('success_message', $message);
        }


        return view('admin.subscriptions.add_edit_subscription')->with(compact('title', 'section'));
    }




}