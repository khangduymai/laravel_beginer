<?php

namespace App\Objects;
use App\Objects\Project;

class Student{

    //Create private data fields
    private $id;
    private $name;
    private $email;
    private $phone;
    //create projects array list variable
    private $projects = [];    

    //create a constructor
    public function __construct(int $id, string $name, string $email, string $phone) {
        $this->id = $id;
        $this->name= $name;
        $this->email= $email;
        $this->phone= $phone;
    } // end construct

    public function addProject(Project $newProject) {
        $this->projects[] = $newProject;
    }

        public function getID()
        {
        return $$id;
        }

        public function getName()
        {
        return $name;
        }

        public function getEmail()
        {
        return $email;
        }

        public function getPhone()
        {
        return $phone;
        }

        public function getProjectName()
        {
        return $projectName;
        }

        public function setName(string $name)
        {
            $this->name = $name;
        }

        public function setEmail(string $mail)
        {
            $this->mail = $mail;
        }

        public function setPhone(string $phone)
        {
            $this->phone = $phone;
        }

        public function setProjectName(string $projectName)
        {
            $this->projectName = $projectName;
        }

         public function setID(int $id)
        {
            $this->id = $id;
        }

        public function toArray(){
            // list of project array
            $projectsArray = [];

            foreach ($this->projects as $project) {
                $projectsArray[] = $project->toProjectArray();
            }
            /*
            [
                person0: {
                    jobs: [
                        job0: {},
                        job1: {}
                    ]
                },
                person1: {
                    jobs: [
                        job0: {},
                        job1: {}
                    ]
                },
                ...
            ]

            RULE: objiect -> Array -> JSON
            */
            return
            [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'projects' => $projectsArray
            ];
        }

} // end class Student