<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Models\accountModel;
use App\Models\categoriesModel;
use App\Models\productsModel;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class manageCategory extends Controller
{
    public function index()
    {
        $accounts = accountModel::all();
        $products = productsModel::all();
        $categories = categoriesModel::all();
        return view('pages/admin/categories/manageCategories', compact('accounts', 'products', 'categories'));
    }

    public function addCategory()
    {
        return view('pages.admin.categories.add');
    }

    public function addCate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('showToastError' . true);
        } else {
            $newCate = new categoriesModel();
            $newCate->name = $request->name;
            $newCate->description = $request->description;

            $newCate->save();
            return redirect()->intended('manage-categories')->with('showToastAddCateSS', true);
        }
    }

    public function updateCategory($id)
    {
        $categories = categoriesModel::all();
        return view('pages.admin.categories.edit', compact('categories', 'id'));
    }

    public function edit($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('showToastEditError', true);
        } else {
            $updateCate = categoriesModel::find($id);
            $updateCate->name = $request->name;
            $updateCate->description = $request->description;
            $updateCate->save();
            return redirect()->intended('manage-categories')->with('showToastEditSS', true);
        }
    }

    public function delete($id)
    {
        if ($id == 12) {
            return back()->with('showToastErrorDelete');
        }
        
        $category = categoriesModel::find($id);
        if ($category) {
            $products = productsModel::where('id_category', $id)->get();
            foreach ($products as $product) {
                $product->id_category = 12;
                $product->save();
            }
            $category->delete();

            return redirect()->intended('manage-categories')
                ->with('showToastDeleteSS', true);
        } else {
            return back()->with('showToastErrorDelte', true);
        }
    }

    public function copyCate($id)
    {
        $categories = categoriesModel::all();
        return view('pages.admin.categories.copy', compact('categories', 'id'));
    }

    public function quickCopy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('showToastError' . true);
        } else {
            $newCate = new categoriesModel();
            $newCate->name = $request->name;
            $newCate->description = $request->description;

            $newCate->save();
            return redirect()->intended('manage-categories')->with('showToastAddCateSS', true);
        }
    }
}