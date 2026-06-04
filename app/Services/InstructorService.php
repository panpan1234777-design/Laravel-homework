<?php
namespace App\Services;
use App\Repositories\Instructor\InstructorRepositoryInterface;

class InstructorService
{
    protected $instructorRepository;
    public function __construct(InstructorRepositoryInterface $instructorRepository)
    {
        $this->instructorRepository = $instructorRepository;
    }
    public function instructorTotal()
    {
        $instructors = $this->instructorRepository->index();
        return $instructors->count();
    }
}
