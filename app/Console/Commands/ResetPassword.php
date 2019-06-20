<?php

namespace App\Console\Commands;

use App\User;
use Validator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:reset-password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset a users password';

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
            'email' => $this->ask('What is your email?'),
            'password' => $this->secret('What is the password?'),
            'password_confirmation' => $this->secret('Please confirm your password'),
        ];

        $validator = Validator::make($userAttributes, [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $this->error($errors->first());
            exit;
        }

        $user = User::whereEmail($userAttributes['email'])->firstOrFail();
        $user->password = Hash::make($userAttributes['password']);
        $user->save();

        $this->info("Successfully reset password for user {$user->name}.");
    }
}
