<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function index()
    {
      $comments = User::active()->get();
      return response()->json($comments);
    }

    /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
    public function show($id)
    {
      $user = User::findOrFail($id);
      return response()->json($user);
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
      $user = User::findOrFail($id);

      $validator = Validator::make($request->all(), [
        'first_name' => 'required|max:45',
        'last_name' => 'required|max:45',
        'gender' => 'required|max:1',
        'contact_number' => 'max:20',
        'occupation' => 'max:65',
        'birthday' => 'max:45',
        'password' => 'confirmed',
        'role' => 'required|max:1'
      ]);

      if($validator->fails()) {
          return response(['error' => $validator->errors(), 'Validation Error']);
      }

      $user->first_name = $request->get('first_name');
      $user->last_name = $request->get('last_name');
      $user->gender = $request->get('gender');
      $user->contact_number = $request->get('contact_number');
      $user->occupation = $request->get('occupation');
      $user->birthday = $request->get('birthday');
      $user->password = $request->get('password');

      $user->save();

      return response()->json($user);
    }

    /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
    public function destroy($id)
    {
      $comment = User::findOrFail($id);
      $comment->delete();

      return response()->json($comment::all());
    }
}
