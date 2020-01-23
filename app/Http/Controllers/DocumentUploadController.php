<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\PersonalDetail;
use App\Document;
use Validator;
use Auth;

class DocumentUploadController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('register.status');
    }

    public function image(Request $request,$id){
    	$check = Registration::where('user_id',Auth::user()->id)->first();
    	$rnu=$check->registration_number;
    	try{
    		if($id==2){
    			$pdata = PersonalDetail::where('user_id',Auth::user()->id)->first();
                //$documents = Document::where('user_id',Auth::user()->id)->get();
                $validator = $request->validate([
                    'photo' => 'required|image|mimes:jpeg,png,jpg|max:300',
                ]);
                $path = public_path('/uploads');
                $file = $request->file('photo');
                $name = substr(hash('sha256', mt_rand() . microtime()), 0, 20).'.'.$file->getClientOriginalExtension();
                $file->move($path,$name);
                $dcheck = Document::where('user_id',Auth::user()->id)->where('document_type_id',1)->first();
                if(is_null($dcheck)){
                	$new_file = new Document;
                	$new_file->user_id = Auth::user()->id;
                	$new_file->document_type_id = 1;
                	$new_file->path = '/uploads/'.$name;
                	$new_file->save();
                }
                else{
                	$new_file = Document::where('user_id',Auth::user()->id)->where('document_type_id',1)->update(['path'=>'/uploads/'.$name]);
                }

                return redirect('/registration/2');
                

    		}
    	}
    	catch(Exception $e){

    	}
    }

    public function signature(Request $request,$id){
    	$check = Registration::where('user_id',Auth::user()->id)->first();
    	$rnu=$check->registration_number;
    	try{
    		if($id==2){
    			$pdata = PersonalDetail::where('user_id',Auth::user()->id)->first();
                //$documents = Document::where('user_id',Auth::user()->id)->get();
                $validator = $request->validate([
                    'signature' => 'required|image|mimes:jpeg,png,jpg|max:300',
                ]);
                $path = public_path('/uploads');
                $file = $request->file('signature');
                $name = substr(hash('sha256', mt_rand() . microtime()), 0, 20).'.'.$file->getClientOriginalExtension();
                $file->move($path,$name);
                $dcheck = Document::where('user_id',Auth::user()->id)->where('document_type_id',2)->first();
                if(is_null($dcheck)){
                	$new_file = new Document;
                	$new_file->user_id = Auth::user()->id;
                	$new_file->document_type_id = 2;
                	$new_file->path = '/uploads/'.$name;
                	$new_file->save();
                }
                else{
                	$new_file = Document::where('user_id',Auth::user()->id)->where('document_type_id',2)->update(['path'=>'/uploads/'.$name]);
                }

                return redirect('/registration/2');
    		}
    	}
    	catch(Exception $e){

    	}
    }

    public function marksheet_10(Request $request,$id){
    	$check = Registration::where('user_id',Auth::user()->id)->first();
    	$rnu=$check->registration_number;
    	try{
    		if($id==2){
    			$pdata = PersonalDetail::where('user_id',Auth::user()->id)->first();
                //$documents = Document::where('user_id',Auth::user()->id)->get();
                $validator = $request->validate([
                    '10th_mark_sheet' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                ]);
                $path = public_path('/uploads');
                $file = $request->file('10th_mark_sheet');
                $name = substr(hash('sha256', mt_rand() . microtime()), 0, 20).'.'.$file->getClientOriginalExtension();
                $file->move($path,$name);
                $dcheck = Document::where('user_id',Auth::user()->id)->where('document_type_id',3)->first();
                if(is_null($dcheck)){
                	$new_file = new Document;
                	$new_file->user_id = Auth::user()->id;
                	$new_file->document_type_id = 3;
                	$new_file->path = '/uploads/'.$name;
                	$new_file->save();
                }
                else{
                	$new_file = Document::where('user_id',Auth::user()->id)->where('document_type_id',3)->update(['path'=>'/uploads/'.$name]);
                }

                return redirect('/registration/2');
    		}
    	}
    	catch(Exception $e){

    	}
    }

    public function marksheet_12(Request $request,$id){
    	$check = Registration::where('user_id',Auth::user()->id)->first();
    	$rnu=$check->registration_number;
    	try{
    		if($id==2){
    			$pdata = PersonalDetail::where('user_id',Auth::user()->id)->first();
                //$documents = Document::where('user_id',Auth::user()->id)->get();
                $validator = $request->validate([
                    '12th_mark_sheet' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                ]);
                $path = public_path('/uploads');
                $file = $request->file('12th_mark_sheet');
                $name = substr(hash('sha256', mt_rand() . microtime()), 0, 20).'.'.$file->getClientOriginalExtension();
                $file->move($path,$name);
                $dcheck = Document::where('user_id',Auth::user()->id)->where('document_type_id',4)->first();
                if(is_null($dcheck)){
                	$new_file = new Document;
                	$new_file->user_id = Auth::user()->id;
                	$new_file->document_type_id = 4;
                	$new_file->path = '/uploads/'.$name;
                	$new_file->save();
                }
                else{
                	$new_file = Document::where('user_id',Auth::user()->id)->where('document_type_id',4)->update(['path'=>'/uploads/'.$name]);
                }

                return redirect('/registration/2');
    		}
    	}
    	catch(Exception $e){

    	}
    }

    public function community_cert(Request $request,$id){
    	$check = Registration::where('user_id',Auth::user()->id)->first();
    	$rnu=$check->registration_number;
    	try{
    		if($id==2){
    			$pdata = PersonalDetail::where('user_id',Auth::user()->id)->first();
                //$documents = Document::where('user_id',Auth::user()->id)->get();
                $validator = $request->validate([
                    'community_cert' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                ]);
                $path = public_path('/uploads');
                $file = $request->file('community_cert');
                $name = substr(hash('sha256', mt_rand() . microtime()), 0, 20).'.'.$file->getClientOriginalExtension();
                $file->move($path,$name);
                $dcheck = Document::where('user_id',Auth::user()->id)->where('document_type_id',5)->first();
                if(is_null($dcheck)){
                	$new_file = new Document;
                	$new_file->user_id = Auth::user()->id;
                	$new_file->document_type_id = 5;
                	$new_file->path = '/uploads/'.$name;
                	$new_file->save();
                }
                else{
                	$new_file = Document::where('user_id',Auth::user()->id)->where('document_type_id',5)->update(['path'=>'/uploads/'.$name]);
                }

                return redirect('/registration/2');
    		}
    	}
    	catch(Exception $e){

    	}
    }
}