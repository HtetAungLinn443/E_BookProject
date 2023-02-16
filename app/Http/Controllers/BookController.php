<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class BookController extends Controller
{
    //Book List
    public function bookList()
    {
        $data = Book::select('books.*', 'categories.name as category_name')
            ->when(request('key'), function ($query) {
                $query->orWhere('books.name', 'like', '%' . request('key') . '%');
            })
            ->leftJoin('categories', 'books.category_id', 'categories.id')
            ->orderBy('books.created_at', 'desc')
            ->paginate(5);
        $data->appends(request()->all());
        return view('admin.book.list', compact('data'));
    }

    // Create Page
    public function createPage()
    {
        $category = Category::select('id', 'name')->get();

        return view('admin.book.createPage', compact('category'));
    }

    //Create Book
    public function createBook(Request $request)
    {
        $this->bookValidation($request, 'create');
        $data = $this->getBookData($request);

        $fileName = uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public', $fileName);
        $data['image'] = $fileName;

        Book::create($data);
        return redirect()->route('admin#bookList');

    }

    // Delete Book
    public function deleteBook($id)
    {
        Book::where('id', $id)->delete();
        return redirect()->route('admin#bookList')->with(['deleteSuccess' => 'Delete Book Success']);
    }

    // detail page
    public function detailsBook($id)
    {
        $data = Book::select('books.*', 'categories.name as category_name')
            ->leftJoin('categories', 'books.category_id', 'categories.id')
            ->where('books.id', $id)->first();
        return view('admin.book.details', compact('data'));
    }

    // Edit Page
    public function editPage($id)
    {
        $data = Book::where('id', $id)->first();
        $category = Category::get();
        return view('admin.book.edit', compact('data', 'category'));
    }

    //update Book
    public function updateBook(Request $request)
    {

        $this->bookValidation($request, 'update');
        $data = $this->getBookData($request);

        if ($request->hasFile('image')) {
            $oldImageName = Book::where('id', $request->bookId)->first();
            $oldImageName = $oldImageName->image;

            if ($oldImageName != null) {
                Storage::delete('public' . $oldImageName);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $date['image'] = $fileName;
        }

        Book::where('id', $request->bookId)->update($data);
        return redirect()->route('admin#bookList')->with(['updateSuccess' => 'Book Update Success...']);
    }

    // Private Group
    // Book create Validation
    private function bookValidation($request, $action)
    {
        $validationRules = [
            'name' => 'required|unique:books,name,' . $request->bookId,
            'author' => 'required',
            'categoryId' => 'required',
            'description' => 'required',
            'downloadLink' => 'required',
        ];

        $validationRules['image'] = $action == 'create' ? 'required|mimes:jpg,png,jpeg,webp' : 'mimes:jpg,png,jpeg,webp';
        Validator::make($request->all(), $validationRules)->validate();
    }

    // Get Book Data
    private function getBookData($request)
    {
        return [
            'name' => $request->name,
            'author' => $request->author,
            'category_id' => $request->categoryId,
            'description' => $request->description,
            'link' => $request->downloadLink,
        ];
    }
}