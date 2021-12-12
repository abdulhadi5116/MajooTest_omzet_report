<?php
   
namespace App\Http\Controllers\API;
   use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

   
class AuthController extends BaseController
{

    public function login(Request $request)
    {
        $username=$request->username;
        $password=hash('md5', $request->password);
        $credentials = [
            'user_name' => $username,
            'password'  => $password
        ];

        $user =User::where($credentials)->first();
        if($user){ 
            Auth::login($user);
            $jwtToken = JWTAuth::fromUser($user);
            $auth = Auth::user(); 
            $user->token = $jwtToken;
            $user->save();

            $success['token'] =  $auth->createToken('LaravelSanctumAuth')->plainTextToken; 
            $success['jwt_token'] =  $jwtToken; 
            $success['name'] =  $auth->name;
   
            return $this->handleResponse($success, 'User logged-in!');
        } 
        else{ 
            return $this->handleError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = hash('md5', $input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('LaravelSanctumAuth')->plainTextToken;
        $success['name'] =  $user->name;
   
        return $this->handleResponse($success, 'User successfully registered!');
    }
   
}