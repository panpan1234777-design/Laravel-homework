<?php
namespace App\Repositories\Batch;

interface BatchRepositoryInterface
{
    public function index();
    public function show($id);
    public function store($data);

}
