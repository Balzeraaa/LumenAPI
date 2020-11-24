<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

Class UserController extends Controller
{

    public function getAll(){
        try{
            $user = User::all();
            return response()->json($user, 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function get($id)
    {
        try{
            $user = User::findOrFail($id);
            return response()->json($user, 200);
        }catch(\Exception $e){
            return response()->json("Usuario inexistente", 400);
        }
    }

    public function create(Request $request)
    {
        try{
            $user = User::create($request->all());
            return response()->json($user, 201);
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, $id){
        try{
            $user = User::where('id', $id)->update($request->all());
            $user = User::findOrFail($id);
            return response()->json($user, 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($id){
        try{
            $user = User::findOrFail($id);
            User::where('id', $id)->delete();
            return response()->json($user, 200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }



}