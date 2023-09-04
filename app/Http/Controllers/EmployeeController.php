<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeController extends Controller
{
    public function index()
    {
        try {
            $data = Employee::orderBy('id', 'desc')->get();
            return response()->json([
                "success" => 1,
                "message" => "Show data success",
                "data"    => EmployeeResource::collection($data)
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                "success" => 0,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage()
            ], 500);
        }
    }
    
    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(),[
                'name'        => 'required|string',
                'job_title'   => 'required|string',
                'salary'      => 'required|integer',
                'department'  => 'required|string',
                'joined_date' => 'required|date', //format: yyyy-mm-dd
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'success' => 0,
                    'message' => $validate->messages()->all(),
                ], 422);
            }
            
            Employee::create($request->all());
            return response()->json([
                "success" => 1,
                "message" => "Create success",
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                "success" => 0,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage()
            ], 500);
        }
    }
    
    public function update(Request $request, Employee $employee)
    {
        try {
            $validate = Validator::make($request->all(),[
                'name'        => 'required|string',
                'job_title'   => 'required|string',
                'salary'      => 'required|integer',
                'department'  => 'required|string',
                'joined_date' => 'required|date', //format: yyyy-mm-dd
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'success' => 0,
                    'message' => $validate->messages()->all(),
                ], 422);
            }
            
            $employee->name        = $request->name;
            $employee->job_title   = $request->job_title;
            $employee->salary      = $request->salary;
            $employee->department  = $request->department;
            $employee->joined_date = $request->joined_date;
            $employee->save();
            
            return response()->json([
                "success" => 1,
                "message" => "Update success",
                "data"    => new EmployeeResource($employee)
            ]);
            
        } catch (\Throwable $th) {
            return response()->json([
                "success" => 0,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage()
            ], 500);
        }
    }

    public function detail($id) 
    {
        try {
            $data = Employee::findOrFail($id);
            
            return response()->json([
                "success" => 1,
                "message" => "Detail employee",
                "data"    => new EmployeeResource($data)
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                "success" => 0,
                'message' => 'Data tidak ditemukan!',
            ], 404);
            
        } catch (\Throwable $th) {
            return response()->json([
                "success" => 0,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage()
            ], 500);
        }
    }
    
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return response()->json([
                "success" => 1,
                "message" => "Delete success",
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "success" => 0,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage()
            ], 500);
        }
    }
}
