<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::all();
        $courses = Course::where("category_id", $id)->paginate(3);
        return view("index", ["courses" => $courses], ["category" => $category]);
    }
    public function create(Request $request)
    {

        $request->validate([
            "title" => "required|string",
        ], [
            "title.required" => "Поле обязательно к заполнению",
            "title.string" => "Только строковые значения",
        ]);
        $category_info = $request->all();
        Category::create([
            "title" => $category_info["title"],
        ]);
        return redirect("/admin_panel");
    }
}