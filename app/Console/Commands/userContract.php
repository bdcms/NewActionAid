<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB; 
use App\Mail\userContractmail;
use Mail;
class userContract extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:userContract';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User Contract notify';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){ 
        $hord = DB::table('cms_users')->where('id_cms_privileges',6)->first(); 
        $hordemail =  $hord->email;
        $hordId =  $hord->id;

        $supperAdmin = DB::table('cms_users')->where('id_cms_privileges',1)->first(); 
        $adminemail =  $supperAdmin->email; 
        $adminId =  $supperAdmin->id; 

        $users = DB::table('cms_users')->get();
        //dd($users);
        $today = date_create(date("Y-m-d")); 
        foreach ($users as $user) {
            $expaired = date_create($user->date_expaire); 
            $dif = date_diff($today,$expaired);
            $diff = $dif->format('%R%a'); 
            DB::table('cms_users')->where('id',$user->id)->update(['contract_remaining'=>$diff]);
            if($diff == '+1'){ 
                $notifyHord = DB::table('cms_notifications')->insert([
                    'id_cms_users'  =>  $hordId,
                    'content'       =>  $user->name.'\'s contract will be expaire tomorrow.',
                    'url'           => url('/admin/users/detail/'.$user->id),
                    'is_read'       => 0,
                ]);
                $notifyAdmin = DB::table('cms_notifications')->insert([
                    'id_cms_users'  =>  $adminId,
                    'content'       =>  $user->name.'\'s contract will be expaire tomorrow.',
                    'url'           => url('/actionaid/public/admin/users/detail/'.$user->id),
                    'is_read'       => 0,
                ]);
                $notifyUser = DB::table('cms_notifications')->insert([
                    'id_cms_users'  =>  $user->id,
                    'content'       =>  'Your contract will be expaire tomorrow.',
                    'url'           => url('/actionaid/public/admin/users/detail/'.$user->id),
                    'is_read'       => 0,
                ]);

                Mail::to($user->email)->cc($hordemail)->send(new userContractmail($user->id));
            }
        } 
    }
}
