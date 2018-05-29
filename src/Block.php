<?php

namespace PHPBlockchain;

use PHPBlockchain\Transaction;

/**
 * 
 */
class Block
{
	public $index;
	private $previousHash;
	private $currentHash;
	public $nonce;
	private $transactions;

	function __construct()
	{
		$this->index = 0;
		$this->previousHash = "";
		$this->currentHash = "";
		$this->nonce = 0;
		$this->transactions = [];
	}

	public function setPreviousHash($value = '') : Void
	{
		$this->previousHash = $value;
	}

	public function getPreviousHash() : String
	{
		return $this->previousHash;
	}

	public function setCurrentHash($value = '') : Void
	{
		$this->currentHash = $value;
	}

	public function getCurrentHash() : String
	{
		return $this->currentHash;
	}

	public function addTransaction(Transaction $transaction)
	{
		return $this->transactions[] = $transaction;
	}

	public function getTransactions() : Array
	{
		return $this->transactions;
	}

	public function getContent() : String
	{
		return json_encode($this->transactions).$this->index.$this->previousHash.$this->nonce;
	}
}