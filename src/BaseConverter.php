<?php
namespace SGW_Base;

class BaseConverter {
	
	private $_digitMap = array();
	
	private $_digitMapReverse = array();
	
	private $_base;
	
	/**
	 * @param string $digitSet
	 */
	public function __construct($digitSet) {
		$this->_base = strlen($digitSet);
		for ($i = 0; $i < $this->_base; $i++) {
			$this->_digitMap[] = $digitSet[$i];
			$this->_digitMapReverse[$digitSet[$i]] = $i;
		}
	}
	
	public function base() {
		return $this->_base;
	}
	
	public function toDigits($n) {
		$s = '';
		do {
			$s .= $this->_digitMap[$n % $this->_base];
			$n = (int)floor($n / $this->_base);
		} while ($n > 0);
		return strrev($s);
	}
	
	public function fromDigits($s) {
		$n = 0;
		$c = strlen($s);
		for ($i = 0; $i < $c; $i++) {
			$d = $s[$i];
			if (!array_key_exists($d, $this->_digitMapReverse)) {
				throw new \Exception("Digit '$d' does not exist in the digit map");
			}
			$n = $this->_base * $n + $this->_digitMapReverse[$d];
		}
		return $n;
	}
	
}