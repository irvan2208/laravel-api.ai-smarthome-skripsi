<?php

namespace App\Http\Controllers;

use App\Entity;
use App\Helpers\Enums\EntityType;
use Illuminate\Http\Request;
use Nwidart\ForecastPhp\Forecast;

class FrontendController extends Controller
{
	private $forecast;

	public function __construct(\Nwidart\ForecastPhp\Forecast $forecast)
	{
	    $this->forecast = $forecast;
	}
    public function index()
    {
        // $weather = $this->forecast->get('1.124107','104.09778183');
    	$weather = NULL;
        $room = Entity::where('type',EntityType::ROOM)->get();
    	$aircons = Entity::where('type',EntityType::AIRCON)->get();
        // dd($room);
    	return view('homepage')->with('weather',$weather)->with('room',$room)->with('aircons',$aircons);
    }
}
