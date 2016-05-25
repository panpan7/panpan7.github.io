<?php

abstract class Absclass {
	public $name;

	public function enRoll()
	{
		# code...
	}
	abstract protected function reSize();
}

class Box extends Absclass {
	protected function reSize () {
		echo 'test resize';
	}
}

// $a = new Absclass();

// $a = new Box();
// $a->reSize();

?>