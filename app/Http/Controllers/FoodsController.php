<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Food;
use App\Models\Meal;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Meal $meal)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'protein' => 'required|integer',
            'carbohydrates' => 'required|integer',
            'fat' => 'required|integer'
        ]);

        $food = new Food($request->all());
        $meal->foods()->save($food);        

        return back()->with('message','Food created successfully.');

        // $food =  Food::create($validated);
        // $food = new Food();

        // $request->validate([
        //     'name' => 'required|string|max:55',
        //     'carbohydrates' => 'required|integer',
        //     'protein' => 'required|integer',
        //     'fat' => 'required|integer',
        //     'meal_id' => 'required',
        // ]);

        // $food->name = $request->name;
        // $food->carbohydrates = $request->carbohydrates;
        // $food->protein = $request->protein;
        // $food->fat = $request->fat;
        // $food->meal_id = $request->meal_id;

        // // $food->save();
        // $food->save();

        // return redirect()->back()->with('success', 'food created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $foodID)
    {
        Food::destroy($foodID);

        return redirect()->back();
    }
}
