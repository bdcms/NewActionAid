<?php

//for crudbooster sending email using email template...
	$user = CRUDBooster::first(config('crudbooster.USER_TABLE'), ['email' => g('email')]);
    $user->password = $rand_string;
    CRUDBooster::sendEmail(['to' => $user->email, 'data' => $user, 'template' => 'forgot_password_backend']);

//make password
    $rand_string = str_random(5);
    $password = \Hash::make($rand_string);

//using condition by url
    $url = url()->current();
    $ss = explode('/',$url); 
    $s = array_search("users",$ss); 
    if($ss[$s] == 'users'){ 
        $notEdit = "style = display:none;";
    }else{
        $notEdit = '';
    }


//mail send using laravel
    //view
        $teacher = DB::table('cms_users')->where('id',$request->id)->first(); 
        Mail::to($teacher->email)->send(new contactMail($request->name,$request->email,$request->contact_num,$request->body));
        return Redirect("/Profile/$id")->with('success','your message has been send. Thank you.'); 
    //mail
        class contactMail extends Mailable{
            use Queueable, SerializesModels;  
            public $name;
            public $number;
            public $email;
            public $body; 
            public function __construct($name,$email,$number,$body){
                $this->name = $name;
                $this->email = $email;
                $this->number = $number;
                $this->body = $body;
            } 
            public function build(){
                return $this->from($this->email)->view('pages.mail.teacherContact')->subject('NWU Contact Msg');
            }
        }
    //template
        <!DOCTYPE html>
            <html>
            <head>
                <title>mail</title>
            </head>
            <body>
                <h1>Laravel Email</h1>

                <p>name: {{ $name }}</p> 
                <p>phone: {{ $number }}</p>

                <p>body: {{ $body }}</p>

            </body>
            </html>    
    
//finding select query
    $row = CRUDBooster::first($this->table,$id);

//join query
    $data['row'] = DB::table('ai_activity_report')
            ->join('ai_activities', 'ai_activities.id', '=', 'ai_activity_report.act_id') 
            ->join('cms_users', 'cms_users.id', '=', 'ai_activity_report.user_id') 
            ->where('ai_activity_report.id',$id)->first(); 

//Notification send
    \CRUDBooster::sendNotification($config=[
                'content'   => 'Your concept note is rejected!...',
                'to'        => url('admin/ai_concept_note/detail/'.$request->id),
                'id_cms_users'  => [$request->userId],
            ]);
    
?>