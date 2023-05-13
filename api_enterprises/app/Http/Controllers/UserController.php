<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::paginate(20));
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function store(UserRequest $request)
    {
        User::create($request->validated());

        return response()->json("User Created");
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return response()->json("User Updated");
    }

    public function destroy(User $user)
    {
        $user->enterprises()->delete();
        $user->delete();

        return response()->json("User Deleted");
    }

    public function deleteAll()
    {
        User::query()->delete();

        return response()->json("All Users Deleted");
    }
}
