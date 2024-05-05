<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Item;

class CartController extends Controller
{
    public function getCarts()
    {
        $arrCarts = Cart::all();
        return response($arrCarts, 201);
    }

    public function getCartByUserId($user_id){
        $user = User::where('id', 'LIKE', '%'.$user_id.'%')
                        ->get();
        $cart=[];
        if(sizeof($user) > 0){
            $idUser = $user[0]->id;
            $cart = Cart::where('user_id', 'LIKE', '%'.$idUser.'%')
                        ->get();
        }

        //for each ($c as $cart)



        return response($cart, 201);
    }

    // public function getCartByUser($search){
    //     $user = User::where('name', 'LIKE', '%'.$search.'$')
    //                     ->get();
    //     if(sizeof($user) > 0){
    //         $idUser = $user[0]->id;
    //         $cart = Cart::where('name', 'LIKE', '%'.$idUser.'%')
    //                     ->get();        }                
    //     return response($cart, 201);
    // }


    public function addToCart(Request $request){

        $fields = $request->validate([
            'user_id'       => 'required|integer',
            'item_id'       => 'required|integer'
        ]);
        
        $cart = Cart::create([
            'user_id' => $fields['user_id'],
            'item_id' => $fields['item_id']
        ]);  
        
        return response($cart, 201);
    }

    public function deleteCartItem($id){

        $cartItem = Cart::find($id);
        $cartItem->delete();

        return response([], 201);
    }
}