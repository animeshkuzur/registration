<?php

namespace App\Http\Middleware;

use Closure;
use App\Registration;
use Auth;

class RegistrationStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id=intval($request->id);
        if($id>0 && $id<6){
            $check = Registration::where('user_id',Auth::user()->id)->first();
            $status = intval($check->registration_status);
            if($status==6){
                return redirect('/home');
            }
            if($status>=4){
                if($id==4){
                    return $next($request);        
                }
                elseif($id==5){
                    return $next($request);
                }
                else{
                    return redirect('/home');
                }
            }
            if(($id-1)>$status){
                return redirect('/registration/'.strval($status+1));
            }
        }
        else{
            if($id==729347823948){
                return $next($request);
            }
            return redirect('/home');
        }
        return $next($request);
    }
}
