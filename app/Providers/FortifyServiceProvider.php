<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        RateLimiter::for('login', function (Request $request) {
            $key = 'login.'.$request->ip();
            $max = 10;   // attempts
            $decay = 60;    //seconds
        
            if (RateLimiter::tooManyAttempts($key, $max)) {
                $seconds = RateLimiter::availableIn($key);
                return redirect()->route('login')
                    ->with('error', __('auth.throttle', ['seconds' => $seconds]));
            } else {
                RateLimiter::hit($key, $decay);
            }
        });

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        Fortify::authenticateUsing(function (Request $request) {
            $username=$request->user_name;
            $password=$this->hash($request->password);
            $credentials = [
                'user_name' => $username,
                'password'  => $password
            ];
    
            $user =User::where([['user_name', $username], ['password', $password]])->first();
        
            if ($user) {
                $user->token = JWTAuth::fromUser($user);
                $user->save();
                return $user;
            }
        });
    }

    protected function hash(string $string)
    {
        return hash('md5', $string);
    }
}
