<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Task;
use App\Http\Traits\ApiResponse;
use App\Http\Resources\OrganizationResource;
use App\Http\Resources\AssignOrgabiztionResource;
use App\Http\Request\OrganizationRequest;
class OrganizationController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $org = Organization::get();
        if($org)
        {
            return sendJson(OrganizationResource::collection($org));
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function show(Request $request)
    {
        $org = Organization::find($request->id)->first();
        if($org)
        {
            return sendJson(new OrganizationResource($org));
        } 
        throw new \App\Exceptions\NotFoundException;
    }

    public function store(OrganizationRequest $request)
    {
        $org = Organization::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'manager_id' => $request->manager_id,
        ]);
        return sendJson(new OrganizationResource($org));
    }

    public function update(OrganizationRequest $request)
    {
        $org = Organization::find($request->id)->first();
        if($org)
        {
            $org->update([$request->all()]);
            return sendJson(new OrganizationResource($org));
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function destroy(Request $request)
    {
        $org = Organization::find($request->id)->first();
        if($org)
        {
            $org->delete();
            return 'Deleted Successfully';
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function active(Request $request)
    {
        $org = Organization::find($request->id);
        if($org->status == 0)
        {
            $org->update(['status'=>1]);
            return sendJson(new OrganizationResource($org));
        }
        throw new \App\Exceptions\NotFoundException;
    }
    public function inActive(Request $request)
    {
        $org = Organization::find($request->id);
        if($org->status == 1)
        {
            $org->update(['status'=>0]);
            return 'InActive Organization';
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function assignOrganizationToManager(Request $request)
    {
        $org = Organization::where('id',$request->id)->update([
            'manager_id'=>$request->manager_id,
        ]);
        return $this->sendJson(new AssignOrgabiztionResource($manger));
    }


}
