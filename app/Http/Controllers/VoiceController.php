<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoiceController extends MasterController
{
    public function test()
    {
        return view('voice');
    }
}
