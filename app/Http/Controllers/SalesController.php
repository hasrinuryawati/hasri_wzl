<?php

namespace App\Http\Controllers;

use App\Http\Resources\SalesResource;
use App\Models\Employee;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => 'login']);
    }
    
    public function index()
    {
        try {
            $data = Sales::orderBy('id', 'desc')->get();
            return response()->json([
                "success" => 1,
                "message" => "Show data success",
                "data"    => SalesResource::collection($data)
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
                'employee_id' => 'required|integer',
                'sales'       => 'required|integer',
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'success' => 0,
                    'message' => $validate->messages()->all(),
                ], 422);
            }

            $employee = Employee::find($request->employee_id);
            if (!$employee) {
                return response()->json([
                    "success" => 0,
                    'message' => 'Data tidak ditemukan!',
                ], 404);
            }
            
            Sales::create($request->all());
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

    public function update(Request $request, Sales $sales)
    {
        try {
            $validate = Validator::make($request->all(),[
                'employee_id' => 'required|integer',
                'sales'       => 'required|integer',
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'success' => 0,
                    'message' => $validate->messages()->all(),
                ], 422);
            }
            
            $sales->employee_id = $request->employee_id;
            $sales->sales       = $request->sales;
            $sales->save();
            
            return response()->json([
                "success" => 1,
                "message" => "Update success",
                "data"    => new SalesResource($sales)
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
            $data = Sales::findOrFail($id);
            
            return response()->json([
                "success" => 1,
                "message" => "Detail employee",
                "data"    => new SalesResource($data)
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

    public function destroy(Sales $sales)
    {
        try {
            $sales->delete();
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
