<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Redirect;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Contracts\Factory as Socialite;

class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

    protected $redirectPath = '/';
    protected $loginPath = '/auth/login';

    use AuthenticatesAndRegistersUsers,
        ThrottlesLogins;

    public function __construct(Socialite $socialite) {
        $this->socialite = $socialite;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'username' => 'required|max:255|unique:users',
                    'firstname' => 'required|max:255',
                    'lastname' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
                    'username' => $data['username'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'address' => $data['address'],
                    'address2' => $data['address2'],
                    'city' => $data['city'],
                    'province' => $data['province'],
                    'zip' => $data['zip'],
                    'phone' => $data['phone'],
                    'country' => $data['country'],
                    'company' => $data['company'],
                    'picture' => $data['picture'],
                    'provider_id' => $data['provider_id'],
                    'provider' => $data['provider'],
        ]);
    }

    public function getSocialAuth($provider = null) {
        if (!config("services.$provider"))
            abort('404'); //just to handle providers that doesn't exist

        return $this->socialite->with($provider)->redirect();
    }

    public function getSocialAuthCallback($provider = null) {
        if ($user = $this->socialite->with($provider)->user()) {
            //print_r($user->user['first_name']);
            //print_r($user->user['name']['familyName']);
            //dd($user);

            //Check if user exists if not create them
            $authUser = $this->findOrCreateUser($user, $provider);
            //Log them in and redirect
            Auth::login($authUser, true);
            return Redirect::to('/');
        } else {
            return 'something went wrong';
        }
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $theUser
     * @return User
     */
    private function findOrCreateUser($theUser,$provider) {


        if ($authUser = User::where('provider_id', $theUser->id)->first()) {
            return $authUser;
        }


        switch ($provider) {
            case 'facebook':
                return User::create([
                            //'username' => $theUser->name,
                            'email' => $theUser->email,
                            'firstname' => $theUser->user['first_name'],
                            'lastname' => $theUser->user['last_name'],
                            'picture' => $theUser->avatar_original,
                            'provider_id' => $theUser->id,
                            'provider' => 'facebook',
                            'token' => $theUser->token,
                ]);
                break;
            case 'google':
                return User::create([
                            //'username' => $theUser->name,
                            'email' => $theUser->email,
                            'firstname' => $theUser->user['name']['givenName'],
                            'lastname' => $theUser->user['name']['familyName'],
                            'picture' => $theUser->avatar,
                            'provider_id' => $theUser->id,
                            'provider' => 'google',
                            'token' => $theUser->token,
                ]);
                break;
        }
    }

}
