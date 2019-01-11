<?php

    class Task {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getTasks(){
            $this->db->query('SELECT * FROM tasks');

            $results = $this->db->resultSet();
            return $results;
        }

        public function saveTask($data){

            $this->db->query('INSERT INTO tasks (title, description) VALUES (:title, :description)');

            $this->db->bind(':title', $data['task_title']);
            $this->db->bind(':description', $data['task_desc']);

            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getTaskById($id){
            $this->db->query('SELECT * FROM tasks WHERE id = :id');

            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }

        public function deleteTask($task){

            $this->db->query('DELETE FROM tasks WHERE id=:id');

            $this->db->bind(':id', $task->id);

            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }



    }
