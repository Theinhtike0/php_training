<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;
use App\Models\Todolist;
/**
 * Interface for authentication service.
 */
interface TodolistServiceInterface
{
  public function index();

  public function store (Request $request);

  public function destroy (Todolist $todolist);
}
