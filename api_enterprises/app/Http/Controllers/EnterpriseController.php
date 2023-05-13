<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnterpriseRequest;
use App\Models\Enterprise;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\V1\EnterpriseResource;

class EnterpriseController extends Controller
{
    public function index()
    {
        return EnterpriseResource::collection(Enterprise::paginate(20));
    }

    public function show(Enterprise $enterprise)
    {
        return new EnterpriseResource($enterprise);
    }

    public function store(EnterpriseRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $user = User::create($request->only(['name', 'email', 'password']));
            $user->enterprises()->create($request->only(['enterprise_name' => 'name', 'description', 'city']));

            return response()->json("Enterprise Created");
        }
    }

    public function update(EnterpriseRequest $request, Enterprise $enterprise)
    {
        $validated = $request->validated();

        if ($validated) {
            $user = User::find($enterprise->user_id);

            $enterprise->user()->associate($user)->save();
            $enterprise->update($request->only(['enterprise_name' => 'name', 'description', 'city']));

            return response()->json("Enterprise Updated");
        }
    }

    public function destroy(Enterprise $enterprise)
    {
        $enterprise->delete();

        return response()->json("Enterprise Deleted");
    }

    public function deleteAll()
    {
        Enterprise::query()->delete();

        return response()->json("All Enterprises Deleted");
    }
}
