<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function create()
    {
        return view('students.register');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'room_num' => 'required|string|max:100',
            'index_num' => 'required|string|max:100',
            'receipt_num' => 'required|string|max:100',
            'hall_name' => 'required|string|max:100',
            'student_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('student_image')) {
                $image = $request->file('student_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                
                // Store image in public/student_images directory
                $imagePath = $image->storeAs('student_images', $imageName, 'public');
                
                // Full path for database
                $fullImagePath = 'storage/' . $imagePath;
            }

            // Create student record
            $student = Student::create([
                'name' => $request->name,
                'room_num' => $request->room_num,
                'index_num' => $request->index_num,
                'receipt_num' => $request->receipt_num,
                'hall_name' => $request->hall_name,
                'image_path' => $fullImagePath
            ]);

            return redirect()->back()->with('success', 'Student registered successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error registering student: ' . $e->getMessage());
        }
    }
}