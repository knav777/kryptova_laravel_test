<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table( 'students' )->simplePaginate( 5 );

        return view( 'students.index', ['students' => $students] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'students.register' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate( ['first_name'=>'required'] );

            $student = new Student();

            $student->first_name = $request->first_name;
            $student->last_name  = $request->last_name;
            $student->address    = $request->address;

            $student->save();

            echo 'Student successfully registered!<br><br>';
            echo '<a href="' . route( 'students.index' ) . '">Index</a>';

        } catch (\Throwable $th) {

            $module = 'students';
            $error = $th->getMessage();
            return view('errors.register', compact( 'error', 'module') );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $student = Student::find( $id );

            if( !empty( $student ) ){
                return view( 'students.update', compact( 'student' ) );
            }
    
            return redirect()->route( 'students.index' );
        }
        catch (\Throwable $th) {

            $module = 'students';
            $error = $th->getMessage();
            return view('errors.register', compact( 'error', 'module') );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate( ['first_name'=>'required'] );

            $student = Student::find( $id );

            $student->first_name = $request->first_name;
            $student->last_name  = $request->last_name;
            $student->address    = $request->address;

            $student->save();

            echo 'Student successfully updated!<br><br>';
            echo '<a href="' . route( 'students.index' ) . '">Index</a>';
        } catch (\Throwable $th) {

            $module = 'students';
            $error = $th->getMessage();
            return view('errors.register', compact( 'error', 'module') );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try{
            $student = Student::find( $id );

            if( !empty( $student ) ){
                $student->delete();
                echo 'student successfully deleted!<br><br>';
                echo '<a href="' . route( 'students.index' ) . '">Index</a>';
            }
            else{
                
                return redirect()->route( 'students.index' );
            }
    
        }
        catch (\Throwable $th) {

            $module = 'students';
            $error = $th->getMessage();
            return view('errors.register', compact( 'error', 'module') );
        }

    }
}
