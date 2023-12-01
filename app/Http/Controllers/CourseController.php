<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseImage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'images' => 'required',
            'email_owner' => 'required'
        ]);

        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'email_owner' => $request->email_owner
        ]);

        foreach ($request->images as $image) {
            $name = $image->hashName();
            $image->storeAs('ImageCourse', $name);
            CourseImage::create([
                'course_id' => $course->id,
                'name' => $name
            ]);
        }

        return redirect()->route('adminListCourses');
    }

    public function deleteImage($id)
    {
        $image = CourseImage::where('id', $id)->first();
        Storage::delete('ImageCourse/' . $image->name);
        $image->delete();
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'email_owner' => 'required'
        ]);

        Course::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'email_owner' => $request->email_owner
        ]);

        if ($request->images) {
            foreach ($request->images as $image) {
                $name = $image->hashName();
                $image->storeAs('ImageCourse', $name);
                CourseImage::create([
                    'course_id' => $id,
                    'name' => $name
                ]);
            }
        }

        return redirect()->route('adminListCourses');
    }

    public function delete($id)
    {
        $images = CourseImage::where('course_id', $id)->get();
        foreach ($images as $image) {
            Storage::delete('ImageCourse/' . $image->name);
            $image->delete();
        }
        $products = Product::where('course_id', $id)->get();
        if ($products) {
            foreach ($products as $product) {
                foreach ($product->subscribes as $subscribe) {
                    $subscribe->delete();
                }
                $product->delete();
            }
        }
        Course::where('id', $id)->delete();
        return redirect()->route('adminListCourses');
    }
}
