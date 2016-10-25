<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\RecipesImport;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRecipesBy(RecipesImport $recipes, $value)
    {
        $results = $recipes->get()->where('recipe_cuisine', $value);
        

        return Response()->json(['recipes' => $results->all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RecipesImport $recipes)
    {
        $results = $recipes->get();

        //get all post data
        $input = $request->all();
 
        //just added to the array, this would be different
        $results = $results->put('', $input);

        return Response()->json(['recipe' => $results->all()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RecipesImport $recipes, $id)
    {
        $results = $recipes->get()->where('id', $id)->first();
        
        if ($results) {
            return Response()->json(['recipe' => $results], 200);
        }
        
        return response()->json(['error' => 'Record not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, RecipesImport $recipes)
    {
        $results = $recipes->get()->where('id', $id)->first();

        if ($request->input('rate') && ($request->input('rate') >= 1 && $request->input('rate') <= 5)) {
            $results = $results->put('rate', $request->input('rate'));
        } else {
            //we can of course validate fields cathing the request on load or within here
            $input = $request->all();
            foreach ($input as $key => $value) {
                $results->pull($key);
                $results = $results->put($key, $value);
            }
        }

        return Response()->json(['recipe' => $results->all()], 200);
    }

}
