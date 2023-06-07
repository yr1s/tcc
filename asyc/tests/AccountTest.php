<?php

use PHPUnit\Framework\TestCase;
require_once '../src/model/entities/Account.php';

final class AccountTest extends TestCase {
  private static $account;

  public function register() {
    AccountTest::$_account->register(
      "conta bancaria",
      "corrente",
      1,
      1000.00,
      1500.00,
      500.00
    );
  }

  public function testGetAllData() : void {
    AccountTest::$_account = new Account();
    $this->register();

    $this->assertSame(
      [
        "description" => "conta bancaria",
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
    AccountTest::$_account = new Account();
    $this->register();
    AccountTest::$_account->wipeAllData();

    $this->assertEmpty(AccountTest::$_account->getDescription());
    $this->assertEmpty(AccountTest::$_account->getAccountType());
    $this->assertEmpty(AccountTest::$_account->getStatus());
    $this->assertEmpty(AccountTest::$_account->getOverallBalance());
    $this->assertEmpty(AccountTest::$_account->getIncome());
    $this->assertEmpty(AccountTest::$_account->getExpense());
  }

  public function testRegisterWithGetters() : void {
    AccountTest::$_account = new Account();
    $this->register();

    $this->assertSame("conta bancaria", AccountTest::$_account->getDescription());
    $this->assertSame("corrente", AccountTest::$_account->getAccountType());
    $this->assertSame(1, AccountTest::$_account->getStatus());
    $this->assertSame(1000.00, AccountTest::$_account->getOverallBalance());
    $this->assertSame(1500.00, AccountTest::$_account->getIncome());
    $this->assertSame(500.00, AccountTest::$_account->getExpense());
  }

  public function testRegisterWithInvalidValues() : void {
    AccountTest::$_account = new Account();
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

  public function testClass() : void {
    AccountTest::$_account = new Account();
    $this->assertTrue("Account" == get_class(Account::$_account));
  }
}