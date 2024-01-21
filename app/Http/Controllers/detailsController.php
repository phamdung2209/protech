<?php

namespace App\Http\Controllers;

use App\Models\accountModel;
use App\Models\brandsModel;
use App\Models\cart_proModel;
use App\Models\cartModel;
use App\Models\imagesModel;
use App\Models\orderModel;
use App\Models\productsModel;
use App\Models\type_productModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class detailsController extends Controller
{
    function index($id, Request $request)
    {
        $products = productsModel::all();
        $cart_pros = cart_proModel::all();
        $carts = cartModel::all();
        $accounts = accountModel::all();
        $brands = brandsModel::all();
        $type_products = type_productModel::all();
        $images = imagesModel::all();
        $orders = orderModel::all();

        $header__search = $request->input('header__search');
        $results = productsModel::where('name', 'like', '%' . $header__search . '%')
        ->orWhere('description', 'like', '%' . $header__search . '%')
        ->get();

        return view('pages.details', compact(['products', 'cart_pros', 'carts', 'accounts', 'brands', 'id', 
                                                'type_products', 'header__search', 'results', 'images', 'orders']));
    }

    function addCart(Request $request, $id)
    {
        $quantity = $request->input('quantity');

        $product = productsModel::find($id);

        if ($product) {
            $cart = cartModel::where('id_user', session('id_user'))->first();

            if ($cart) {
                $cart_pro = cart_proModel::where('id_cart', $cart->id)
                    ->where('id_product', $product->id)
                    ->first();

                if ($cart_pro) {
                    $cart_pro->quantity += $quantity; // incre quantity
                    $cart_pro->save();
                } else {
                    // create new cart_pro
                    $cart_pro = new cart_proModel();
                    $cart_pro->id_cart = $cart->id;
                    $cart_pro->id_product = $product->id;
                    $cart_pro->quantity = $quantity;
                    $cart_pro->save();
                }

                return back()
                    ->with('showToastAddCartSuccess', true);
            } else {
                return back()
                    ->with('showToastAddCartError', true);
            }
        } else {
            return back()
                ->with('showToastAddCartError', true);
        }
    }

    function removeProductFromCart($id)
    {
        $cart = cartModel::where('id_user', session('id_user'))->first();

        if ($cart) {

            $cart_pro = cart_proModel::where('id_cart', $cart->id)
                ->where('id_product', $id)
                ->first();

            if ($cart_pro) {
                $cart_pro->delete();

                return back()
                    ->with('showToastRemoveProductSuccess', true);
            }
        }

        return back()
            ->with('showToastRemoveProductError', true);
    }


}