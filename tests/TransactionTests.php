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
	}
	
}