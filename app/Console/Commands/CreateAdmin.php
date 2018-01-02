<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Larapack\CommandValidation\Validateable;

class CreateAdmin extends Command
{
	use Validateable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin user for portal';

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
    public function handle()
    {
        //
		$name = $this->validate(function() {
		  // Here we ask the question we want and return the output
		  // Any method returning a value from the command line input can be used here.
		  return $this->ask('What is your name?', null);
		}, function($value) {
		  // Here we validate the value
		  // If the value is NOT valid, we should return a error message.
		  // If the value is valid, we don't need to return anything.
		  // NOTE: Returning true will also be valid.
		  if (empty(trim($value))) return "name [{$value}] is not correct.";
		});
		
		$email = $this->validate(function() {
		  return $this->ask('What is your Email?', null);
		}, function($value) {
		  if (!filter_var($value, FILTER_VALIDATE_EMAIL)) return "Email [{$value}] is not Valid.";
		});
		
		$password = $this->validate(function() {
		  return $this->secret('What is your Password?', null);
		}, function($value) {
		   if (empty(trim($value))) return "password [{$value}] is not correct.";
		});
		
		$cpassword = $this->validate(function() use($password) {
		  return $this->secret('Confirm your Password?', null);
		}, function($value) use($password) {
		   if ($password != $value) return "wrong password.";
		});
		try{
			$group = \App\Group::firstOrCreate(['id'=>1,'name' => 'admin','description'=>'admin User']);
			$user = new \App\User;
			$user->name = $name;
			$user->email = $email;
			$user->password = \Hash::make($password);
			$user->group_id = $group->id;
			$user->confirmed = 1;
			$user->phone = '';
			$user->save();
			$this->info('Admin : '.$name.' created successfully');
		}catch(\Exception $e){
			$this->error('Something went wrong!');
		}
    }
}
