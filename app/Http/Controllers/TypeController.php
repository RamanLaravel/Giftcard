<?php

namespace App\Http\Controllers;
use App\Cardtype;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $card_type = Cardtype::get();
        return response()->json($card_type);
    }
    public function add(Request $request)
    {
        $response = "message: card type created successfully";
        $card_type = new Cardtype();
        $card_type->name = $request->name;
        $card_type->percent = $request->percent;
        $card_type->save();
        return response()->json([$card_type,$response]);
    }
    public function update(Request $request,$id)
    {
        $response = "message: card type updated successfully";
        $card_type = Cardtype::find($id);
        $card_type->name = $request->name;
        $card_type->percent = $request->percent;
        $card_type->save();
        return response()->json([$card_type,$response]);
    }
    public function delete(Request $request,$id)
    {
        $response = "message: card type deleted successfully";
        Cardtype::find($id)->delete();
        return response()->json($response);
    }
}
