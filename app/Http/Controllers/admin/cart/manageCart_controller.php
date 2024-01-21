<?php

namespace App\Http\Controllers\admin\cart;

use App\Http\Controllers\Controller;
use App\Models\accountModel;
use App\Models\cartModel;
use App\Models\categoriesModel;
use App\Models\productsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class manageCart_controller extends Controller
{
    public function index(){
        $accounts = accountModel::all();
        $products = productsModel::all();
        $carts = cartModel::all();
        return view('pages/admin/carts/manageCart', compact('accounts', 'products', 'carts'));
    }

    // public function addCart(Request $request){
    //     $validator = Validator::make($request->all(),[
    //         ''
    //     ])
    // }
}
