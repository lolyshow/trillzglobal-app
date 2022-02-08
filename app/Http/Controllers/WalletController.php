<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use App\Models\User_detail;
class WalletController extends Controller
{
    public function walletToWallet(Request $request){

        $validator = Validator::make($request->all(), [
        'dest_wallet' => 'required',
        'amount' => 'required|integer|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['required_fields' =>$validator->errors()->all(),
                'message' =>'Please pass and correct amount and destination wallet',
                'status'=>'301']);
        }

        $wallet= Wallet::where('wallet_code',$request->dest_wallet)->first();
        if (!$wallet){
            return response()->json([
                "status" =>"304",
                "message"=>"incorrect destination wallet please check the wallet and try again"
            ]);
        }
        else{

            
            $dest_user = $wallet->user_id;
            $debit = $this->debit($dest_user,$request->amount, $request->dest_wallet);
            //if debit successful?
            if($debit){
                Wallet::where('wallet_code', $request->dest_wallet)->increment('main', $request->amount);
                return response()->json([
                    "status"=>"200",
                    "message"=>"successful",
                    "name"=>$userdetails->name,

                ]);
            }else{
                return response()->json([
                    "status"=>"500",
                    "message"=>"unknown error please wait for requery to confirm the final status",

                ]);
            }
        }


    }


    function debit($user_id,$amount)
    {
    # code...

        $check  = Wallet::where('user_id', $user_id)->decrement('main', $amount);
        $wallet =  Wallet::where('user_id', $user_id)->first();
        $balance = $wallet->main;
        if($check){


            if($balance>=0){
            
            return 1;

            }else{
                Wallet::where('user_id', $user_id)->increment('main', $amount);
                    return 0;
            }


        }else{
            return 0;
        }
    }

}




