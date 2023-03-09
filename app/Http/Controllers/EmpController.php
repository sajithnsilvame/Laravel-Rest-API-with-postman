<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Employee::all();
        return response($emp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input_emp_data = $request->all();

        $validate = Validator::make($input_emp_data, [
            'name' => 'required',
            'age' => 'required',
            'salary' => 'required'
        ]);

        if($validate->fails()){
            return $this->sendError('validation is not success', $validate->errors());
        }
        else{
            $emp = Employee::create($input_emp_data);
            return response()->json([
                'status' => 'success',
                'message' => 'employee data was created',
                'employee' => $emp
            ],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp = Employee::findOrFail($id);
        return response($emp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $emp = Employee::find($id);
        $emp->name = $request->name;
        $emp->age = $request->age;
        $emp->salary = $request->salary;
        $emp->save();

        return response()->json([
            'status' => 200,
            'message' => 'data was updated',
            'employee' => $emp
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $emp = Employee::findOrFail($id);
        $emp->delete();

        return response()->json([
            'status' => 200,
            'message' => 'data was deleted',
            'employee' => $emp
        ],200);
    }
}
