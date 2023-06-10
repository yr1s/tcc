<?php

use PHPUnit\Framework\TestCase;
require_once (dirname(__FILE__)."/../src/model/entities/Account.php");
require_once (dirname(__FILE__)."/Instantiator.php");

final class AccountTest extends TestCase implements Instantiator {
  private static $_account;

  public function instantiate() {
    if (AccountTest::$_account === null) { AccountTest::$_account = new Account(); }
  }

  public function register() {
    AccountTest::$_account->register(
      "caixa banco",
      "corrente",
      1,
      1000.00,
      1500.00,
      500.00
    );
  
  }

  public function testGetAllData() : void {
    $this->instantiate();
    $this->register();

    $this->assertSame(
      [
        "description" => "caixa banco",
        "accountType" => "corrente",
        "status" => 1,
        "overallBalance" => 1000.00,
        "income" => 1500.00,
        "expense" => 500.00
      ],

      AccountTest::$_account->getAllData()
    );
  }

  public function testWipeAllData() : void {
    $this->instantiate();
    $this->register();

    AccountTest::$_account->wipeAllData();
    $this->assertSame(
      [
        "description" => null,
        "accountType" => null,
        "status" => null,
        "overallBalance" => null,
        "income" => null,
        "expense" => null
      ],

      AccountTest::$_account->getAllData()
    );
  }

  public function testRegisterWithGetters() : void {
    $this->instantiate();
    $this->register();

    $data = AccountTest::$_account->getAllData();

    $this->assertSame("caixa banco", $data["description"]);
    $this->assertSame("corrente", $data["accountType"]);
    $this->assertSame(1, $data["status"]);
    $this->assertSame(1000.00, $data["overallBalance"]);
    $this->assertSame(1500.00, $data["income"]);
    $this->assertSame(500.00, $data["expense"]);
  }

  public function testRegisterInvalidValuesWithGetters() : void {
    $this->instantiate();
    $this->expectException(InvalidArgumentException::class);

    AccountTest::$_account->register(
      "C$!@conta ##bancaria!@$",
      "C314312XR!#@corrente",
      43143,
      "1000.00",
      "$#!",
      "%^#^%@JKFLDAF"
    );
  }
}