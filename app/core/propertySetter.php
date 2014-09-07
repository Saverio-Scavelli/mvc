<?php

/**
* Description
*/
class PropertySetter
{
	
	private $data = array();
	public $declared = 1;
	private $hidden = 2;
	
	function __set($name, $value)
	{
		echo "Setze '$name ' auf ' $value' \n";
		$this->data[$name] = $value;
	}
	
	public function __get($name)
	{
		echo "Lese ' $name'\n";
		if (array_key_exists($name, $this->data)) {
			# code...
			return $this->data[$name];
		}
		
		$trace = debug_backtrace();
		trigger_error(
			'Undefiniert Eigenschaft für __get():' . $name .
				' in ' . $trace[0]['file'].
				' zeile ' . $trace[0]['line'] .
			E_USER_NOTICE
			);
			
			return null;
	}
	
	public function __isset($name)
	{
		echo "Ist ' $name ' gesetzt?\n";
		return isset($this->data[$name]);
	}
	
	public function __unset($name)
	{
		echo "Lösche ' $name' \n";
		unset($this->data[$name]);
	}
	
	
	public function getHidden()
	{
		return $this->hidden;
	}
}

echo "<pre>\n";
$data = array();
$data['name'] = 'saverio';
$data['vorname'] = 'scavelli';

$obj = new PropertySetter;

foreach ($data as $key=>$value) {
	$obj->$key= $value;
}

echo $obj->name;
echo $obj->vorname;



$obj->sasa ='saverio';
echo "my name is " . $obj->sasa .'\n';

$obj->a = 1;
echo $obj->a . "\n\n";

var_dump(isset($obj->a));
unset($obj->a);
var_dump(isset($obj->a));
echo "\n";

echo $obj->declared . "\n\n";

echo "Wir experimentieren nun mit der private-Eigenschaft 'hidden':\n";
echo "Private ist innerhalb der Klasse sichtbar, also wird __get() nicht benutzt...\n";
echo $obj->getHidden() . "\n";
echo "Private nicht sichtbar von außerhalb der Klasse, also wird __get() benutzt...\n";
echo $obj->hidden . "\n";