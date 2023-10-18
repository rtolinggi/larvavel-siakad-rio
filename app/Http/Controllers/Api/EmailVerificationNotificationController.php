<?php

namespace App\Http\Controllers\Api;

use App\Http\Response\HasEmailResponse;
use App\Http\Response\SendEmailResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController as NewController;

class EmailVerificationNotificationController extends NewController
{
    public function store(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                ? new JsonResponse([
                    'success' => false,
                    'message' => 'Your email has been previously verified'
                ], 204)
                : redirect()->intended(Fortify::redirects('email-verification'));
        }

        $request->user()->sendEmailVerificationNotification();

        return app(EmailVerificationNotificationSentResponse::class);
    }
}
