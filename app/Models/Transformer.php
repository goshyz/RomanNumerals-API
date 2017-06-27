<?php
namespace App\Models;

use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Serializer\JsonApiSerializer;

class Transformer
{
	protected $_manager;
	
	public function __construct()
	{
		$this->_manager = new Manager();
		//$this->_manager->setSerializer(new JsonApiSerializer());
	}
	
	public function item($item, $transformerClass) {
		$resource = new Fractal\Resource\Item($item, $transformerClass);
		return $this->_manager->createData($resource)->toArray();
	}
	
	public function collection($collection, $transformerClass) {
		$resource = new Fractal\Resource\Collection($collection, $transformerClass);
		return $this->_manager->createData($resource)->toArray();
		
	}
}