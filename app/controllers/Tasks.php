<?php

class Tasks extends Controller {

    public function __construct() {
         $this->taskModel = $this->model('Task');
    }

    public function index() {

        $tasks = $this->taskModel->getTasks();
        // $this->taskModel->saveTasks();

        $data = [
            'title' => 'Welcome',
            'tasks' => $tasks
        ];

        $this->view('tasks/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'About us'
        ];
        $this->view('tasks/about', $data);
    }

    public function save() {

        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['title'] != '' and $_POST['description'] != ''){

            $tasks = $this->taskModel->getTasks();

            $data = [
                'title' => 'Welcome',
                'tasks' => $tasks,
                'error' => '',
                'task_title' => $_POST['title'],
                'task_desc' => $_POST['description']
            ];

            if($this->taskModel->saveTask($data)) {
                redirect('tasks/index');
            }

        } else {

            $tasks = $this->taskModel->getTasks();
            $error = 'Insert correct values';

            $data = [
                'title' => 'Welcome',
                'tasks' => $tasks,
                'error' => $error
            ];

            $this->view('tasks/index', $data);

        }
    }

    public function delete($id = null) {

            $task = $this->taskModel->getTaskById($id);

            if(!empty($task)){

                if($this->taskModel->deleteTask($task)) {
                    redirect('tasks/index');
                }

            } else {

                $tasks = $this->taskModel->getTasks();
                $error = 'Undefined variable';

                $data = [
                    'title' => 'Welcome',
                    'tasks' => $tasks,
                    'error' => $error
                ];

                $this->view('tasks/index', $data);
            }
    }

}
