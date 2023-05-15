<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class EmployeController extends Controller
{

    public function index()
    {
        $emp = Employe::all();

        return response()->json($emp);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'position' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        $emp = new Employe();
        $emp->name = $request->name;
        $emp->position = $request->position;
        $emp->email = $request->email;
        $emp->password = Hash::make($request->password);
        $emp->save();

        return response()->json('recorded succesfuly');
    }

    public function getEmploye($id)
    {
        $emp = Employe::findOrFail($id);
        return response()->json($emp);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'position' => ['required'],
            'email' => ['required']
        ]);

        $emp = Employe::findOrFail($id);
        $emp->name = $request->name;
        $emp->position = $request->position;
        $emp->email = $request->email;
        $emp->save();
    }

    public function delete($id)
    {
        $emp = Employe::find($id);
        $emp->delete();
        return response()->json("record Deleted");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ],
        [
            'email.required' => "email field is required",
            'password.required' => "password filed is required"
        ]);
     
        $user = Employe::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        return $user->createToken($request->device_name)->plainTextToken;
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json("Logout successfully");
    }
}



