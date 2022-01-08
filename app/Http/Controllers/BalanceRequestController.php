<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\balanceRequest;
use App\Models\client;

class BalanceRequestController extends Controller
{
    public function index(Request $request)
    {
        $client = client::select('*')->where('token',$request->header('Authorization'))->first();
        return response()->json(["Current_Balance"=>$client['currentCredit']], 200);
    }

    public function save(Request $request)
    {
        $client = client::select('*')->where('token',$request->header('Authorization'))->first();
        if($request->Amount !="" && $request->Amount > 0 && $request->Amount%5 == 0){
            $input = $request->all();
            if ($image = $request->file('image')) {
                $imageDestinationPath = 'uploads/';
                $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($imageDestinationPath, $postImage);

                balanceRequest::create([
                    'image' => 'uploads/'.$postImage,
                    'amount' => $request->Amount,
                    'balance_status_id' => 1,
                    'client_id' => $client['id'],
                ]);
                return response(null,201);
            }else{
                return response()->json(["Error"=>"Missing_Parameter"],409);
            }
        }else{
            return response()->json(["Error"=>"Missing_Parameter"],409);
        }
    }
}
