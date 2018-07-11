<?php

namespace PHPBlockchain;

use PHPBlockchain\Block;

/**
 * Main Blockchain class where the magic happens :)
 */
class Blockchain
{
	/**
	 * All blocks on the Blockchain
	 * 
 	 * @var array
 	*/
	private $blocks;

	public function __construct()
	{
		$this->blocks = [];
		$this->addGenesisBlock();
	}
	/**
	 * Adds a new block to the blockchain
	 * 
	 *  
     * @return void
    */
	public function addGenesisBlock() : Void
	{
		$block = new Block();

		// create genesis block
		if (count($this->blocks) == 0) {
			$block->setPreviousHash("0000000000000000");
			$new_hash = $this->generateHash($block);
			$block->setTimestamp();
			$block->setCurrentHash($new_hash);
		}

		$this->blocks[] = $block;
	}

	/**
	 * Sets the new and previous block's hashes and transaction data
	 * Adds new blocks to blockchain
	 * 
	 * @param array $transactions
	 *  
    */
	public function addNewBlocks($transactions) : Void
	{
		if(isset($transactions)){
			foreach ($transactions as $transaction) {
				$block = new Block();
				$block->addTransaction($transaction);
				$len = count($this->blocks);
				$previousBlock = $this->getPreviousBlock();
				$block->index = $len;
				$block->setPreviousHash($previousBlock->getCurrentHash());
				$new_hash = $this->generateHash($block);
				$block->setCurrentHash($new_hash);
				$block->setTimestamp();

				$this->blocks[$len-1] = $previousBlock; // update the previous block
				$this->blocks[] = $block; // add the new block to the blockchain
			}
		}
		// $transactions = []; // reset transactions
	}

	/**
	 * Generate a new hash for a new block
	 * 
	 * @param PHPBlockchain\Block $block
	 *  
     * @return string 
    */
	private function generateHash(Block $block) : String
	{
		$new_hash = hash('sha256', $block->getContent());

		$nonce = $block->getNonce();
		// Proof of Work
		while(substr($new_hash, 0, 4) != '0000') {
			$nonce++;
			$block->setNonce($nonce);
			$new_hash = hash('sha256', $block->getContent());
		}

		return $new_hash;
	}

	/**
	 * Gets the previous block in the blockchain
	 *  
     * @return PHPBlockchain\Block
    */
	private function getPreviousBlock() : Block
	{
		$pos = count($this->blocks) - 1;
    	return $this->blocks[$pos];
	}
	
	/**
	 * Generates a formated array of the blockchain
	 *  
     * @return array
    */
	public function display(){
		
		$blockchain_data = [];

		foreach($this->blocks as $block){
			$data['content'] = 
			[
				"index"     	=> $block->index, 
				"nonce"			=> $block->getNonce(),
				"previous_hash"	=> $block->getPreviousHash(),
				"current_hash"	=> $block->getCurrentHash(),
				"timestamp" 	=> $block->getTimestamp(),
			];

			foreach($block->getTransactions() as $transaction){
				$data['content']['transactions'] = [
					"from" 		=> $transaction->getFrom(),
					"to"		=> $transaction->getTo(),
					"amount"	=> $transaction->getAmount()
				];
			}
			$blockchain_data[] = $data;
		}

		return $blockchain_data;
	}
}