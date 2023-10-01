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
    'failed_change_password' => 'Current Password not match',
    'success_change_password' => 'Password success updated',
    'not_match_change_password' => 'The provided password does not match your current password.',
    'success_cahange_profile' => 'Profile success updated',
    'password' => 'The provided password is incorrect.',
    'password_confirmation_title' => 'Password Confirmation',
    'password_confirmation_body' => 'To continue two-factor authentication, please enter your password',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'forgot_password' => [
        'title' => 'Forgot Password',
        'body' => 'We will send a link to reset your password'
    ],
    'verify_email' => [
        'title' => 'Verify Email',
        'body' => 'To proceed, please check your email.',
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
        'current_password' => 'Current Password',
        'new_password' => 'New Password',
        'remember_me' => 'Remember Me',
        'address' => 'Address',
        'phone' => 'Phone',
        'roles' => 'Roles',
    ],
    'confirmation' => [
        'logout' => [
            'title' => 'Are you sure you want to log out?',
            'text' => 'Closing the application..'
        ]
    ]
];
