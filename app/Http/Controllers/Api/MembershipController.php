<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\Membership;
use App\Http\Traits\ApiResponse;
use App\Http\Request\MembershipRequest;
use App\Http\Resources\MembershipResource;

class MembershipController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $membership = Membership::get();
        if($membership){
            return sendJson(MembershipResource::collection($membership));
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function show(Request $request)
    {
        $membership = Membership::find($reques->id);
        if($membership)
        {
            return sendJson(new MembershipResource($membership));
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function store(MembershipRequest $request)
    {
        $membership = Membership::create([
            'name' => $reques->name,
            'price' => $reques->price,
            'description' => $reques->description,
            'duration' => $reques->duration,
            'status' => $reques->status,
        ]);
        return sendJson(new MembershipResource($membership));
    }

    public function update(MembershipRequest $request)
    {
        $membership = Membership::find($request->id);
        if($membership)
        {
            $membership->update($request->all());
            return sendJson(new MembershipResource($membership));
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function destroy(Request $request)
    {
        $membership = Membership::find($request->id);
        if($membership)
        {
            $membership->delete();
            return 'Deleted Succssfully';
        }
        throw new \App\Exceptions\NotFoundException;
    }
}
