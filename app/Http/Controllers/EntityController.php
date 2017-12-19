<?php

namespace App\Http\Controllers;

use App\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    public function updateEntity(Request $request)
    {
        $entity_return = [];
        foreach ($request->entity as $ent) {
            $entity = Entity::where('entity_code',$ent)->first();
            $val = 1;
            if ($request->value == 'off') {
                $val = 0;
            }
            $entity->value = $val;
            $entity->save();
            array_push($entity_return, $entity);
        }

    	if ($entity) {
    		return response()->json(['entity' => $entity_return, 'success' => true], 200);
    	}
    }
}
