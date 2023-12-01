<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(3);
        return view('home.index', compact('courses'));
    }

    public function detailCourse($id)
    {
        $course = Course::findOrFail($id);
        return view('home.detail-course', compact('course'));
    }

    public function detailChoosenCourse($id)
    {
        $product = Product::findOrFail($id);
        return view('home.detail-product', compact('product'));
    }

    public function courses()
    {
        return view('home.courses');
    }

    public function transactions()
    {
        return view('home.transactions');
    }

    public function aboutWe()
    {
        return view('home.about-we');
    }

    public function profile()
    {
        $course = Course::where('email_owner','like' , '%' . auth()->user()->email . '%')->first();
        if($course)
        {
            return view('admin.owner-dashboard');
        }else{
            return view('home.profile');
        }
    }
}
