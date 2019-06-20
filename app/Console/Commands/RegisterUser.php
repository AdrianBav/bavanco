<?php

namespace App\Console\Commands;

use App\User;
use Validator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class RegisterUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:register-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register a new user';

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
        $userAttributes = [
            'name' => $this->ask('What is your name?'),
            'email' => $this->ask('What is your email?'),
            'password' => $this->secret('What is the password?'),
            'password_confirmation' => $this->secret('Please confirm your password'),
        ];

        $validator = Validator::make($userAttributes, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $this->error($errors->first());
            exit;
        }

        User::create([
            'name' => $userAttributes['name'],
            'email' => $userAttributes['email'],
            'password' => Hash::make($userAttributes['password']),
        ]);

        $this->info("Successfully created user {$userAttributes['name']}.");
    }
}
