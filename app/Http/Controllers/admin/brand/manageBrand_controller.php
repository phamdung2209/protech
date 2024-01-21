<?php

namespace App\Http\Controllers\admin\brand;

use App\Http\Controllers\Controller;
use App\Models\accountModel;
use App\Models\brandsModel;
use App\Models\productsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class manageBrand_controller extends Controller
{
    public function index()
    {
        $accounts = accountModel::all();
        $products = productsModel::all();
        $brands = brandsModel::all();
        return view('pages/admin/brands/manageBrand', compact('accounts', 'products', 'brands'));
    }

    public function addBrandView()
    {
        return view('pages/admin/brands/add');
    }

    public function addBrand(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('showToastError', true);
        } else {
            $newBrand = new brandsModel();
            $newBrand->name = $request->name;
            $newBrand->save();
            return redirect()->intended('manage-brands')->with('showToastSS', true);
        }
    }

    public function deleteBrand($id)
    {
        if ($id == 12) {
            return back()->with('showToastError', true);
        }
        $brand = brandsModel::find($id);
        if ($brand) {
            $products = productsModel::where('id_brand', $id)->get();
            foreach ($products as $product) {
                $product->id_brand = 12;
                $product->save();
            }
            $brand->delete();
            return redirect()->intended('manage-brands')->with('showToastSS', true);
        } else {
            return back()->with('showToastError', true);
        }
    }

    public function updateBrand($id)
    {
        $brands = brandsModel::all();
        $products = productsModel::all();
        return view('pages/admin/brands/edit', compact('brands', 'products', 'id'));
    }

    public function editBrand(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('showToastError', true);
        } else {
            $updateBrand = brandsModel::find($id);
            $updateBrand->name = $request->name;
            $updateBrand->save();
            return redirect()->intended('manage-brands')->with('showToastSS', true);
        }
    }

    public function copyBrand($id)
    {
        $brands = brandsModel::all();
        $products = productsModel::all();
        return view('pages/admin/brands/copy', compact('brands', 'products', 'id'));
    }
}