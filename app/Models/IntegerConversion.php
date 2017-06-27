<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

define('MAX_INTEGER', 3999);

class IntegerConversion extends Model implements IntegerConversionInterface
{
	//protected $table = 'integer_conversions';
		
	/**
	 * Coverts the integer passed as argument in roman notation.
	 * @param Integer $integer, number in range 0 to 3999.
	 * @return String containing the number on roman notation.
	 **/
	public function toRomanNumerals($integer) {
		if ($integer < 0 || $integer > MAX_INTEGER)
			throw new Exception('Number must be between 0 and 3999');
		
		$this->roman = "";
		$this->integer = $integer;
	
		if ($integer == 0)
			return $this->roman;
	
		$values = array(1000 => 'M', 
						900 => 'CM', 
						500 => 'D', 
						400 => 'CD', 
						100 => 'C', 
						90 => 'XC', 
						50 => 'L', 
						40 => 'XL', 
						10 => 'X', 
						9 => 'IX', 
						5 => 'V', 
						4 => 'IV', 
						1 => 'I');
		
		foreach ($values as $value => $numeral) {
			while ($integer >= $value) {
				$integer -= $value;
				$this->roman .= $numeral;
			}
		}
		
		return $this->roman;
	}
}