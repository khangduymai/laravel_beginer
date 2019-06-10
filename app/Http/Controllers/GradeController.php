<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function checkGrade(int $grade){
        if($grade >= 90){
            $letter = 'A';
        }
        elseif($grade >= 80){
            $letter = 'B';
        }
        elseif($grade >= 70){
            $letter = 'C';
        }
        else{
            $letter = 'F';
        }

        return view('grade/letterGrade',
        [
            'letterGrade' => $letter,
            'yourScore' => $grade
        ]);

    }
}
