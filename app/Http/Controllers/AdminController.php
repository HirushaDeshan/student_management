<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lessons;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function AddCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'instructorId' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        try {
            Course::create([
                'title' => $request->input('title'),
                'category' => $request->input('category'),
                'description' => $request->input('description'),
                'instructorId' => $request->input('instructorId'),
            ]);

            return redirect()->back()->with('message', 'Course added successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['Something Went Wrong']);
        }
    }

    public function AddLessons(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'courseId' => 'required',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        try {

            Lessons::create([
                'courseId' => $request->input('courseId'),
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            ]);

            return redirect()->back()->with('message', 'Lessons added successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['Something Went Wrong']);
        }
    }
}
