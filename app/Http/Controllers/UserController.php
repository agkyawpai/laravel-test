<?php

namespace App\Http\Controllers;


use App\Model\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return 'test';\
        $user_data = CustomerModel::get()->toArray();
        return $user_data;
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the forms
        $rules = [
            'customer_name' => 'required|max:50',
            'customer_id' => 'required|max:50',
            'address' => 'required|max:50',
            'phone' => 'required|max:50'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => 'NG',
                'message' => $validator->errors()->all(),
            ],422);
        }
        DB::beginTransaction();   
        try {
            $newCustomer = new CustomerModel();
            $newCustomer->customer_name = $request->customer_name;
            $newCustomer->customer_id = $request->customer_id;
            $newCustomer->address = $request->address;
            $newCustomer->phone = $request->phone;
            $newCustomer->save();

            DB::commit();
            return response()->json([
                'message' => 'User created',
                'code' => 200,
                'error' => false,
                'results' => $newCustomer
            ], 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true,
                'code' => 500
            ], 500);
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
        $user = CustomerModel::find($id);

        // Check user
        if(!$user) return response()->json(['message' => 'No user found'], 404);

        return response()->json([
            'message' => 'User detail',
            'code' => 200,
            'error' => false,
            'results' => $user
        ], 200);
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Validate the forms
         $this->validate($request, [
            'customer_name' => 'required|max:50',
            'customer_id' => 'required|max:50,' . $id,
            'address' => 'required|max:50',
            'phone' => 'required|max:50',
        ]);

        DB::beginTransaction();
        try {
            $user = CustomerModel::find($id);

            // Check user
            if(!$user) return response()->json(['message' => 'No user found'], 404);

            // Update
            $user->customer_name = $request->customer_name;
            $user->customer_id = $request->customer_id;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->save();

            DB::commit();
            return response()->json([
                'message' => 'User updated',
                'code' => 200,
                'error' => false,
                'results' => $user
            ], 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true,
                'code' => 500
            ], 500);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = CustomerModel::find($id);

            // Check user
            if(!$user) return response()->json(['message' => 'No user found'], 404);

            // Delete user
            $user->delete();

            DB::commit();
            return response()->json([
                'message' => 'User deleted',
                'code' => 200,
                'error' => false,
                'results' => $user
            ], 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true,
                'code' => 500
            ], 500);
        }
    }
}
