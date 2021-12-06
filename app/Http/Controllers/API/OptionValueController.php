<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionValueRequest;
use App\Http\Resources\OptionValueResource;
use App\Models\Option;
use App\Models\OptionValue;
use Illuminate\Http\Request;

class OptionValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $optionValues = OptionValue::get();
            return response()->json(['data' =>OptionValueResource::collection($optionValues),'message' => ' retrieved successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => ' retrieved Failed.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionValueRequest $request)
    {
        try {
            foreach($request->names as $name){
                $data=array(
                    'option_id'=>$request->option_id,
                    'name'=>$name,
                );
                $option_value = OptionValue::create($data);
           }
            return response()->json(['message' => ' created successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }

    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OptionValue  $optionValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OptionValue $optionValue)
    {

        try {
                $optionValue->update($request->all());
            return response()->json(['data' =>new OptionValueResource($optionValue),'message' => ' updated successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OptionValue  $optionValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(OptionValue $optionValue)
    {
        try
        {
            $optionValue->delete();
            return response()->json(['message' => ' deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => ' deleted Failed.']);
        }
    }
}
