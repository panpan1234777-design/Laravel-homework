<?php
namespace App\Repositories\Student;

interface StudentRepositoryInterface
{
    public function index();
    public function show($id);
    public function store($data);
    public function getBatches();
}
