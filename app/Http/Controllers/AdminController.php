<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function listCourses()
    {
        return view('admin.list-courses');
    }

    public function createCourses()
    {
        return view('admin.create-courses');
    }

    public function detailCourses($id)
    {
        $course = Course::where('id', $id)->first();
        return view('admin.detail-courses', compact('course'));
    }

    public function editCourses($id)
    {
        $course = Course::where('id', $id)->first();
        return view('admin.edit-courses', compact('course'));
    }

    public function listProducts()
    {
        return view('admin.list-products');
    }

    public function createProducts()
    {
        $courses = Course::all();
        return view('admin.create-products', compact('courses'));
    }

    public function detailProducts($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.detail-products', compact('product'));
    }

    public function editProducts($id)
    {
        $courses = Course::all();
        $product = Product::where('id', $id)->first();
        return view('admin.edit-products', compact('product', 'courses'));
    }

    public function listTransactions()
    {
        return view('admin.list-transactions');
    }

    public function detailTransactions($no_transactions)
    {
        $transaction = Transaction::where('no_transactions', $no_transactions)->first();
        return view('admin.detail-transactions', compact('transaction'));
    }

    public function listUsers()
    {
        return view('admin.list-users');
    }

    public function detailUsers($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.detail-users',compact('user'));
    }
}
