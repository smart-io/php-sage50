<?php

namespace Smart\Sage50\Tests\SalesOrder;

use Doctrine\ORM\EntityManager;
use PHPUnit_Framework_TestCase;
use Smart\Sage50\Config;
use Smart\Sage50\Doctrine\Doctrine;
use Smart\Sage50\SalesOrder\ItemTax\ItemTaxEntity;
use Smart\Sage50\SalesOrder\SalesOrderEntity;
use Smart\Sage50\SalesOrder\TotalTaxes\TotalTaxesEntity;

class SalesOrderRepositoryTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var EntityManager
	 */
	private $em;

	public function setUp() {
		$doctrine = new Doctrine();
		$doctrine->setConfig((new Config([
			'host' => getenv('MYSQL_HOST'),
			'port' => getenv('MYSQL_PORT'),
			'dbname' => getenv('MYSQL_DATABASE'),
			'user' => getenv('MYSQL_USER'),
			'password' => getenv('MYSQL_PASSWORD')
		]))->setIsDev(true));
		$this->em = $doctrine->getEntityManager();
	}

	public function testFetchOne()
	{
		$query = $this->em->getRepository(SalesOrderEntity::class)->createQueryBuilder('s');

		$result = $query->orderBy('s.id')
			->setMaxResults(1)
		    ->getQuery()
		    ->getResult();

		$this->assertCount(1, $result);
	}

	public function testFetchItems()
	{
		$query = $this->em->getRepository(SalesOrderEntity::class)->createQueryBuilder('i');

		$result = $query->orderBy('i.id')
			->setMaxResults(1)
		    ->getQuery()
		    ->getResult();

		/** @var SalesOrderEntity $invoice */
		$invoice = $result[0];

		$this->assertGreaterThanOrEqual(1, count($invoice->getItems()));
		//$this->assertInstanceOf(ItemTaxEntity::class, $invoice->getItems()[0]->getTax());
	}
}
