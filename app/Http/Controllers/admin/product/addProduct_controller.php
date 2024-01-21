<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\brandsModel;
use App\Models\cart_proModel;
use App\Models\categoriesModel;
use App\Models\imagesModel;
use App\Models\order_proModel;
use App\Models\orderModel;
use App\Models\productsModel;
use App\Models\type_productModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class addProduct_controller extends Controller
{
    public function index()
    {
        $brands = brandsModel::all();
        $products = productsModel::all();
        $categories = categoriesModel::all();
        $type_products = type_productModel::all();
        return view('pages/admin/product/add', compact('brands', 'products', 'categories', 'type_products'));
    }

    public function addPro(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'cost' => 'required',
            'cost_old' => 'required',
            'cpu' => 'required',
            'gpu' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'screen_size' => 'required',
            'warranty_period' => 'required',
            'os' => 'required',
            'keyboard' => 'required',
            'pin' => 'required',
            'connector' => 'required',
            'id_typeProduct' => 'required',
            'id_category' => 'required',
            'id_brand' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('showToastSignupError', true);
        }

        $fileName = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path('images');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($path, $fileName);
        } else {
            $fileName = 'noname.png';
        }

        $newPro = new productsModel();
        $newPro->name = $request->name;
        $newPro->description = $request->description;
        $newPro->image = $fileName;
        $newPro->cost = $request->cost;
        $newPro->cost_old = $request->cost_old;
        $newPro->cpu = $request->cpu;
        $newPro->gpu = $request->gpu;
        $newPro->ram = $request->ram;
        $newPro->storage = $request->storage;
        $newPro->screen_size = $request->screen_size;
        $newPro->warranty_period = $request->warranty_period;
        $newPro->os = $request->os;
        $newPro->keyboard = $request->keyboard;
        $newPro->pin = $request->pin;
        $newPro->connector = $request->connector;
        $newPro->id_typeProduct = $request->id_typeProduct;
        $newPro->id_category = $request->id_category;
        $newPro->id_brand = $request->id_brand;

        $newPro->save();

        return redirect()->intended('/manage-products')
            ->with('showToastAddProSS', true);
    }

    public function updateProduct($id)
    {
        $brands = brandsModel::all();
        $products = productsModel::all();
        $categories = categoriesModel::all();
        $type_products = type_productModel::all();
        return view('pages/admin/product/edit', compact('brands', 'products', 'categories', 'type_products', 'id'));
    }

    public function editPro($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'cost' => 'required',
            'cost_old' => 'required',
            'cpu' => 'required',
            'gpu' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'screen_size' => 'required',
            'warranty_period' => 'required',
            'os' => 'required',
            'keyboard' => 'required',
            'pin' => 'required',
            'connector' => 'required',
            'id_typeProduct' => 'required',
            'id_category' => 'required',
            'id_brand' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('toast', true);
        } else {
            $fileName = "";
            // if ($request->hasFile('image')) {
            //     $file = $request->file('image');
            //     $path = public_path('images');
            //     $fileName = time() . '_' . $file->getClientOriginalName();
            //     $file->move($path, $fileName);
            // } else {
            //     $fileName = "noname.png";
            // }
            $oldProduct = productsModel::find($id);
            if ($request->hasFile('image') && $oldProduct->image !== "noname.png") {
                // Xóa ảnh cũ
                $oldImagePath = public_path('images') . '/' . $oldProduct->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Lưu file ảnh mới
                $file = $request->file('image');
                $path = public_path('images');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }

            $updatePro = productsModel::find($id);
            $updatePro->name = $request->name;
            $updatePro->description = $request->description;
            $updatePro->image = $fileName;
            $updatePro->cost = $request->cost;
            $updatePro->cost_old = $request->cost_old;
            $updatePro->cpu = $request->cpu;
            $updatePro->gpu = $request->gpu;
            $updatePro->ram = $request->ram;
            $updatePro->storage = $request->storage;
            $updatePro->screen_size = $request->screen_size;
            $updatePro->warranty_period = $request->warranty_period;
            $updatePro->os = $request->os;
            $updatePro->keyboard = $request->keyboard;
            $updatePro->pin = $request->pin;
            $updatePro->connector = $request->connector;
            $updatePro->id_typeProduct = $request->id_typeProduct;
            $updatePro->id_category = $request->id_category;
            $updatePro->id_brand = $request->id_brand;

            if ($fileName) {
                $updatePro->image = $fileName;
            }

            $updatePro->save();
            return redirect()->intended('manage-products')
                ->with('toastUpdateSS', true);
        }
    }

    public function deletePro($id)
    {
        $product = productsModel::find($id);

        if ($product) {
            $imagePath = public_path('images') . '/' . $product->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $carts = cart_proModel::where('id_product', $id)->get();
            foreach ($carts as $cart) {
                $cart->delete();
            }

            $images = imagesModel::where('id_product', $id)->get();
            foreach ($images as $image) {
                $image->delete();
            }

            $orders = order_proModel::where('id_product', $id)->get();
            foreach ($orders as $order) {
                $order->delete();
            }

            $product->delete();

            return redirect()->intended('manage-products')
                ->with('toastDeleteSS', true);
        } else {
            return back();
        }
    }


    //copy
    public function copyPro($id)
    {
        $brands = brandsModel::all();
        $products = productsModel::all();
        $categories = categoriesModel::all();
        $type_products = type_productModel::all();
        return view('pages/admin/product/copy', compact('brands', 'products', 'categories', 'type_products', 'id'));
    }

    public function quickCopyPro(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'cost' => 'required',
            'cost_old' => 'required',
            'cpu' => 'required',
            'gpu' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'screen_size' => 'required',
            'warranty_period' => 'required',
            'os' => 'required',
            'keyboard' => 'required',
            'pin' => 'required',
            'connector' => 'required',
            'id_typeProduct' => 'required',
            'id_category' => 'required',
            'id_brand' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('showToastError0', true);
        } else {
            $fileName = "";
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = public_path('images');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            } else {
                $fileName = 'noname.png';
            }

            $newPro = new productsModel();
            $newPro->name = $request->name;
            $newPro->description = $request->description;
            $newPro->image = $fileName;
            $newPro->cost = $request->cost;
            $newPro->cost_old = $request->cost_old;
            $newPro->cpu = $request->cpu;
            $newPro->gpu = $request->gpu;
            $newPro->ram = $request->ram;
            $newPro->storage = $request->storage;
            $newPro->screen_size = $request->screen_size;
            $newPro->warranty_period = $request->warranty_period;
            $newPro->os = $request->os;
            $newPro->keyboard = $request->keyboard;
            $newPro->pin = $request->pin;
            $newPro->connector = $request->connector;
            $newPro->id_typeProduct = $request->id_typeProduct;
            $newPro->id_category = $request->id_category;
            $newPro->id_brand = $request->id_brand;

            $newPro->save();

            return redirect()->intended('manage-products')
                ->with('showToastAddProSS', true);
        }
    }
}