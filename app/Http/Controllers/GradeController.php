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

        return response()->json(
            [
                'letter' => $letter
            ]
        );
    }

    public function checkGradeSubmit(Request $request) {
        // dd($request);

        /*
        using $reques->query for GET method
        $grade = $request->query('grade');
        */

        /*
        using $reques->input for POST method
        */
        $grade = $request->input('grade');

        if (!is_numeric($grade)) {
            return view('error', 
                ['message' => 'Grade must be number.']
            );
        }
        
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
            ['letterGrade' => $letter, 'yourScore' => $grade]
        );
    }
}
