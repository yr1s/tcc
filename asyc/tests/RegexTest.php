<?php

use PHPUnit\Framework\TestCase;
require_once (dirname(__FILE__)."/../src/model/lib/Regex.php");

final class RegexTest extends TestCase {
  private static $_regex;
  private static $_regexep = [
    "float" => "/^[+-]?([0-9]*[.])?[0-9]+$/",
    "int" => "/^[+-]?[0-9]+$/",
    "stringName" => "/^[\p{Lu}\p{Ll}\p{M}\s]+$/u",
    "stringDescription" => "/^[\p{Lu}\p{Ll}\p{M}+-,!\s\.'0-9]+$/u"
  ];

  public function instantiate() {
    if (RegexTest::$_regex === null) { RegexTest::$_regex = new Regex(); }
  }

  public function checkException($value, $type) {
    /**** each exception must be tested separately ****/
    $this->expectException(InvalidArgumentException::class);
    RegexTest::$_regex->evaluate($value, RegexTest::$_regexep[$type]);
  }

  public function testevaluateFloatNumber() {
    $this->instantiate();

    $this->assertSame(59.99, (double) RegexTest::$_regex->evaluate(59.99, RegexTest::$_regexep["float"]));
    $this->assertSame(59.99, (double) RegexTest::$_regex->evaluate(+59.99, RegexTest::$_regexep["float"]));
    $this->assertSame(-59.99, (double) RegexTest::$_regex->evaluate(-59.99, RegexTest::$_regexep["float"]));
    $this->assertSame(59.00, (double) RegexTest::$_regex->evaluate(59.00, RegexTest::$_regexep["float"]));
    $this->assertSame(59.00, (double) RegexTest::$_regex->evaluate(+59.00, RegexTest::$_regexep["float"]));
    $this->assertSame(-59.00, (double) RegexTest::$_regex->evaluate(-59.00, RegexTest::$_regexep["float"]));
    $this->assertSame(59.0, (double) RegexTest::$_regex->evaluate(59, RegexTest::$_regexep["float"]));
    $this->assertSame(59.0, (double) RegexTest::$_regex->evaluate(+59, RegexTest::$_regexep["float"]));
    $this->assertSame(-59.0, (double) RegexTest::$_regex->evaluate(-59, RegexTest::$_regexep["float"]));
    $this->assertSame(.99, (double) RegexTest::$_regex->evaluate(.99, RegexTest::$_regexep["float"]));
    $this->assertSame(.99, (double) RegexTest::$_regex->evaluate(+.99, RegexTest::$_regexep["float"]));
    $this->assertSame(-.99, (double) RegexTest::$_regex->evaluate(-.99, RegexTest::$_regexep["float"]));
    $this->assertSame(59.99, (double) RegexTest::$_regex->evaluate("59.99", RegexTest::$_regexep["float"]));
    $this->assertSame(59.99, (double) RegexTest::$_regex->evaluate("+59.99", RegexTest::$_regexep["float"]));
    $this->assertSame(-59.99, (double) RegexTest::$_regex->evaluate("-59.99", RegexTest::$_regexep["float"]));
  }

  public function testEvaluateIntegerNumber() {
    $this->instantiate();

    $this->assertSame(7, (int) RegexTest::$_regex->evaluate(7, RegexTest::$_regexep["int"]));
    $this->assertSame(7, (int) RegexTest::$_regex->evaluate(+7, RegexTest::$_regexep["int"]));
    $this->assertSame(-7, (int) RegexTest::$_regex->evaluate(-7, RegexTest::$_regexep["int"]));
    $this->assertSame(7, (int) RegexTest::$_regex->evaluate("7", RegexTest::$_regexep["int"]));
    $this->assertSame(7, (int) RegexTest::$_regex->evaluate("+7", RegexTest::$_regexep["int"]));
    $this->assertSame(-7, (int) RegexTest::$_regex->evaluate("-7", RegexTest::$_regexep["int"]));
  }

