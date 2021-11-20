<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use App\Models\Task;
use App\Models\Employee;
use App\Http\Traits\ApiResponse;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\AddEmployeeInOrganizationResource;
use App\Http\Request\EmployeeRequest;

class EmployeeController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $emp = Employee::get();
        if($emp)
        {
            return sendJson(EmployeeResource::collection($emp));
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function show(Request $request)
    {
        $emp = Employee::find($request->id);
        if($emp)
        {
            return sendJson(new EmployeeResource($emp));
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function addEmployeeInOrganization(Request $request)
    {
        $emp = Employee::where('id',$request->id)->update([
            'organization_id'=>$request->organization_id,
        ]);
        return $this->sendJson(new AddEmployeeInOrganizationResource($manger));
    }

    // public function store(EmployeeRequest $request)
    // {
    //     $emp = Employee
    // }
}
