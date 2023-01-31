<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tenant;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

  public function registerEmployee(Request $request)
  {
      $data = $request->all();
      Log::debug($data);

      $validator = Validator::make($data, [
          'first_name' => 'required|max:45',
          'last_name' => 'required|max:45',
          'email' => 'email|required|unique:users',
          'gender' => 'required|max:1',
          'contact_number' => 'required|max:20',
          'password' => 'required|confirmed'
      ]);

      if($validator->fails()) {
        return response(['error' => $validator->errors(), 'Validation Error']);
      }

      $data['password'] = bcrypt($data['password']);

      $user = User::create($data);

      $employee = Employee::create($data);

      $accessToken = $user->createToken('authToken')->accessToken;

      return response(['user' => $user,'employee' => $employee, 'access_token' => $accessToken]);
  }

  public function registerTenant(Request $request)
  {
      $data = $request->all();
      Log::debug($data);

      $validator = Validator::make($data, [
          'first_name' => 'required|max:45',
          'last_name' => 'required|max:45',
          'email' => 'email|required|unique:users',
          'gender' => 'required|max:1',
          'contact_number' => 'required|max:20',
          'occupation' => 'max:65',
          'birthday' => 'required|max:45',
          'password' => 'required|confirmed'
      ]);

      if($validator->fails()) {
        return response(['error' => $validator->errors(), 'Validation Error']);
      }

      $data['password'] = bcrypt($data['password']);

      $user = User::create($data);

      $tenant = new Tenant($data);

      $tenant->user()->associate($user);

      $tenant->save();

      $accessToken = $user->createToken('authToken')->accessToken;

      return response(['user' => $user,'tenant' => $tenant, 'access_token' => $accessToken]);
  }

  public function login(Request $request)
  {
      $loginData = $request->validate([
          'email' => 'email|required',
          'password' => 'required'
      ]);

      if (!auth()->attempt($loginData)) {
          return response(['message' => 'Invalid Credentials']);
      }

      $accessToken = auth()->user()->createToken('authToken')->accessToken;

      return response(['user' => auth()->user(), 'access_token' => $accessToken]);
  }
}
