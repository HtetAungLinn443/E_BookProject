<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use function Ramsey\Uuid\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //category List Page
    public function categoryList(){
        $data = Category::when(request('key'),function($query){
                        $query->where('name','like','%'. request('key') .'%');
                    })
                        ->orderBy('id','desc')
                        ->paginate(5);

        $data->appends(request()->all());
        return view('admin.category.category',compact('data'));
    }

    // category Create Page
    public function categoryCreatePage(){
        return view('admin.category.create');
    }

    // direct create category
    public function categoryCreate(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->getCategoryData($request);
        Category::create($data);

        return redirect()->route('admin#categoryList')->with(['updateSuccess' => 'Category Create Success']);
    }

    // Category Delete
    public function categoryDelete($id){
        Category::where('id',$id)->delete();
        return back();
    }

    // Category Edit Page
    public function editPage($id){
        $data = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('data'));
    }

    // Direct Category Edit
    public function categoryEdit(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->getCategoryData($request);
        Category::where('id',$request->categoryId)->update($data);
        return redirect()->route('admin#categoryList')->with(['updateSuccess' => 'Category Edit Success']);
    }




    // Private Function
    // Category Validation Check
    private function categoryValidationCheck($request){
        Validator::make($request->all(),[
            'name'=> 'required|min:4|unique:categories,name,'.$request->categoryId
        ],[
            'name.required' => 'Category Name Need to Fill . . . '
        ])->validate();
    }

    // Get Category Data
    private function getCategoryData($request){
        return[
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ];
    }

}
