<?php

class Regex {
  /*
  * Does personalized regular expression
  *
  * @param mixed `input` describes the value to be validated
  * @param string `regex` regular expression to be applied
  *
  * @throws new Exception if `input` is not valid
  */
  public static function evaluate($input, $regex) : string {
    if ((preg_match($regex, $input, $output) === 1) && (gettype($input) != "boolean")) {
      return $output[0];
    } else {
      throw new InvalidArgumentException("****`$input` invalido - nao atende aos requisitos necessarios****" . PHP_EOL);
    }
  }
}