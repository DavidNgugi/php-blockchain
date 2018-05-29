<?php

namespace PHPBlockchain;

use PHPBlockchain\Block;

/**
 * 
 */
class Blockchain
{
	
	private $blocks;

	function __construct(Block $genesisBlock)
	{
		$this->blocks = [];
		$this->addBlock($genesisBlock);
	}

	public function addBlock(Block $block) : Void
	{
		if (count($this->blocks) == 0) {
			$block->setPreviousHash("0000000000000000");
			$new_hash = $this->generateHash($block);
			$block->setCurrentHash($new_hash);
		}

		$this->blocks[] = $block;
	}

	public function getNextBlock($transactions) : Block
	{
		$block = new Block();

		foreach ($transactions as $transaction) {
			$block->addTransaction($transaction);
		}

		$previousBlock = $this->getPreviousBlock();
		$block->index = count($this->blocks);
		$block->setPreviousHash($previousBlock->getCurrentHash());
		$new_hash = $this->generateHash($block);
		$block->setCurrentHash($new_hash);

		return $block;
	}

	private function generateHash(Block $block) : String
	{
		$new_hash = hash('sha256', $block->getContent());

		while(substr($new_hash, 0, 4) != '0000') {
			$block->nonce += 1;
			$new_hash = hash('sha256', $block->getContent());
		}

		return $new_hash;
	}

	private function getPreviousBlock() : Block
	{
		$pos = count($this->blocks) - 1;
    	return $this->blocks[$len];
   	}
}