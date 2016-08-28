<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use SGW_Base\BaseConverter;

class BaseConverterTest extends PHPUnit_Framework_TestCase
{
	const DIGIT_26 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	const DIGIT_10 = '0123456789';
	
	function testBase_Base10_Ok() {
		$converter = new BaseConverter(self::DIGIT_10);
		$actual = $converter->base();
		$this->assertEquals(10, $actual);
	}
	
	function testToDigits_Base10_0To9_Ok() {
		$converter = new BaseConverter(self::DIGIT_10);
		$actual = $converter->toDigits(0);
		$this->assertEquals('0', $actual);
		$actual = $converter->toDigits(1);
		$this->assertEquals('1', $actual);
		$actual = $converter->toDigits(9);
		$this->assertEquals('9', $actual);
	}
	
	function testToDigits_Base10_10To19_Ok() {
		$converter = new BaseConverter(self::DIGIT_10);
		$actual = $converter->toDigits(10);
		$this->assertEquals('10', $actual);
		$actual = $converter->toDigits(11);
		$this->assertEquals('11', $actual);
		$actual = $converter->toDigits(19);
		$this->assertEquals('19', $actual);
	}
	
	function testfromDigits_Base10_0from9_Ok() {
		$converter = new BaseConverter(self::DIGIT_10);
		$actual = $converter->fromDigits('0');
		$this->assertEquals(0, $actual);
		$actual = $converter->fromDigits('1');
		$this->assertEquals(1, $actual);
		$actual = $converter->fromDigits('9');
		$this->assertEquals(9, $actual);
	}
	
	function testfromDigits_Base10_10from19_Ok() {
		$converter = new BaseConverter(self::DIGIT_10);
		$actual = $converter->fromDigits('10');
		$this->assertEquals(10, $actual);
		$actual = $converter->fromDigits('11');
		$this->assertEquals(11, $actual);
		$actual = $converter->fromDigits('19');
		$this->assertEquals(19, $actual);
	}
	
	function testBase_Base26_Ok() {
		$converter = new BaseConverter(self::DIGIT_26);
		$actual = $converter->base();
		$this->assertEquals(26, $actual);
	}
	
	function testToDigits_Base26_0To25_Ok() {
		$converter = new BaseConverter(self::DIGIT_26);
		$actual = $converter->toDigits(0);
		$this->assertEquals('A', $actual);
		$actual = $converter->toDigits(1);
		$this->assertEquals('B', $actual);
		$actual = $converter->toDigits(25);
		$this->assertEquals('Z', $actual);
	}
	
	function testToDigits_Base26_26To51_Ok() {
		$converter = new BaseConverter(self::DIGIT_26);
		$actual = $converter->toDigits(26);
		$this->assertEquals('BA', $actual);
		$actual = $converter->toDigits(27);
		$this->assertEquals('BB', $actual);
		$actual = $converter->toDigits(51);
		$this->assertEquals('BZ', $actual);
	}
	
	function testfromDigits_Base26_0To25_Ok() {
		$converter = new BaseConverter(self::DIGIT_26);
		$actual = $converter->fromDigits('A');
		$this->assertEquals(0, $actual);
		$actual = $converter->fromDigits('B');
		$this->assertEquals(1, $actual);
		$actual = $converter->fromDigits('Z');
		$this->assertEquals(25, $actual);
	}
	
	function testfromDigits_Base26_26from51_Ok() {
		$converter = new BaseConverter(self::DIGIT_26);
		$actual = $converter->fromDigits('BA');
		$this->assertEquals(26, $actual);
		$actual = $converter->fromDigits('BB');
		$this->assertEquals(27, $actual);
		$actual = $converter->fromDigits('BZ');
		$this->assertEquals(51, $actual);
	}
	
	
}
