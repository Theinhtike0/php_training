<?php 
    
     namespace App\Services\TodolistService;

     use App\Contracts\Dao\TodolistDaoInterface;
     use App\Contracts\Services\TodolistServiceInterface;
     use Illuminate\Http\Request;
     use App\Models\Todolist;

     class TodolistService implements TodolistServiceInterface
     {
          private $TodolistDao;

          public function __construct(TodolistDaoInterface $TodolistDao)
      {
          $this->TodolistDao = $TodolistDao;
      }
        public function index()
        {
          return $this->TodolistDao->index();
        }
        public function store (Request $request)
        {
          return $this->TodolistDao->store($request);
        }

        public function destroy (Todolist $todolist)
        {
          return $this->TodolistDao->destroy($todolist);
        }
     }