<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use PHPBlockchain\Transaction;

class TransactionTests extends TestCase
{

	public function testTransactionIsValid()
	{
		$transaction = new Transaction("David", "Dan", "1000");
		$this->assertInstanceOf(Transaction::class, $transaction);

		$this->assertEquals("David", $transaction->getFrom());
		$this->assertEquals("Dan", $transaction->getTo());
		$this->assertEquals(1000, $transaction->getAmount());
	}
	
}