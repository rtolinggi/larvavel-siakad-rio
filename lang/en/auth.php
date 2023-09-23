<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Password or Email wrong',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'forgot_password' => [
        'title' => 'Forgot Password',
        'body' => 'We will send a link to reset your password'
    ],
    'verify_email' => [
        'title' => 'Verify Email',
        'body' => 'Thank you for registering! To proceed, please check your email.',
        'send' => 'New verification link sent, check your email!',
        'reset' => 'We have emailed your password reset link.',
    ],
    'send_email' => [
        'title' => "Let's confirm it's you!",
        'subject' => 'Verify Email Address',
        'first_line' => 'Thank you for signing up with :app. Please click below to confirm your account:',
        'action' => 'Verify Email',
        'description' => 'If you did not create an account, no further action is required.',
    ],
    'action' => [
        'login' => 'Login',
        'register' => 'Register',
        'logout' => 'Logout',
        'other_login' => 'Login with other account'
    ],
    'link' => [
        'forgot_password' => 'Forgot Password',
        'dont_have_account' => "Don't have an account?",
        'register' => 'Register',
    ],
    'field' => [
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'remember_me' => 'Remember Me',
    ],
    'confirmation' => [
        'logout' => [
            'title' => 'Are you sure you want to log out?',
            'text' => 'Closing the application..'
        ]
    ]
];
