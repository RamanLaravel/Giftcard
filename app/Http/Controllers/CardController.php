<?php

namespace App\Http\Controllers;
use App\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $card = Card::get();
        return response()->json($card);
    }
    public function add(Request $request)
    {
        $response = "message: gift card created successfully";
        $card = new Card();
        $card->name = $request->name;
        $card->value = $request->value;
        $card->type = $request->type;
        $card->save();
        return response()->json([$card,$response]);
    }
    public function update(Request $request,$id)
    {
        $response = "message: gift card updated successfully";
        $card = Card::find($id);
        $card->name = $request->name;
        $card->value = $request->value;
        $card->type = $request->type;
        $card->save();
        return response()->json([$card,$response]);
    }
    public function delete(Request $request,$id)
    {
        $response = "message: gift card deleted successfully";
        Card::find($id)->delete();
        return response()->json($response);
    }
}
