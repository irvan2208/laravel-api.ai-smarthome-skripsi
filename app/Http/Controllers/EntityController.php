<?php

namespace App\Http\Controllers;

use App\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    public function updateEntity(Request $request)
    {
        // var_dump($request->all());
        $entity_array = $request->entity;
        if ($request->entity[0] == 'allroom') {
            $entity_array = Entity::where('type',0)->pluck('entity_code');
        }
        $entity_return = [];
        foreach ($entity_array as $ent) {
            $entity = Entity::where('entity_code',$ent)->first();
            if ($entity->type == 1) {
                $val = $request->numberinteger;
                // var_dump($val);
                if ($val <=18) {
                    $val = 18;
                }

                if ($val >=25) {
                    $val = 25;
                }
            }else{
                $val = 1;
                if ($request->value == 'off') {
                    $val = 0;
                }
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
