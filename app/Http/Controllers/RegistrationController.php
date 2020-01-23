<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\PersonalDetail;
use App\Gender;
use App\Nationality;
use App\MaritalStatus;
use App\Community;
use App\Religion;
use App\State;
use App\Address;
use App\Document;
use App\Occupation;
use App\ExamCentre;
use App\UserExamCentre;
use App\User;
use App\Payment;
use Validator;
use Auth;
use Mail;

class RegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('register.status');
    }

    public function register($id){
    	$check = Registration::where('user_id',Auth::user()->id)->first();
    	$rnu=$check->registration_number;
    	$status = $check->registration_status;
    	if($id==1){
	    	$genders = Gender::all();
	    	$nationalities = Nationality::all();
	    	$marital_statuses = MaritalStatus::all();
	    	$communities = Community::all();
	    	$religions = Religion::all();
	    	$states = State::all();
	    	$pdata = PersonalDetail::where('user_id',Auth::user()->id)->first();
            $occupations = Occupation::all();
    		$adata = Address::where('user_id',Auth::user()->id)->first();
    		return view('personalDetail',['registration_number'=>$rnu,'genders'=>$genders,'nationalities'=>$nationalities,'marital_statuses'=>$marital_statuses,'communities'=>$communities,'religions'=>$religions,'states'=>$states,'status'=>$status,'address_data'=>$adata,'personal_data'=>$pdata,'occupations'=>$occupations]);
    	}
    	elseif($id==2) {
            $pdata = PersonalDetail::where('user_id',Auth::user()->id)->first();
    		$documents = Document::where('user_id',Auth::user()->id)->get();
    		return view('document',['registration_number'=>$rnu,'status'=>$status,'documents'=>$documents,'community'=>$pdata->community_id]);	
    	}
    	elseif($id==3){
            $cities = ExamCentre::all();
            $city1=$city2=$city3=$city4='';
            $udata=UserExamCentre::where('user_id',Auth::user()->id)->orderBy('preference','asc')->get();
            if(!$udata->isEmpty()){
                foreach ($udata as $data) {
                    if($data->preference==1){
                        $city1=$data->exam_centre_id;
                    }
                    if($data->preference==2){
                        $city2=$data->exam_centre_id;
                    }
                    if($data->preference==3){
                        $city3=$data->exam_centre_id;
                    }
                    if($data->preference==4){
                        $city4=$data->exam_centre_id;
                    }
                }
            }
    		return view('examCentre',['registration_number'=>$rnu,'status'=>$status,'cities'=>$cities,'user_choices'=>$udata,'city1'=>$city1,'city2'=>$city2,'city3'=>$city3,'city4'=>$city4]);
    	}
    	elseif($id==4){
            $user = User::find(Auth::user()->id);
            $pdata = PersonalDetail::find($user->personal_details->id);
            $address = $user->address;
    		return view('verification',['registration_number'=>$rnu,'status'=>$status,'pdata'=>$pdata,'address'=>$address,'user'=>$user]);
    	}
    	elseif($id==5){
            $user = User::find(Auth::user()->id);
            $pdata = PersonalDetail::find($user->personal_details->id);
            $payment_status = $user->payment;
            if(!is_null($payment_status)){
                if($payment_status->status == 1){
                    $check = Registration::where('user_id',Auth::user()->id)->update(['registration_status'=>6]);
                    return redirect('/home');
                }
            }
    		return view('payment',['registration_number'=>$rnu,'status'=>$status,'pdata'=>$pdata,'payment'=>$payment_status,'user'=>$user]);
    	}
    	else{
    		return redirect('/home');
    	}
    }

    public function post_register(Request $request,$id){
    	$check = Registration::where('user_id',Auth::user()->id)->first();
    	$rnu=$check->registration_number;
    	try{
    		if($id==1){
    			$validator = $request->validate([
		            'name' => 'required|string|max:255',
		            'gender' => 'required|integer|min:1|max:3',
		            'dob' => 'required|date',
		            'fname' => 'required|string|max:255',
		            'mname' => 'required|string|max:255',
		            'nationality' => 'required|integer|min:1|max:2',
		            'marital_status' => 'required|integer|min:1|max:4',
		            'community' => 'required|integer|min:1|max:5',
		            'religion' => 'required|integer|min:1|max:7',
		            'education' => 'required|string|max:255',
		            'line1' => 'required|string|max:255',
		            'line2' => 'max:255',
		            'line3' => 'max:255',
		            'city' => 'required|string|max:255',
		            'state' => 'required|integer|min:1|max:37',
		            'pin' => 'required|string|min:6|max:6',
		            'phone' => 'required|string|max:10|min:10',
		            'alternate_email' => 'required|email|max:255',
                    'occupation' => 'required|min:1|max:4',
		        ]);

                $pdata = PersonalDetail::where('user_id',Auth::user()->id)->first();
                if(is_null($pdata)){
                    $record = new PersonalDetail;
                    $record->name = $request->name;
                    $record->father_name = $request->fname;
                    $record->mother_name = $request->mname;
                    $record->dob = $request->dob;
                    $record->alternate_email = $request->alternate_email;
                    $record->education_qualification = $request->education;
                    $record->phone = $request->phone;
                    $record->user_id = Auth::user()->id;
                    $record->nationality_id = $request->nationality;
                    $record->gender_id = $request->gender;
                    $record->marital_status_id = $request->marital_status;
                    $record->community_id = $request->community;
                    $record->religion_id = $request->religion;
                    $record->occupation_id = $request->occupation;
                    $record->save();

                    $address = new Address;
                    $address->user_id = Auth::user()->id;
                    $address->line1 = $request->line1;
                    if($request->line2){
                        $address->line2 = $request->line2;
                    }
                    else{
                        $address->line2 = '';
                    }
                    if($request->line3){
                        $address->line3 = $request->line3;
                    }
                    else{
                        $address->line3 = '';
                    }
                    $address->city = $request->city;
                    $address->state_id = $request->state;
                    $address->pincode = $request->pin;
                    $address->save();

                    if($record && $address){
                        $check = Registration::where('user_id',Auth::user()->id)->update(['registration_status'=>1]);
                        return redirect('/registration/2');
                    }
                    else{
                        return redirect()->back()->withErrors(['Error', 'Internal Server Error 500.']);
                    }
                }
                else{
                    PersonalDetail::where('id',$pdata->id)->update([
                        'name' => $request->name,
                        'father_name' => $request->fname,
                        'mother_name' => $request->mname,
                        'dob' => $request->dob,
                        'alternate_email' => $request->alternate_email,
                        'education_qualification' => $request->education,
                        'phone' => $request->phone,
                        'user_id' => Auth::user()->id,
                        'nationality_id' => $request->nationality,
                        'gender_id' => $request->gender,
                        'marital_status_id' => $request->marital_status,
                        'community_id' => $request->community,
                        'religion_id' => $request->religion,
                        'occupation_id' => $request->occupation,
                    ]);

                    Address::where('user_id',Auth::user()->id)->update([
                        'user_id' => Auth::user()->id,
                        'line1' => $request->line1,
                        'line2' => $request->line2,
                        'line3' => $request->line3,
                        'city' => $request->city,
                        'state_id' => $request->state,
                        'pincode' => $request->pin,
                    ]);

                    return redirect('/registration/2');
                }

    			

    		}
    		elseif($id==2){
                $pdata = PersonalDetail::where('user_id',Auth::user()->id)->first();
                $documents = Document::where('user_id',Auth::user()->id)->get();
                $c=0;
                if($pdata->community_id > 1){
                    foreach ($documents as $document) {
                        $c = $c+$document->document_type_id;
                    }
                    if($c==15){
                        $check = Registration::where('user_id',Auth::user()->id)->update(['registration_status'=>2]);
                        return redirect('/registration/3');
                    }
                }
                else{
                    foreach ($documents as $document) {
                        $c = $c+$document->document_type_id;
                    }
                    if($c==10){
                        $check = Registration::where('user_id',Auth::user()->id)->update(['registration_status'=>2]);
                        return redirect('/registration/3');
                    }
                }
                return redirect()->back()->withErrors(['All required documents not uploaded.']);
    		}
            elseif($id==3){
                $udata = UserExamCentre::where('user_id',Auth::user()->id)->orderBy('preference','asc')->get();
                $validator = $request->validate([
                    'city1' => 'required|integer|min:1|max:30',
                    'city2' => 'required|integer|min:1|max:30',
                    'city3' => 'required|integer|min:1|max:30',
                    'city4' => 'required|integer|min:1|max:30',
                ]);
                $count = array_unique([$request->city1,$request->city2,$request->city3,$request->city4]);

                if(count($count)==4){
                    if($udata->isEmpty()){
                        $choice1 = new UserExamCentre;
                        $choice1->user_id = Auth::user()->id;
                        $choice1->exam_centre_id = $request->city1;
                        $choice1->preference = 1;
                        $choice1->save();

                        $choice2 = new UserExamCentre;
                        $choice2->user_id = Auth::user()->id;
                        $choice2->exam_centre_id = $request->city2;
                        $choice2->preference = 2;
                        $choice2->save();

                        $choice3 = new UserExamCentre;
                        $choice3->user_id = Auth::user()->id;
                        $choice3->exam_centre_id = $request->city3;
                        $choice3->preference = 3;
                        $choice3->save();

                        $choice4 = new UserExamCentre;
                        $choice4->user_id = Auth::user()->id;
                        $choice4->exam_centre_id = $request->city4;
                        $choice4->preference = 4;
                        $choice4->save();
                    }
                    else{
                        UserExamCentre::where('user_id',Auth::user()->id)->where('preference',1)->update(['exam_centre_id'=>$request->city1]);
                        UserExamCentre::where('user_id',Auth::user()->id)->where('preference',2)->update(['exam_centre_id'=>$request->city2]);
                        UserExamCentre::where('user_id',Auth::user()->id)->where('preference',3)->update(['exam_centre_id'=>$request->city3]);
                        UserExamCentre::where('user_id',Auth::user()->id)->where('preference',4)->update(['exam_centre_id'=>$request->city4]);
                    }
                    $check = Registration::where('user_id',Auth::user()->id)->update(['registration_status'=>3]);
                        return redirect('/registration/4');
                }
                else{
                    return redirect()->back()->withErrors(['All Exam Centres need to be different.'])->withInput($request->input());
                }
            }
    		elseif($id==4){
                $validator = $request->validate([
                    'verify_check' => 'required|integer|min:1|max:1',
                ]);
                if($request->verify_check == 1){
                    $check = Registration::where('user_id',Auth::user()->id)->update(['registration_status'=>4]);
                        return redirect('/registration/5');
                }
                else{
                    return redirect()->back()->withErrors(['Verification checkbox not checked.']);
                }
    		}
            elseif($id==5){
                $user = User::find(Auth::user()->id);
                $amount = 300;
                $pdata = PersonalDetail::find($user->personal_details->id);
                $validator = $request->validate([
                    'payment_mode' => 'required|integer|min:1|max:5',
                ]);
                if($pdata->community->id == 1){
                    $amount = 300;
                }
                elseif($pdata->community->id == 2){
                    $amount = 300;
                }
                elseif($pdata->community->id == 3){
                    $amount = 200;
                }
                else{
                    $amount = 150;
                }
                if($request->payment_mode == 2){
                    if(is_null($request->vpa)){
                        return redirect()->back()->withErrors(['UPI VPA empty']);
                    }
                    $add = new Payment;
                    $add->user_id = Auth::user()->id;
                    $add->mode = 'UPI';
                    $add->registration_number = $rnu;
                    $add->amount = $amount;
                    $add->vpa = $request->vpa;
                    $add->save();
                    $data = ['email'=>env('PAYMENT_REQUEST_MAIL'),'name'=>'Admin'];
                    $view_data = [
                        'name'=>Auth::user()->name,
                        'rnu'=>$rnu,
                        'amount'=>$amount,
                        'mode'=>'UPI',
                        'vpa'=>$request->vpa,
                    ];
                    Mail::send(['html'=>'email.payment_request'],$view_data, function ($m) use ($data){
                        $m->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                        $m->to(env('PAYMENT_REQUEST_MAIL'), 'Admin')->subject('Payment Request');
                    });
                }
                if($request->payment_mode == 3){
                    $add = new Payment;
                    $add->user_id = Auth::user()->id;
                    $add->mode = 'Challan';
                    $add->registration_number = $rnu;
                    $add->amount = $amount;
                    $add->save();


                }
                if($request->payment_mode == 4){
                    if(is_null($request->paytm)){
                        return redirect()->back()->withErrors(['Paytm Phone number empty']);
                    }
                    $add = new Payment;
                    $add->user_id = Auth::user()->id;
                    $add->mode = 'Paytm UPI';
                    $add->registration_number = $rnu;
                    $add->amount = $amount;
                    $add->vpa = $request->paytm;
                    $add->save();
                    $data = ['email'=>env('PAYMENT_REQUEST_MAIL'),'name'=>'Admin'];
                    $view_data = [
                        'name'=>Auth::user()->name,
                        'rnu'=>$rnu,
                        'amount'=>$amount,
                        'mode'=>'Paytm UPI',
                        'vpa'=>$request->paytm,
                    ];
                    Mail::send(['html'=>'email.payment_request'],$view_data, function ($m) use ($data){
                        $m->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                        $m->to(env('PAYMENT_REQUEST_MAIL'), 'Admin')->subject('Payment Request');
                    });
                }
                if($request->payment_mode == 5){
                    if(is_null($request->phonepe)){
                        return redirect()->back()->withErrors(['PhonePe Phone number empty']);
                    }
                    $add = new Payment;
                    $add->user_id = Auth::user()->id;
                    $add->mode = 'PhonePe UPI';
                    $add->registration_number = $rnu;
                    $add->amount = $amount;
                    $add->vpa = $request->phonepe;
                    $add->save();
                    $data = ['email'=>env('PAYMENT_REQUEST_MAIL'),'name'=>'Admin'];
                    $view_data = [
                        'name'=>Auth::user()->name,
                        'rnu'=>$rnu,
                        'amount'=>$amount,
                        'mode'=>'PhonePe UPI',
                        'vpa'=>$request->phonePe,
                    ];
                    Mail::send(['html'=>'email.payment_request'],$view_data, function ($m) use ($data){
                        $m->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                        $m->to(env('PAYMENT_REQUEST_MAIL'), 'Admin')->subject('Payment Request');
                    });
                }
                $check = Registration::where('user_id',Auth::user()->id)->update(['registration_status'=>5]);
                return redirect('/registration/5');
            }
            else{

            }
    	}
    	catch(Exception $e){

    	}
    }

    public function download_challan($id){
        $user = User::find(Auth::user()->id);
        $amount = 300;
        $pdata = PersonalDetail::find($user->personal_details->id);
        $check = Registration::where('user_id',Auth::user()->id)->first();
        $rnu=$check->registration_number;
        if($pdata->community->id == 1){
            $amount = 300;
        }
        elseif($pdata->community->id == 2){
            $amount = 300;
        }
        elseif($pdata->community->id == 3){
            $amount = 200;
        }
        else{
            $amount = 150;
        }
        if($id==5){
            $pdf = \PDF::loadView('pdf.challan',['pdata'=>$pdata,'registration_number'=>$rnu,'amount'=>$amount]);
            return $pdf->download('challan.pdf');
        }
    }

    public function check($id){
        $user = User::find(Auth::user()->id);
        $payment = $user->payment;
        $address = $user->address;
        $amount = 300;
        $pdata = PersonalDetail::find($user->personal_details->id);
        $check = Registration::where('user_id',Auth::user()->id)->first();
        $rnu=$check->registration_number;
        if($pdata->community->id == 1){
            $amount = 300;
        }
        elseif($pdata->community->id == 2){
            $amount = 300;
        }
        elseif($pdata->community->id == 3){
            $amount = 200;
        }
        else{
            $amount = 150;
        }
        return view('pdf.application',['pdata'=>$pdata,'registration_number'=>$rnu,'amount'=>$amount,'address'=>$address,'user'=>$user,'payment'=>$payment]);
    }

    public function change_payment(Request $request,$id){
        $user = User::find(Auth::user()->id);
        $check = Registration::where('user_id',Auth::user()->id)->first();
        $rnu=$check->registration_number;
        $payment = $user->payment;
        if($payment){
            Payment::where('id',$payment->id)->delete();
            $check = Registration::where('user_id',Auth::user()->id)->update(['registration_status'=>4]);
        }
        return redirect('/registration/5');

    }

    public function download_application($id){
        $user = User::find(Auth::user()->id);
        $payment = $user->payment;
        $address = $user->address;
        $amount = 300;
        $pdata = PersonalDetail::find($user->personal_details->id);
        $check = Registration::where('user_id',Auth::user()->id)->first();
        $rnu=$check->registration_number;
        if($pdata->community->id == 1){
            $amount = 300;
        }
        elseif($pdata->community->id == 2){
            $amount = 300;
        }
        elseif($pdata->community->id == 3){
            $amount = 200;
        }
        else{
            $amount = 150;
        }
        $pdf = \PDF::loadView('pdf.application',['pdata'=>$pdata,'registration_number'=>$rnu,'amount'=>$amount,'address'=>$address,'user'=>$user,'payment'=>$payment]);
        return $pdf->download('application.pdf');
    }

}
