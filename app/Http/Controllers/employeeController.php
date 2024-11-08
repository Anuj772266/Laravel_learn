<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        $employee = DB::table('employees')
                            ->insert(
                                [
                                'name' => $req->username,
                                'email' => $req->useremail,
                                'age' => $req->userage,
                                'city' => $req->usercity,
                                'created_at' => now(),
                                'updated_at' => now()
                            ]
                        );
                    if($employee){
                        return redirect()->route('home');
                        //echo "<h2>Data Successful Add</h2>";
                    }else{
                        echo "<h2>Data Not Successful Add</h2>";
                    }

                            // $employee = DB::table('employees')->upsert(
                            //     [
                            //         [
                            //             'name' => "Gaurav Kumar",
                            //             'email' => 'gaurav@gamil.com',
                            //             'age' => 23,
                            //             'city' => 'Bihar',
                            //             'created_at' => now(),
                            //             'updated_at' => now()
                            //         ]
                            //     ],
                            //     ['email']
                            // );

                        // if($employee){
                        //     echo "Data is Successful Add";
                        // }else{
                        //     echo "Data is not add";
                        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    public function show()
    {
        $employees = DB::table('employees')
        ->orderBy('id')
        ->cursorPaginate(5);
        //->Paginate(4)

        // ->select('city')
        // ->distinct()
        //->where('city', ['jaipur'])
        // ->orderBy('name', 'asc')
         //->limit(3)
        // ->offset(2)

        // ->max('age')
        //->min('age');
        // ->inRandomOrder()
        // ->first();
       // ->pluck('city');
        // $employees = DB::table('employees')->find(2);
        //return $employees;
        //dd($employees);
        //dump($employees);
        // return $employees;
         return view('employeeData', ['data' => $employees]);
    }
        public function singleEmploy(string $id){
            $single = DB::table('employees')
            ->where('id', $id)
            ->get();
            return view('single_emp', ['data' => $single]);
        }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

     public function updatepage(string $id){
        // $updatepage = DB::table('employees')
        // ->where('id', $id)
        // ->get();
        $updatepage = DB::table('employees')->find($id);
        //return $updatepage;
        return view('updateEmployee', ['data' => $updatepage]);
     }
    public function update(Request $req, $id)
    {
        $employeee = DB::table('employees')
            ->where('id', $id)
            ->update([
                'name' => $req->username,
                'email' => $req->useremail,
                'age' => $req->userage,
                'city' => $req->usercity,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            if($employeee){
                return redirect()->route('home');
                //echo "Successful Updated";
            }else{
                echo "Data is not updated";
            }
        }




    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $delete = DB::table('employees')
                        ->where('id', $id)
                        ->delete();

        if($delete){
           return redirect()->route('home');
        }
    }
}
