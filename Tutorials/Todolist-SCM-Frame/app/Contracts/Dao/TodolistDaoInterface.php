<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;
use App\Models\Todolist;
/**
 * Interface of Data Access Object for Authentication
 */
interface TodolistDaoInterface
{
  public function index();

  public function store (Request $request);

  public function destroy (Todolist $todolist);
}
