<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $application = Application::paginate(3);
        $category = Category::all();
        return view('admin', ['application' => $application, 'category' => $category]);
    }

    public function course_create(Request $request)
    {
        $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "duration" => "required|integer",
            "cost" => "required|integer",
            "image" => "required",
        ], [
            "title.required" => "Это поле обязательно",
            "description.required" => "Это поле обязательно",
            "duration.required" => "Это поле обязательно",
            "duration.integer" => "Данные могут быть только числами",
            "cost.required" => "Это поле обязательно",
            "cost.integer" => "Данные могут быть только числами",
            "image.required" => "Обязательное поле для заполнения   ",
        ]);
        $course_info = $request->all();
        $file = $request->file("image");
        $file_name = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move(public_path('image'), $file_name);
        Course::create([
            "title" => $course_info["title"],
            "description" => $course_info["description"],
            "duration" => $course_info["duration"],
            "cost" => $course_info["cost"],
            "image" => $file_name,
            "category_id" => $course_info["category"],
        ]);
        return redirect("/admin_panel");
    }
}