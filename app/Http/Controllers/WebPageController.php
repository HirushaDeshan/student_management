<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Exception;
use Illuminate\Http\Request;

class WebPageController extends Controller
{
    //
    public function Home()
    {

        try {
            return view('welcome');
        } catch (Exception $e) {
            return redirect('/maintenance');
        }
    }

    public function Registration()
    {
        try {
            return view('registration');
        } catch (Exception $e) {
            return redirect('/maintenance');
        }
    }

    public function Login()
    {
        try {
            return view('login');
        } catch (Exception $e) {
            return redirect('/maintenance');
        }
    }

    public function Dashboard()
    {
        try {
            return view('user.home');
        } catch (Exception $e) {
            return redirect('/maintenance');
        }
    }

    public function Maintenance()
    {
        return view('maintenance');
    }

    public function AdminDashboard()
    {

        // Course::factory()->count(5)->create();
        try {
            $courses = Course::with(['lessons:id,courseId'])
                ->get();

            // return $course;
            return view('admin.home', compact('courses'));
        } catch (Exception $e) {
            return redirect('/maintenance');
        }
    }
}
