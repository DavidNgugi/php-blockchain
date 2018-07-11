# PHP Blockchain

<a href = "https://travis-ci.org/DavidNgugi/php-blockchain" title = "Buy Me a Coffee" target="_blank"><img src="https://travis-ci.org/DavidNgugi/php-blockchain.svg?branch=master"/></a>

A simple implementation of a blockchain using the PHP programming language. It still has far to go and contributions are welcomed.

## Installation

```bash
composer require davidngugi/php-blockchain
```

## Run Tests

```bash
php vendor/phpunit/phpunit/phpunit
```

## Run Fake Transactions

The PHPBlockchain\TestBlockchain::class has a basic working implementation of this blockchain. It shows how you can add transactions to the blockchain.

Run it from the terminal:

```bash
php src/TestBlockchain.php
```

Example,

```php
$blockchain = new TestBlockchain;
$blockchain->addNewTransaction('David', 'Dan', 200);
$blockchain->addNewTransaction('Dan', 'David', 100);
$blockchain->display();
```

## Batch transactions

```php
$transactions = [
    ['David', 'Dan', 200],
    ['Dan', 'David', 100],
    ['Cynthia', 'David', 50],
    ['Martin', 'David', 100]
];

$blockchain->addManyTransactions($transactions);
$blockchain->display();
```

## To-Do

* Add more Tests for the Blockchain
* Improve the Proof-of-Work (PoW) algorithm or evaluate whether to switch to a Proof-of-Stake (PoS) is worth it
* Add Address class
* Design changes
* Clean up for publishing to packagist

## Contribution

All contributions (big or small) are highly welcomed.

1. Fork the project
2. Open an issue on this repo
3. Work out a solution on your fork and ensure all tests run successfully
4. Send a PR associated with the issue you opened
5. PR will be evaluated and if approved, merged into the project and the issue closed

It's as simple as that! :)

## Authors

* David Ngugi <david@davidngugi.com>

## Support

If you would love to support the continuous development and maintenance of this package, please consider buying me a coffee.

<a href = "https://www.buymeacoffee.com/DavidNgugi" title = "Buy Me a Coffee" target="_blank"><img src="https://github.com/DavidNgugi/php-blockchain/blob/master/coffee.jpg?raw=true" width="240px" height ="150px"/></a>

## License

This package is open-sourced software licensed under the [MIT Licence](https://github.com/DavidNgugi/php-blockchain/blob/master/LICENSE)

