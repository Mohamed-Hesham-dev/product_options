<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Http\Resources\OptionResource;
use App\Models\Option;

use App\Helpers\JsonResponse;
class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $options = Option::get();
            return response()->json(['data' =>OptionResource::collection($options),'message' => ' retrieved successfully.'], 200);
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
    public function store(OptionRequest $request)
    {
        try
            {

                $option = Option::create($request->validated());
                return response()->json(['data' =>new OptionResource($option),'message' => ' created successfully.'], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => ' created Failed.']);
            }
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(OptionRequest $request, Option $option)
    {
        try
            {
                $data = $request->validated();
                $option->update($data);
                return response()->json(['data' =>new OptionResource($option),'message' => ' updated successfully.'], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => ' updated Failed.']);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        try
        {
            $option->delete();
            return response()->json(['message' => ' deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => ' deleted Failed.']);
        }

    }
}
