<?php

namespace App\Http\Controllers;

use App\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    public function updateEntity(Request $request)
    {
    	// dd($request->all());
    	$entity = Entity::where('entity_code',$request->entity)->first();
    	// dd($request->value);
    	$val = 1;
    	if ($request->value == 'off') {
    		$val = 0;
    	}
    	$entity->value = $val;
    	$entity->save();

    	if ($entity) {
    		return response()->json(['entity' => $entity, 'success' => true], 200);
    	}
    }
}
