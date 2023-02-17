<?php

namespace App\Http\Controllers;
use App\Events\ThankYouEvent;
use Illuminate\Support\Facades\Mail;
use App\Models\newsletter;
use App\Models\feedback;
use Illuminate\Http\Request;
class websitecontroller extends Controller
{
    public function index()
    {
        return view('welcome');
    }  
      
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    
     public function subscribe(Request $request)
     {
         // saving data in
         $data=new newsletter;
         $validated = $request->validate([
            'email' =>  'required|email'
            ]);
         $data->email=$request['email'];
         $data->save();
         event(new ThankYouEvent($request->email));
         return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
     }

     public function masseges(Request $request)
     {
         // saving data in
         $data=new feedback;
         $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);
        
        $data->email = $request['email'];
        $data->name = $request['name'];
        $data->subject = $request['subject'];
        $data->message = $request['message'];

        $data->save();
        // event(new ThankYouEvent($request->email));
        $response = [
            'status' => 'success',
            'message' => 'Thank you for your feedback!'
        ];
        return response()->json($response);
        // return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
         } 


}
