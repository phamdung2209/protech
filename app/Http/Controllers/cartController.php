<?php

namespace App\Http\Controllers;

use App\Models\accountModel;
use App\Models\cart_proModel;
use App\Models\cartModel;
use App\Models\orderModel;
use App\Models\productsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class cartController extends Controller
{
    function index(Request $request)
    {
        $products = productsModel::all();
        $cart_pros = cart_proModel::all();
        $carts = cartModel::all();
        $accounts = accountModel::all();
        $orders = orderModel::all();

        $header__search = $request->input('header__search');
        $results = productsModel::where('name', 'like', '%' . $header__search . '%')
        ->orWhere('description', 'like', '%' . $header__search . '%')
        ->get();

        return view('pages/cart', compact(['products', 'cart_pros', 'carts', 'accounts', 'header__search', 'results', 'orders']));
    }
    function getCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_cart' => 'required',
            'id_product' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $getCart = new cart_proModel();

        $getCart->id_cart = $request->id_cart;
        $getCart->id_product = $request->id_product;

        $getCart->save();

        return redirect()->intended('/')
            ->with('showToastSignup', true);
    }
}