<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\card;
use App\Models\client;
use App\Models\category;

use PDF;

function generateRandomString($length = 10) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
class CardController extends Controller
{
    public function index(Request $request)
    {
        $client = client::select('*')->where('token',$request->header('Authorization'))->first();
        $cards= card::select('*')->where('client_id',$client['id'])->get();
        return response()->json($cards, 200);
    }

<<<<<<< HEAD
    public function show(Request $request,$serial)
    {
        $client = client::select('*')->where('token',$request->header('Authorization'))->first();
        $card= card::select('*')->where('serial',$serial)->where('client_id',$client['id'])->get()->first();
=======
    public function show(Request $request,$code)
    {
        $client = client::select('*')->where('token',$request->header('Authorization'))->first();
        $card= card::select('*')->where('code',$code)->where('client_id',$client['id'])->get()->first();
>>>>>>> new
        if($card!=null){
            return response()->json($card, 200);
        }else{
            return response()->json(json_decode('{}'), 404);
        }
    }

    public function print(Request $request,$serial)
    {
        $client = client::select('*')->where('token',$request->header('Authorization'))->first();
        $card= card::select('*')->where('serial',$serial)->where('client_id',$client['id'])->get()->first();
        if($card!=null){
            return response()->json(["PDF_URL"=>env("APP_URL") . "cards/" . $card['pdf_path']], 201);
        }else{
            return response()->json(json_decode('{}'), 404);
        }
    }

    public function save(Request $request)
    {
        if($request->category_id !="" && $request->quantity!="" && $request->quantity > 0 && $request->quantity > 0 && ((category::select('*')->where('id',$request->category_id)->count())>0)){
            $client = client::select('*')->where('token',$request->header('Authorization'))->first();
            $category = category::select('*')->where('id',$request->category_id)->where('client_id',$client['id'])->first();
            if( $category != null ){
                $price = ( $request->quantity * $category['value'] ) * 0.05;
                if($client['currentCredit'] >= $price){
                    $pdf_list=[];
                    for($i=0;$i<$request->quantity;$i++){
                        $path = public_path('cards/');
                        $fileName = time() +$i . '.' . 'pdf' ;
                        $code=generateRandomString(4)."-".generateRandomString(4)."-".generateRandomString(4)."-".generateRandomString(2);
                        while(true){
                            $cardCheck = card::select()->where('code',$code)->count();
                            if($cardCheck==0){
                                break;
                            }
                            $code=generateRandomString(4)."-".generateRandomString(4)."-".generateRandomString(4)."-".generateRandomString(2);
                        }
                        $serial = generateRandomString(11);
                        while(true){
                            $cardCheck2 = card::select()->where('serial',$serial)->count();
                            if($cardCheck2==0){
                                break;
                            }
                            $serial = generateRandomString(11);
                        }
                        $card = card::create([
                            'serial' => $serial ,
                            'code' => $code,
                            'card_status_id' => 1,
                            'category_id' => $request->category_id,
                            'client_id' => $client['id'],
                            'pdf_path' => "cards/" .$fileName,
                        ]);
            
                        if($card != null){
                            $card['order'] = card::select()->where('client_id',$client['id'])->count();
                            $card['date']=date('d-m-Y');
                            $card['time']=date('h:i:s a');
                            $card['price']=$category['value'];
                            $customPaper = array(0,0,240,198.425);
                            $pdf = PDF::loadView('card.layout',compact('card'))->setPaper($customPaper, 'landscape');
                            $pdf->save($path . $fileName);
                            array_push($pdf_list, env("APP_URL") . $card['pdf_path']);
                        }
                    }
                    $client->update(['currentCredit' => ( $client['currentCredit'] - $price )]);
                    return response()->json(["PDF_URL"=>$pdf_list],201);
                }else{
                    return response()->json(["Error"=>"Balance_Not_enough"],409);
                }
            }else{
                return response()->json(["Error"=>"Missing_Parameter"],409);
            }
        }else{
            return response()->json(["Error"=>"Missing_Parameter"],409);
        }
    }
<<<<<<< HEAD
=======
    
    public function useCard(Request $request){
        $client = client::select('*')->where('token',$request->header('Authorization'))->first();
        $card= card::select('*')->where('code',$request->cardNumber)->where('client_id',$client['id'])->get()->first();
        if($card!=null){
            if($card->card_status_id==1){
                $card->update(['card_status_id'=>2]);
                return response()->json(json_decode('{}'), 200);
            }else{
                return response()->json(json_decode('{}'), 409);
            }
        }else{
            return response()->json(json_decode('{}'), 404);
        }
    }
>>>>>>> new
}
