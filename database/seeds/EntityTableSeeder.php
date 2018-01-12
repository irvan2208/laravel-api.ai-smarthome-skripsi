<?php

use App\Entity;
use App\Helpers\Enums\EntityType;
use Illuminate\Database\Seeder;

class EntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entity = new Entity;
        $entity->entity_code = 'room1';
        $entity->entity_name = 'Room one';
        $entity->value = 0;
        $entity->type = EntityType::ROOM;
        $entity->save();

        $entity = new Entity;
        $entity->entity_code = 'room2';
        $entity->entity_name = 'Room two';
        $entity->value = 0;
        $entity->type = EntityType::ROOM;
        $entity->save();

        $entity = new Entity;
        $entity->entity_code = 'room3';
        $entity->entity_name = 'Bed Room';
        $entity->value = 0;
        $entity->type = EntityType::ROOM;
        $entity->save();

        $entity = new Entity;
        $entity->entity_code = 'room4';
        $entity->entity_name = 'Living Room';
        $entity->value = 0;
        $entity->type = EntityType::ROOM;
        $entity->save();

        $entity = new Entity;
        $entity->entity_code = 'aircon1';
        $entity->entity_name = 'Bedroom Air Conditioner';
        $entity->value = 20;
        $entity->type = EntityType::AIRCON;
        $entity->save();

        $entity = new Entity;
        $entity->entity_code = 'aircon2';
        $entity->entity_name = 'Living Room Air Conditioner';
        $entity->value = 18;
        $entity->type = EntityType::AIRCON;
        $entity->save();

    }
}
