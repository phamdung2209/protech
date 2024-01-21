<?php

namespace App\Http\Controllers;

use App\Models\accountModel;
use App\Models\cart_proModel;
use App\Models\cartModel;
use App\Models\orderModel;
use App\Models\productsModel;
use App\Models\type_productModel;
use Illuminate\Http\Request;

class searchController extends Controller
{
    function index(Request $request){
        $accounts = accountModel::all();
        $products = productsModel::all();
        $cart_pros = cart_proModel::all();
        $carts = cartModel::all();
        $type_products = type_productModel::all();
        $orders = orderModel::all();

        $header__search = $request->input('header__search');
        $results = productsModel::where('name', 'like', '%' . $header__search . '%')
        ->orWhere('description', 'like', '%' . $header__search . '%')
        ->get();

        return view('pages.search', compact('results', 'accounts', 'products', 'cart_pros', 'carts', 'header__search', 'type_products', 'orders'));
    }
}
