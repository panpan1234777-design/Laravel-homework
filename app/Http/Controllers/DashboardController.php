<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Category;
use App\Models\Instructor;
use App\Models\Student;
use App\Services\BatchService;
use App\Services\InstructorService;
use App\Services\StudentService;
use App\Services\CategoryService;

class DashboardController extends Controller
{
    protected $batchService;
    protected $studentService;
    protected $instructorService;
    protected $categoryService;

    public function __construct(StudentService $studentService,BatchService $batchService,InstructorService $instructorService,CategoryService $categoryService)
    {
        $this->studentService = $studentService;
        $this->batchService = $batchService;
        $this->instructorService = $instructorService;
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $studentTotal = $this->studentService->studentTotal();
        $batchTotal = $this->batchService->batchTotal();
        $instructorTotal = $this->instructorService->instructorTotal();
        $categoryTotal=$this->categoryService->categoryTotal();
        return view('dashboard', [
            'totalStudents'    => $studentTotal,
            'totalBatches'     => $batchTotal,
            'totalCategories'  => $categoryTotal,
            'totalInstructors' => $instructorTotal,
            'recentBatches'    => Batch::latest()->take(5)->get(),
            'recentStudents'   => Student::latest()->take(5)->get(),
        ]);
    }
}
