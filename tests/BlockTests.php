<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use PHPBlockchain\{Block, Transaction};

class BlockTests extends TestCase
{
	private $block;

	function __construct()
	{
		parent::__construct();
		$this->block = new Block();
	}

	public function testBlockIsValid()
	{
		$this->assertInstanceOf(Block::class, $this->block);
	}

	public function testIndexIsSet()
	{
		$this->assertSame(0, $this->block->index);
	}

	public function testNonceIsSet()
	{
		$this->assertSame(0, $this->block->nonce);
	}

	public function testPreviousHashNotSet()
	{
		$this->assertSame("", $this->block->getPreviousHash());
	}

	public function testCurrentHashNotSet()
	{
		$this->assertSame("", $this->block->getCurrentHash());
	}

	public function testTransactionsEmpty()
	{
		$this->assertEmpty($this->block->getTransactions());
	}

	public function testCanAddTransaction()
	{
		$transaction = new Transaction("David", "Dan", 1000);
		$this->block->addTransaction($transaction);
		$this->assertCount(1, $this->block->getTransactions());
	}


}