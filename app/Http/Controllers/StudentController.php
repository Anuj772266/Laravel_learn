<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;


class StudentController extends Controller
{
    public function student(string $id)
    {
        return view('studentData', ['id' =>  $id]);
        //return view('studentData', compact('id'));
    }

    public function showBlog(){
        return view('blogData');
    }

    public function showStudent() {
        //$student = DB::select("select name, age from students where id = ?", [2]);
        // $student = DB::insert("insert into students(name, email, age, city) values (?, ?, ?, ?)", ['ram', 'ram@gmail.com', 24, 2]);
        // $student = DB::update("update students set email = 'test@gmail.com' where id = ?", [1]);
        // return $student;
        // $student = DB::delete("delete from students where id = ?", [1]);
        $student = DB::table('students')
        ->selectRaw('name, email')
        ->whereRaw('age > ? and name like ?' , [25, 'r%'])
        ->get();
        return $student;
        // $students = DB::table('students')
        //             ->join('cities', 'students.city',"=",'cities.id')
        //             ->get();
        //             return view('joinData', compact('students'));


    }

    public function union() {
        $employee = DB::table('employees')
        ->select('name', 'email', 'city_name')
        ->join('cities', 'employees.city', '=', 'cities.id')
        ->where('city_name', '=', 'karah');

        $student = DB::table('students')
        ->union($employee)
        ->select('name', 'email', 'city_name')
        ->join('cities', 'students.city', 'cities.id')
        ->where('city_name', '=', 'jaipur')
        ->get();
        return $student;
    }

    public function whenData(){
        $whendata = DB::table('students')
        ->when(false, function($query){
            $query->where('age', '>', 23);
        })
        ->get();
        return $whendata;
    }

    public function chunkData(){
        $chunks = DB::table('students')->orderBy('id')
        ->chunkById(3, function($chunks){
            echo "<div style='border:1px solid red; margin: bottom 15px;'>";
            foreach($chunks as $students){
                DB::table('students')
                ->where('id', $chunks->id)
                ->update(['status' => true]);
                // echo  $students->name. "<br>";
            }
            echo "</div>";
        });

        return $chunks;

    }
}

