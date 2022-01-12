<?php

namespace App\Http\Controllers;
use App\Card;
use App\Cardtype;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function discount(Request $request)
    {
       $payable_amount = $request->amount_to_be_paid;
       $giftcard_ids = explode(',',$request->gift_card);
       $giftcard_amount = 0;
       if(count($giftcard_ids) == 1){
           //single gift card
           $giftcard = Card::find($giftcard_ids[0]);
           if(isset($giftcard) && $giftcard->id !=''){
               $gift_type = Cardtype::find($giftcard->type);               
               $giftcard_amount = $gift_type->percent/100*$giftcard->value;
           }
       } else if(count($giftcard_ids)>1){
         //multiple gift card
         foreach($giftcard_ids as $id){
            $giftcard = Card::find($id);
            if(isset($giftcard) && $giftcard->id !=''){
                $gift_type = Cardtype::find($giftcard->type);               
                $giftcard_amount = $giftcard_amount + ($gift_type->percent/100*$giftcard->value);
            }
         }
       } else {
            return response()->json([
                'payable_amount' => $payable_amount, 
                'gift_discount' => 0,
            ]);
       }
    $payable_amount = $payable_amount - $giftcard_amount;
    return response()->json([
        'payable_amount' => $payable_amount, 
        'gift_discount' => $giftcard_amount,
    ]);
       
      
    }
}
