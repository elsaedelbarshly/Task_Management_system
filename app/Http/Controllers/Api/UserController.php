<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\User_Type;
use App\Models\User;
use App\Http\Traits\ApiResponse;
use App\Http\Resources\UserResource;
use App\Http\Request\UserRequest;
class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        if($user)
        {
            return sendJson(UserResource::collection($user));
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function show(Request $request)
    {
        $user = User::find($request->id);
        if($user)
        {
            return sendJson(new UserResource($user));
        }   
        throw new \App\Exception\NotFoundExcption;
    }

    public function update(UserRequest $request)
    {
        $user = User::find($request->id);
        if($user)
        {
            $user->update([$request->all()]);
        }
        throw new \App\Exception\NotFoundExcption;
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if($user)
        {
            $user->delete();
            return 'Deleted Succssefuly';
        }
        throw new \App\Exception\NotFoundExcption;
    }

    public function active(Request $request)
    {
        $user = User::find($request->id);
        if($usre->status == 0)
        {
            $user->update(['status'=>1]);
            return sendJson(new UserResource($user));
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function inActive(Request $request)
    {
        $user = User::find($request->id);
        if($usre->status == 1)
        {
            $user->update(['status'=>0]);
            return sendJson(new UserResource($user));
        }
        throw new \App\Exceptions\NotFoundException;
    }
}
