<?php

namespace App\Http\Controllers;

use App\Models\accountModel;
use App\Models\cart_proModel;
use App\Models\cartModel;
use App\Models\imagesModel;
use App\Models\orderModel;
use App\Models\productsModel;
use App\Models\type_productModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class productController extends Controller
{
    function index(Request $request){
        $products = productsModel::all();
        $cart_pros = cart_proModel::all();
        $carts = cartModel::all();
        $accounts = accountModel::all();
        $images = imagesModel::all();
        $orders = orderModel::all();

        $header__search = $request->input(('header__search'));
        $results = productsModel::where('name', 'like', '%' . $header__search . '%')
        ->orWhere('description', 'like', '%' . $header__search . '%')
        ->get();

        return view('pages.home', compact(['products', 'cart_pros', 'carts', 'accounts', 'header__search', 'results', 'images', 'orders']));
    }

    function getProduct(Request $request){
        $products = productsModel::all();
        $cart_pros = cart_proModel::all();
        $carts = cartModel::all();
        $accounts = accountModel::all();
        $images = imagesModel::all();
        $orders = orderModel::all();

        $header__search = $request->input(('header__search'));
        $results = productsModel::where('name', 'like', '%' . $header__search . '%')
        ->orWhere('description', 'like', '%' . $header__search . '%')
        ->get();

        return response()
            -> json([
                'products' => $products, 
                'cart_pros' => $cart_pros, 
                'carts' => $carts, 
                'accounts' => $accounts, 
                'header__search' => $header__search, 
                'results' => $results, 
                'images' => $images, 
                'orders' => $orders
            ]);
    }
}
