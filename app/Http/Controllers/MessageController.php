<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Catagory;
use App\ProductType;
use App\Product;
use Mail;
use DB;
use App\Mail\SendMail;

class MessageController extends Controller
{
    public function SendMessage(Request $request){
        $this->validate($request,[
            'sender_name' => 'required',
            'sender_email' => 'required',
            'sender_subject' => 'required',
            'sender_message' => 'required'
        ]);
        
        $message = new Message();
        
        $message->sender_name = $request->sender_name;
        $message->sender_email = $request->sender_email;
        $message->sender_subject = $request->sender_subject;
        $message->sender_message = $request->sender_message;
        $message->status = $request->status;
        $message->reply = 'Pending';
        $message->save();
        
        
        
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $products = Product::all();
        
        return view('front-end.messageConfirmation',['catagories'=>$catagories,'productTypes'=>$productTypes,'products'=>$products]);
        
    }
    
    public function InboxMessage(){
        
        
        $messages = Message::all();
        foreach($messages as $msg)
        {
            $msg->status = 0;
            $msg->save();
        }
        $inbox = DB::table('messages')->orderBy('id','desc')->paginate(10);
        return view('admin.Message.InboxMessage',['inbox'=>$inbox]);
    }
    

    
    public function DeleteMessage($id){
        
        $msg = Message::find($id);
        $msg->delete();
        return view('admin.Message.InboxMessage');
    }
    
    public function ReplyMessage($id){
        $msg = Message::find($id);
        return view('admin.Message.ReplyMessage',['msg'=>$msg]);
    }
    
    
    public function SendReplyMessage(Request $request){
        $id = $request->id;
        $msg = Message::find($id);
        $msg->reply = $request->reply_message;
        $address = $msg->sender_email;
        $msg->save();
        
        
        $data = $msg->toArray();
        $data['message'] = null;
        Mail::to($address)->send(new SendMail($data));
        
        return redirect()->back()->with('message','Message Sent Successfully');
    }
    
    
    public function ComposeMessage(){
        return view('admin.Message.ComposeMessage');
    }
    
    public function SendComposeMessage(Request $request){
      
        $data = [];
        $data['receiver'] = $request->receiver;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        
        Mail::to( $data['receiver'])->send(new SendMail($data));
        
        return redirect('/compose-email')->with('message','Message Sent Successfully');
    }
    
}
