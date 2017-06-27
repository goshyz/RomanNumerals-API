<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\IntegerConversionTransformer;
use App\Models\IntegerConversion;
use App\Models\Transformer;


class NumberToRomanController extends Controller
{
	protected $_fractal;
	
	public function __construct()
	{
		//TODO $this->middleware('auth.basic');
		$this->_fractal = new Transformer();
		
	}
	
	/**
	 * Shows an example view containing a form for convert a number 
	 * or visualize the differents API operations.
	 * @return View
	 */
	public function create() {
    	
		return View('numbers', array());
    }
	
	/**
	 * Gets roman numeral from an integer specified as input.
	 * 
	 * @return Response. Json with the new IntegerConversion object created.
	 */
    public function store() {
    	
		if ((!is_null(request()->input('integer'))) && (is_numeric(request()->input('integer')))) { 
			$conv = new IntegerConversion();
			$result = $conv->toRomanNumerals(request()->input('integer'));
			$conv->save();
			
			return response()->json($this->_fractal->item($conv, new IntegerConversionTransformer()), 200);
		}
    }
	
	/**
	 * Return the last converted numbers.
	 *
	 * @return Response. Json containing the numbers converted in a one day period.
	 */
	public function index() {
		$dt = new Carbon('yesterday');
		$result = IntegerConversion::where('created_at', '>=', $dt)->orderBy('created_at', 'desc')->get();
		
		return response()->json($this->_fractal->collection($result, new IntegerConversionTransformer()), 200);
	}
	
	/**
	 * Returns a set of data depending of the specified operation.
	 *
	 * @param string $op, available operations are ['top10'].
	 * @return Response. Json containing an array of IntegerConversions objects or empty 
	 * response if no operation is specified.
	 */
	public function show($op)
	{
		switch ($op) {
			case 'top10':  //the top 10 converted numbers.
				$result = IntegerConversion::All()->groupBy('roman')->sortBy(function ($reps) {
					return -count($reps); 
				})->take(10)->collapse()->unique('integer');
				
				return $this->_fractal->collection($result, new IntegerConversionTransformer());
				
			// add more types of list 
			// is easy adding new cases
			// case: 'top20': ...
			default:
				return response()->json(array('status'=>'ok','data'=> 'Nothing to do...'), 200);
		}		
	}
	
}
