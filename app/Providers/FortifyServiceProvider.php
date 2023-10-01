<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Contracts\ConfirmPasswordViewResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse
        {
            public function toResponse($request)
            {
                return redirect('auth/login');
            }
        });

        $this->app->instance(ConfirmPasswordViewResponse::class, new class implements ConfirmPasswordViewResponse
        {
            public function toResponse($request)
            {
                return redirect()->route('confirm-password');
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if (
                $user &&
                Hash::check($request->password, $user->password)
            ) {
                session(['login_time' => now()]);
                return $user;
            }
        });

        Fortify::loginView(function (Request $request) {
            return view('pages.auth.login', ['type_menu' => 'auth']);
        });

        Fortify::registerView(function () {
            return view('pages.auth.register', ['type_menu' => 'auth']);
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('pages.auth.forgot-password', ['type_menu' => 'auth']);
        });

        Fortify::verifyEmailView(function () {
            return view('pages.auth.verify-email', ['type_menu' => 'auth']);
        });

        Fortify::resetPasswordView(function (Request $request) {
            return view('pages.auth.reset-password', ['request' => $request, 'type_menu' => 'auth']);
        });
    }
}
