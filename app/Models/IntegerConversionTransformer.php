<?php
namespace App\Models;

use App\Models\IntegerConversion;
use League\Fractal;

class IntegerConversionTransformer extends Fractal\TransformerAbstract
{
	public function transform(IntegerConversion $conv)
	{
	    return [ 
	    	'id'		=> (int) $conv->id,
	    	'integer'   => (int) $conv->integer,
	    	'roman'    => $conv->roman,
            'created_at'   => $conv->created_at];
	}
}