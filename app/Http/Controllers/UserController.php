<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'users.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterUserRequest $request)
    {
        try {
            $user = new User();

            $registered_user = User::where( ['email'=>$request->email] )->first();

            if( !empty( $registered_user ) ) throw new Exception( "This email is already registered with another user" );

            $user->name          = $request->name;
            $user->email         = $request->email;
            $user->date_of_birth = $request->dob;
            $user->address       = $request->address;
            $user->password      = $request->password;
            $user->role          = $request->role;

            if( !is_null( $request->picture ) ){
                $image_crop_base_64 = $request->picture;
                $request->picture   = base64_decode( substr( $image_crop_base_64, strpos( $image_crop_base_64, "," ) + 1 ) );
    
                $valid_formats = array( "jpg", "png", "gif", "bmp", "jpeg" );

                $name = $_FILES['picture']['name'];
                $size = $_FILES['picture']['size'];
    
                $image_format = explode( ".", $name );
    
                if ( !strlen( $name ) ) throw new Exception( "Image with no name, or it did not load well" );
                if ( !in_array( $image_format[1], $valid_formats ) ) throw new Exception( 'Invalid file format on the photo..' );
                if ( $size > ( 3 * 1024 * 1024 ) ) throw new Exception( 'Image file size max 3 MB' );
    
                $name = time() . '_PROFILE_' . $name;
                Storage::disk( 'users' )->put( $name, $request->picture );

                $user->profile_picture = $name;
            }

            $user->save();

            echo 'user successfully registered!<br>';
            echo '<a href="' . route( 'users.create' ) . '">Register another User</a>';

        } catch (\Throwable $th) {

            $error = $th->getMessage();
            return view('errors.register', compact('error'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
