<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\GmailDemo;

class GmailController extends Controller
{
    
    public function home(){
        return view('emails.home');
    }

    public function Send(Request $request){
        $this->validate($request, [
            'fullname'  =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
           ]);

           $data = array(
            'fullname'      =>  $request->fullname,
            'message'   =>   $request->message,
            'email'  =>  $request->email
          );
  
          Mail::to('hello2@example.com')->send(new GmailDemo($data));
          return back()->with('success', 'Gmail Send Successfully!!');
        
    }
}