  public function testEvaluateNameString() {
    $this->instantiate();

    $this->assertSame("Leonardo Abadie Fernandes", RegexTest::$_regex->evaluate("Leonardo Abadie Fernandes", RegexTest::$_regexep["stringName"]));
    $this->assertSame("Ana Clarissa Abadie Fernandes", RegexTest::$_regex->evaluate("Ana Clarissa Abadie Fernandes", RegexTest::$_regexep["stringName"]));
    $this->assertSame("José Mario Augusto Nicácio", RegexTest::$_regex->evaluate("José Mario Augusto Nicácio", RegexTest::$_regexep["stringName"]));
    $this->assertSame("Bia", RegexTest::$_regex->evaluate("Bia", RegexTest::$_regexep["stringName"]));
  }

  public function testEvaluateDescriptionString() {
    $this->instantiate(); 

    $this->assertSame("Turn left, my house is just around the corner", RegexTest::$_regex->evaluate("Turn left, my house is just around the corner", RegexTest::$_regexep["stringDescription"]));
    $this->assertSame("In the green school, go to the 2nd floor and 4h floor", RegexTest::$_regex->evaluate("In the green school, go to the 2nd floor and 4h floor", RegexTest::$_regexep["stringDescription"]));
    $this->assertSame("His name is José Mario Augusto Nicácio. He's not that bad! Just the age, he's 70yo", RegexTest::$_regex->evaluate("His name is José Mario Augusto Nicácio. He's not that bad! Just the age, he's 70yo", RegexTest::$_regexep["stringDescription"]));
  }

  public function testEvaluateExceptionFloatNumberWithAlphabeticString() {
    $this->instantiate();
    $this->checkException("foobar", "float");
  }

  public function testEvaluateExceptionFloatNumberWithMetacharacterString() {
    $this->instantiate();
    $this->checkException("!#$@#$^&#@!#@%", "float");
  }

  public function testEvaluateExceptionFloatNumberWithEmptyString() {
    $this->instantiate();
    $this->checkException("", "float");
  }

  public function testEvaluateExceptionFloatNumberWithNull() {
    $this->instantiate();
    $this->checkException(null, "float");
  }

  public function testEvaluateExceptionIntegerNumberWithFloat() {
    $this->instantiate();
    $this->checkException(40.99, "int");
  }

  public function testEvaluateExceptionIntegerNumberWithAlphabeticString() {
    $this->instantiate();
    $this->checkException("messed up", "int");
  }

  public function testEvaluateExceptionIntegerNumberWithMetacharacterString() {
    $this->instantiate();
    $this->checkException("{}<>/.,}|[]\]|*&)($#!@^%`~", "int");
  }

  public function testEvaluateExceptionIntegerNumberWithNull() {
    $this->instantiate();
    $this->checkException(null, "int");
  }

  public function testEvaluateExceptionNameStringWithDotString() {
    $this->instantiate();
    $this->checkException("my.name.is.leonardo.", "stringName");
  }

  public function testEvaluateExceptionNameStringWithMetacharacterString() {
    $this->instantiate();
    $this->checkException("{}<>/,}|[]\]|*&)($#!@^%`~", "stringName");
  }

  public function testEvaluateExceptionNameStringWithNumber() {
    $this->instantiate();
    $this->checkException(12, "stringName");
  }

  public function testEvaluateExceptionNameStringWithNumberString() {
    $this->instantiate();
    $this->checkException("11.23", "stringName");
  }

  public function testEvaluateExceptionDescriptionStringWithMetacharacterString() {
    $this->instantiate();
    $this->checkException("{}<>/}|[]\]|*&)($#@^%`~", "stringDescription");
  }

  public function testEvaluateExceptionWithTrueBoolean() {
    $this->instantiate();
    $this->checkException(true, "stringDescription");
  }

  public function testEvaluateExceptionWithFalseBoolean() {
    $this->instantiate();
    $this->checkException(false, "stringDescription");
  }
}