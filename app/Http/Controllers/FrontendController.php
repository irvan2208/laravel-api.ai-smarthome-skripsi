<?php

namespace App\Http\Controllers;

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
    	$weather = $this->forecast->get('1.124107','104.09778183');
    	// dd($weather);
    	return view('homepage')->with('weather',$weather);
    }
}
