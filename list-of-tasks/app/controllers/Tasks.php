<?php
    class Tasks extends Controller{
        public function index(){
            $task = new Task();
            $taskList = $task->findAll();
            $this->view('tasks/index', [
                'tasks' => $taskList
            ]);
        }

        public function create(){
            $this->view('tasks/create');
        }

        public function edit(){
            $this->view('tasks/edit');
        }

        public function delete(){
            $this->view('tasks/delete');
        }
    }