<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Course;
use App\Models\Category;

class ApplicationController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('application', ['courses' => $courses]);
    }
    public function chech_appl(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "name" => "required|max:50",
        ], [
            "email" => "Это поле обязательно",
            "email.email" => "Такой почты не существует",
            "name.required" => "Это поле обязательно",
            "name.max" => "Имя слишком длинное",
        ]);

        $application_info = $request->all();
        Application::create([
            "email" => $application_info["email"],
            "name" => $application_info["name"],
            "course_id" => $application_info["course"],
        ]);

        return redirect("/")->with([
            "alert" => "Заявка отправлена!!"
        ]);
    }

    public function confirm($id_application){
        $application = Application::find($id_application);
        $application->is_confirm = 2;
        $application->save();
        return redirect("/admin_panel");
    }
    public function NotConfirm($id_application){
        $application = Application::find($id_application);
        $application->is_confirm = 1;
        $application->save();
        return redirect("/admin_panel");
    }
}