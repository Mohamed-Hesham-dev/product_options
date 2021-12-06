<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionValueRequest;
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
        $optionValues = OptionValue::get();
        return view('optionValues.index',compact('optionValues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = Option::get();
        return view('optionValues.create',compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionValueRequest $request)
    {
       foreach($request->name as $k=>$v){
            $data=array(
                'option_id'=>$request->option_id,
                'name'=>$request->name[$k],
            );
            $option = OptionValue::create($data);

       }

        return redirect('/optionValues');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OptionValue  $optionValue
     * @return \Illuminate\Http\Response
     */
    public function show(OptionValue $optionValue)
    {
        return view('optionValues.show',compact('optionValue'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OptionValue  $optionValue
     * @return \Illuminate\Http\Response
     */
    public function edit(OptionValue $optionValue)
    {
        $options = Option::get();
        return view('optionValues.edit',compact('optionValue','options'));

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
        foreach($request->name as $k=>$v){
            $data=array(
                'option_id'=>$request->option_id,
                'name'=>$request->name[$k],
            );
            $optionValue->update($data);
       }

        return redirect('/optionValues');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OptionValue  $optionValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(OptionValue $optionValue)
    {
        $optionValue->delete();
        return redirect('/optionValues');
    }
}
