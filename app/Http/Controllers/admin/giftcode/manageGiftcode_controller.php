<?php

namespace App\Http\Controllers\admin\giftcode;

use App\Http\Controllers\Controller;
use App\Models\accountModel;
use App\Models\brandsModel;
use App\Models\giftcodeModel;
use App\Models\productsModel;
use Illuminate\Http\Request;

class manageGiftcode_controller extends Controller
{
    public function index()
    {
        $accounts = accountModel::all();
        $products = productsModel::all();
        $giftCodes = giftcodeModel::all();
        return view('pages/admin/giftcodes/manageGiftcode', compact('accounts', 'products', 'giftCodes'));
    }

    public function addGiftCodeView(){
        return view('pages.admin.giftcodes.add');
    }
}
