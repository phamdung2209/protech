<?php

namespace App\Http\Controllers\admin\images;

use App\Http\Controllers\Controller;
use App\Models\accountModel;
use App\Models\imagesModel;
use App\Models\productsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class manageImage_controller extends Controller
{
    public function index()
    {
        $accounts = accountModel::all();
        $products = productsModel::all();
        $images = imagesModel::all();
        return view('pages/admin/images/manageImages', compact('accounts', 'products', 'images'));
    }

    public function addImageView()
    {
        $products = productsModel::all();

        return view('pages.admin.images.add', compact('products'));
    }

    public function addImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fileName' => 'required',
            // 'filePath' => 'required',
            'description' => 'required',
            'id_product' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('showToastError', true);
        } else {
            $newImg = new imagesModel();
            $newImg->fileName = $request->fileName;
            $newImg->id_product = $request->id_product;
            $newImg->description = $request->description;


            $imageNav = "";
            if ($request->hasFile('imgNav')) {
                $file = $request->file('imgNav');
                $path = public_path('images');
                $imageNav = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $imageNav);
            } else {
                $imageNav = 'noname.png';
            }

            $imageDes = "";
            if ($request->hasFile('imgDes')) {
                $file = $request->file('imgDes');
                $path = public_path('images');
                $imageDes = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $imageDes);
            } else {
                $imageDes = 'noname.png';
            }

            $filePath = [
                $imageNav,
                $imageDes,
            ];
            $newImg->filePath = json_encode($filePath);

            $newImg->save();

            return redirect()->intended('manage-image')->with('showToastSucces', true);
        }
    }

    public function deleteImage($id)
    {
        $image = imagesModel::find($id);

        $filePath = json_decode($image->filePath, true);
        $imgNav = $filePath[0];
        $imgDes = $filePath[1];

        if ($image) {
            $imagePathNav = public_path('images') . "/" . $imgNav;
            $imagePathDes = public_path('images') . "/" . $imgDes;
            if (file_exists($imagePathNav) || file_exists($imagePathNav)) {
                unlink($imagePathNav);
                unlink($imagePathDes);
            }

            $image->delete();

            return back()->with('showToastSuccess', true);
        }
    }
}