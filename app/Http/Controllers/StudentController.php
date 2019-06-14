<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objects\Student;
use App\Objects\Project;

use Faker;

class StudentController extends Controller
{
    public function generateStudents(int $amount =10){

        $faker = Faker\Factory::create();

        $students = [];

        for($i = 0; $i < $amount; $i++){
            $students[$i+1] = new Student($i+1, $faker->name, $faker->email, $faker->phoneNumber, $faker->sentence(5));
            
            for($v=0; $v<$amount; $v++){
                $projects[$v+1] = new Project($v+1,$faker->sentence(5));
                $students[$i+1]->addProject($projects[$v+1]);
            }
        }
         return $students;
    } //end generateStudents

    /*
    public function generateProjects(int $amount =10){
        $faker = Faker\Factory::create();
        $projects = [];
        for($i=0; $i<$amount; $i++){
            $projects[$i+1] = new Project($i+1,$faker->sentence(5));
        }
        return $projects;
    } //end generateProjects
    */

    

    public function getStudent(int $id) {
        $students = $this->generateStudents();
        if ($id < 0 || $id > count($students)) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        return response()->json($students[$id]->toArray());
    }
}