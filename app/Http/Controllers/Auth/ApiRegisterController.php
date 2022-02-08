<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Wallet;
use App\Models\User_detail;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required','string|max:60',
            'address'=> 'required','string|max:100',
            'state'=>'required','string|max:40',
            'dob'=>'required','string|max:40',
            'email' => 'required|email|max:100|unique:users',
            'phone_number' => 'required|string|max:35|unique:users',
            'password_confirmation' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
        ]);
        if ($validator->fails()){

             return  response()->json([
                 'status' =>'100',
                 'message' => $validator->errors()->first(),
             ]);
        }
        else{
            $data = $request->all();

            $check = User::where('email',$request->email)->exists();
            if(!$check){
                if ($info=$this->createUser($data)){
        
                Log::info($info);
                $user_id = $info->id;
                    return response()->json([
                        'message' =>'Successful',
                        'status' => '200',
                        'info' => [
                            'id' => $info->id,
                            'name' =>$info->name,
                            'email' => $info->email,
                            'phone' => $info->phone
                        ]
                    ]);
                }
                else{
                    return response()->json([
                        'message' =>'Failed to Create User',
                        'status' => '303'
                    ]);
        
                }
            }else{
                return response()->json([
                    'message' =>'User already exists',
                    'status' => '304'
                ]);
            }

        }
    }


    //helper method to create User
    public function createUser(array $data)
    {

        try {
            $user= User::create([
                'email' => $data['email'],
                'phone' => $data['phone_number'],
                'softdelete' => 1,
            ]);

            if($user){
                $id = $user->id;
                

                $user= User_detail::create([
                'name' => $data['email'],
                'state' => $data['phone_number'],
                'address' => $data['address'],
                'dob' => $data['dob'],
                'user_id' => $id,
                ]);
                    
                $generated_wallet = $this->createWalletId();
                $check_wallet_exist = Wallet::where('code', $generated_wallet);

                while ($check_wallet_exist) {
                    if ($check_wallet_exist->count() == 0) {
                        $create = Wallet::create([
                            'user_id' => $id,
                            'main' => 0.00,
                            'referral' => 0,
                            'bonus' => 0,
                            'wallet_code' => $generated_wallet
                        ]);
                        break;
                    }
   
                }
                return  User::find($id);

            }
        
        }
         catch (\Exception $exception){
              
		    return $exception;

         }



    }

    //generate random number for wallet code
    function createWalletId(){
        return  rand(10000,99999);

    }



    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);
    }


    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    

    public function userProfile() {

        $user = User::join('user_details','users.id','user_details.user_id')->first();

        return reponse()->json($user);
    }
}
