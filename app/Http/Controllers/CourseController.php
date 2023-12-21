<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;

class CourseController extends Controller
{
    public function index(){
        // обозначаем пагинацию в 3 блока
        $courses = Course::paginate(3);

        // получаем все категории из БД
        $category = Category::all();
        
        // маршрутизация на страницу index, так же передача двух переменных $courses и $category
        return view("index",["courses"=>$courses], ["category"=>$category]);
    }
}
