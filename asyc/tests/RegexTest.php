<?php

use PHPUnit\Framework\TestCase;
require_once (dirname(__FILE__)."/../src/model/lib/Regex.php");

final class RegexTest extends TestCase {
  private static $_regex;
  private static $_regexep = [
    "float" => "/^[+-]?([0-9]*[.])?[0-9]+$/",
    "int" => "/^[+-]?[0-9]+$/",
    "stringName" => "/^[\p{Ll}\p{Lu}\p{M}\s]+$/",
    "stringDescription" => "/^[\p{Ll}\p{Lu}\p{M}\s0-9]+$/"
  ];

  public function instantiate() {
    if (RegexTest::$_regex === null) { RegexTest::$_regex = new Regex(); }
  }

  public function invalidate($value, $type) {
    /**** each exception must be tested separately ****/
    $this->expectException(InvalidArgumentException::class);
    RegexTest::$_regex->validate($value, RegexTest::$_regexep[$type]);
  }

  public function testValidateFloatNumber() {
    $this->instantiate();

    $this->assertSame(59.99, (double) RegexTest::$_regex->validate(59.99, RegexTest::$_regexep["float"]));
    $this->assertSame(59.99, (double) RegexTest::$_regex->validate(+59.99, RegexTest::$_regexep["float"]));
    $this->assertSame(-59.99, (double) RegexTest::$_regex->validate(-59.99, RegexTest::$_regexep["float"]));
    $this->assertSame(59.00, (double) RegexTest::$_regex->validate(59.00, RegexTest::$_regexep["float"]));
    $this->assertSame(59.00, (double) RegexTest::$_regex->validate(+59.00, RegexTest::$_regexep["float"]));
    $this->assertSame(-59.00, (double) RegexTest::$_regex->validate(-59.00, RegexTest::$_regexep["float"]));
    $this->assertSame(59.0, (double) RegexTest::$_regex->validate(59, RegexTest::$_regexep["float"]));
    $this->assertSame(59.0, (double) RegexTest::$_regex->validate(+59, RegexTest::$_regexep["float"]));
    $this->assertSame(-59.0, (double) RegexTest::$_regex->validate(-59, RegexTest::$_regexep["float"]));
    $this->assertSame(.99, (double) RegexTest::$_regex->validate(.99, RegexTest::$_regexep["float"]));
    $this->assertSame(.99, (double) RegexTest::$_regex->validate(+.99, RegexTest::$_regexep["float"]));
    $this->assertSame(-.99, (double) RegexTest::$_regex->validate(-.99, RegexTest::$_regexep["float"]));
    $this->assertSame(59.99, (double) RegexTest::$_regex->validate("59.99", RegexTest::$_regexep["float"]));
    $this->assertSame(59.99, (double) RegexTest::$_regex->validate("+59.99", RegexTest::$_regexep["float"]));
    $this->assertSame(-59.99, (double) RegexTest::$_regex->validate("-59.99", RegexTest::$_regexep["float"]));
  }

  public function testValidateIntegerNumber() {
    $this->instantiate();

    $this->assertSame(7, (int) RegexTest::$_regex->validate(7, RegexTest::$_regexep["int"]));
    $this->assertSame(7, (int) RegexTest::$_regex->validate(+7, RegexTest::$_regexep["int"]));
    $this->assertSame(-7, (int) RegexTest::$_regex->validate(-7, RegexTest::$_regexep["int"]));
    $this->assertSame(7, (int) RegexTest::$_regex->validate("7", RegexTest::$_regexep["int"]));
    $this->assertSame(7, (int) RegexTest::$_regex->validate("+7", RegexTest::$_regexep["int"]));
    $this->assertSame(-7, (int) RegexTest::$_regex->validate("-7", RegexTest::$_regexep["int"]));
  }

  public function testValidateNameString() {
    $this->instantiate();
  }

  public function testValidateDescriptionString() {
    $this->instantiate(); 
  }

  public function testValidateExceptionFloatNumberWithAlphabeticString() {
    $this->instantiate();
    $this->invalidate("foobar", "float");
  }

  public function testValidateExceptionFloatNumberWithMetacharacterString() {
    $this->instantiate();
    $this->invalidate("!#$@#$^&#@!#@%", "float");
  }

  public function testValidateExceptionFloatNumberWithTrueBoolean() {
    $this->instantiate();
    $this->invalidate(true, "float");
  }

  public function testValidateExceptionFloatNumberWithFalseBoolean() {
    $this->instantiate();
    $this->invalidate(false, "float");
  }

  public function testValidateExceptionFloatNumberWithEmptyString() {
    $this->instantiate();
    $this->invalidate("", "float");
  }

  public function testValidateExceptionFloatNumberWithNull() {
    $this->instantiate();
    $this->invalidate(null, "float");
  }

  public function testValidateExceptionIntegerNumberWithFloat() {
    $this->instantiate();
    $this->invalidate(40.99, "int");
  }

  public function testValidateExceptionIntegerNumberWithAlphabeticString() {
    $this->instantiate();
    $this->invalidate("messed up", "int");
  }

  public function testValidateExceptionIntegerNumberWithMetacharacterString() {
    $this->instantiate();
    $this->invalidate("{}<>/.,}|[]\]|*&)($#!@^%`~", "int");
  }

  public function testValidateExceptionIntegerNumberWithTrueBoolean() {
    $this->instantiate();
    $this->invalidate(true, "int");
  }

  public function testValidateExceptionIntegerNumberWithFalseBoolean() {
    $this->instantiate();
    $this->invalidate(false, "int");
  }

  public function testValidateExceptionIntegerNumberWithNull() {
    $this->instantiate();
    $this->invalidate(null, "int");
  }
}
