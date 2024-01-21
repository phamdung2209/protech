<?php

namespace App\Http\Controllers\admin\account;

use App\Http\Controllers\Controller;
use App\Models\accountModel;
use App\Models\cart_proModel;
use App\Models\cartModel;
use App\Models\orderModel;
use App\Models\productsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class manageAccount_controller extends Controller
{
    public function index()
    {
        $accounts = accountModel::all();
        $products = productsModel::all();
        $accounts = accountModel::all();
        return view('pages/admin/accounts/manageAccount', compact('accounts', 'products', 'accounts'));
    }

    public function addAccountView()
    {
        return view('pages/admin/accounts/add');
    }
    public function deleteAccount($id)
    {
        $account = accountModel::find($id);

        if ($account) {
            if (session("is_admin") && session("is_admin") == 2) {
                if (session('id') == $id) {
                    return redirect()->intended("/manage-account")->with("showToastErrorAdmin", true);
                } else {
                    $carts = cartModel::where("id_user", $id)->get();

                    $oldImg = public_path('images/' . $account->avatar);
                    if($account->avatar && file_exists($oldImg)){
                        unlink($oldImg);
                    }

                    foreach ($carts as $cart) {
                        $cart_pros = cart_proModel::where("id_cart", $cart->id)->get();
                        foreach ($cart_pros as $cart_pro) {
                            $cart_pro->delete();
                        }
                        $cart->delete();
                    }

                    $account->delete();

                    return redirect()->intended("/manage-account")->with("showToastDeleteAdmin", true);
                }

            } elseif (session("is_admin") && session("is_admin") == 1) {
                if ($account->is_admin == 2 || $account->is_admin == 1) {
                    return redirect()->intended("/manage-account")->with("showToastErrorDeny", true);
                } else {
                    $carts = cartModel::where("id_user", $id)->get();
                    foreach ($carts as $cart) {
                        $cart_pros = cart_proModel::where("id_cart", $cart->id)->get();
                        foreach ($cart_pros as $cart_pro) {
                            $cart_pro->delete();
                        }
                        $cart->delete();
                    }

                    $account->delete();

                    return redirect()->intended("/manage-account")->with("showToastSuccess", true);
                }
            }
        }

        return back();
    }

    public function addAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'regex:/^[a-zA-z][a-zA-Z0-9_]{5,}$/',
            'password' => 'required',

            'gender' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->with("showToastAccError", true);
        } else {
            $newAccount = new accountModel();

            // $fileName = "";
            if ($request->hasFile('avatar')) {
                $fileName = time() . '_' . $request->avatar->getClientOriginalName();
                $request->avatar->move(public_path('images'), $fileName);
            } else {
                $fileName = "";
            }

            $newAccount->username = $request->username;
            $newAccount->password = $request->password;
            $newAccount->is_admin = $request->is_admin;
            $newAccount->gender = $request->gender;
            $newAccount->email = $request->email;
            $newAccount->address = $request->address;
            $newAccount->phone_number = $request->phone_number;
            $newAccount->ban = $request->ban;
            $newAccount->dob = $request->dob;
            $newAccount->avatar = $fileName;
            $newAccount->balance = $request->balance;
            $newAccount->description = $request->description;


            $newAccount->save();
            
            // add cart -------------- done
            $newCart = new cartModel();
            $newCart->id_user = $newAccount->id;
            $newCart->save();

            return redirect()->intended("manage-account")->with("showtoastAccountSucces", true);
        }
    }

}