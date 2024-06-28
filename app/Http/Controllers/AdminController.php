<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Products;

use App\Models\Order;

// use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    //
    public function showMessage($message, $type)
    {
        toastr()
            ->timeOut(5000)
            ->newestOnTop(true)
            ->closeOnHover(true)
            ->closeDuration(2)
            ->closeButton(true)
            ->$type($message);
    }

    public function view_category()
    {
        $category = Category::all();
        return view('admin.category', compact('category'));
    }

    public function add_category(Request $request)
    {
        try {
            $category = new Category;
            $category->category_name = $request->category;
            $category->save();
            $this->showMessage('Category Added Successfully', 'addSuccess');
        } catch (\Exception $e) {
            $this->showMessage('Failed to Add Category', 'addError');
        }
        return redirect()->back();
    }

    public function delete_category($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            $this->showMessage('Category Deleted Successfully', 'addSuccess');
        } catch (\Exception $e) {
            $this->showMessage('Failed to Delete Category', 'addError');
        }
        return redirect()->back();
    }

    public function update_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        try {
            $category = Category::find($request->category_id);
            if ($category) {
                $category->category_name = $request->category_name;
                $category->save();
                $this->showMessage('Category Updated Successfully', 'addSuccess');
            } else {
                $this->showMessage('Category Not Found', 'addError');
            }
        } catch (\Exception $e) {
            $this->showMessage('Failed to Update Category', 'addError');
        }
        return redirect()->back();
    }


    public function add_product()
    {

        $category = Category::all();

        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        try {
            $product = new Products;
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->qty;
            $product->category = $request->category;

            $image = $request->image;

            if ($image) {
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move('images/products', $image_name);
                $product->image = $image_name;
            } else {
                $this->showMessage('Image Error!!', 'addError');
                return redirect()->back();
            }

            $product->save();
            $this->showMessage('Product Added Successfully', 'addSuccess');
        } catch (\Exception $e) {
            $this->showMessage('Failed to Add Product', 'addError');
        }
        return redirect('view_product');
    }

    public function view_product()
    {
        $product = Products::paginate(5);
        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        try {
            $product = Products::find($id);
            $image_path = public_path('images/products/' . $product->image);

            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $product->delete();
            $this->showMessage('Product Deleted Successfully', 'addSuccess');
        } catch (\Exception $e) {
            $this->showMessage('Failed to Delete Product', 'addError');
        }
        return redirect()->back();
    }

    public function edit_product($id)
    {
        $product = Products::find($id);
        $category = Category::all();
        return view('admin.edit_product', compact('product', 'category'));
    }

    public function update_product(Request $request, $id)
    {
        try {
            $product = Products::find($id);

            if ($product) {
                $product->title = $request->title;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->quantity = $request->qty;
                $product->category = $request->category;

                $image_path_old = public_path('images/products/' . $product->image);
                $new_image = $request->image;

                if ($new_image) {
                    $new_img_name = time() . '.' . $new_image->getClientOriginalExtension();
                    $request->image->move('images/products/', $new_img_name);
                    $product->image = $new_img_name;

                    if (file_exists($image_path_old)) {
                        unlink($image_path_old);
                    }
                }

                $product->save();
                $this->showMessage('Product Updated Successfully', 'addSuccess');
            } else {
                $this->showMessage('Product Not Found', 'addError');
            }
        } catch (\Exception $e) {
            $this->showMessage('Failed to Update Product', 'addError');
        }
        return redirect('view_product');
    }


    public function searchAutocomplete(Request $request)
    {
        $search = $request->get('term');

        $products = Products::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('category', 'LIKE', '%' . $search . '%')
            ->get();

        $results = [];
        foreach ($products as $product) {
            $results[] = $product->title;
            $results[] = $product->category;
        }

        return response()->json($results);
    }


    public function product_search(Request $request)
    {
        $search = $request->search;

        $product = Products::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('category', 'LIKE', '%' . $search . '%')->paginate(5);

        return view('admin.view_product', compact('product'));
    }



    public function view_order(){
        $order = Order::all();

        return view('admin.order', compact('order'));
    }

    // public function get_category(){

    //     $category = DB::table('categories')->select('id','category_name','created_at','updated_at')->get();

    //     return view('admin.category')->with('category', $category);

    // }
}
