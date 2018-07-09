<?php

namespace PHPBlockchain;

use PHPBlockchain\Block;

/**
 * Main Blockchain class where the magic happens :)
 */
class Blockchain
{
	
	private $blocks;

	function __construct(Block $genesisBlock)
	{
		$this->blocks = [];
		$this->addBlock($genesisBlock);
	}
	/**
	 * Adds a new block to the blockchain
	 * 
	 * @param Block $block
	 *  
     * @return void
    */
	public function addBlock(Block $block) : Void
	{
		// create genesis block
		if (count($this->blocks) == 0) {
			$block->setPreviousHash("0000000000000000");
			$new_hash = $this->generateHash($block);
			$block->setCurrentHash($new_hash);
		}

		$this->blocks[] = $block;
	}

	/**
	 * Sets the new and previous block's hashes and transaction data
	 * 
	 * @param $transactions
	 *  
     * @return Block
    */
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

	/**
	 * Generate a new hash for a new block
	 * 
	 * @param Block $block
	 *  
     * @return string 
    */
	private function generateHash(Block $block) : String
	{
		$new_hash = hash('sha256', $block->getContent());

		while(substr($new_hash, 0, 4) != '0000') {
			$block->nonce += 1;
			$new_hash = hash('sha256', $block->getContent());
		}

		return $new_hash;
	}

	/**
	 * Gets the previous block in the blockchain
	 *  
     * @return Block Previous block
    */
	private function getPreviousBlock() : Block
	{
		$pos = count($this->blocks) - 1;
    	return $this->blocks[$len];
   	}
}