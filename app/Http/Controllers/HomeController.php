<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $check = Registration::where('user_id',Auth::user()->id)->first();
        $rnu=0;
        $status=0;
        $notice='Lorem ipsum doloro';
        if(is_null($check)){
            $rnu=intval(rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9));
            $check_rnu = Registration::where('registration_number',$rnu)->first();
            while(!is_null($check_rnu)){
                $rnu=intval(rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9));
                $check_rnu = Registration::where('registration_number',$rnu)->first();
            }
            $reg_no = new Registration;
            $reg_no->user_id = Auth::user()->id;
            $reg_no->registration_number = $rnu;
            $reg_no->save();

            $status = 0;    
        }
        else{
            $rnu=$check->registration_number;
            $status = $check->registration_status;
        }
        if($status==0){
            $notice = 'Please fill in your personal details first!';
        }
        elseif ($status==1) {
            $notice = 'Please upload your documents!';
        }
        elseif($status==2){
            $notice = 'Please select your choice of Exam Centre';
        }
        elseif($status==3){
            $notice = 'Please review your application and proceed for fee payment';
        }
        elseif($status==4){
            $notice = 'Please pay your registration fee to complete your registration';
        }
        elseif($status==5){
            $notice = 'Registration complete, awaiting payment confirmation';
        }
        elseif($status==6){
            $notice = 'Application Complete.';
        }
        else{
            $notice = 'Something went wrong!';
            $status=0;
        }
        return view('home',['registration_number'=>$rnu,'notice'=>$notice,'status'=>$status]);
    }
}
