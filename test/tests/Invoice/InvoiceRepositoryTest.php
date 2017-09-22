<?php

namespace Smart\Sage50\Tests\Invoice;

use Doctrine\ORM\EntityManager;
use Smart\Sage50\Config;
use Smart\Sage50\Doctrine\Doctrine;
use Smart\Sage50\Invoice\InvoiceEntity;
use PHPUnit\Framework\TestCase;

class InvoiceRepositoryTest extends TestCase
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
		$query = $this->em->getRepository(InvoiceEntity::class)->createQueryBuilder('i');

		$result = $query->orderBy('i.id')
			->setMaxResults(1)
		    ->getQuery()
		    ->getResult();

		$this->assertCount(1, $result);
	}

	public function testFetchItems()
	{
		$query = $this->em->getRepository(InvoiceEntity::class)->createQueryBuilder('i');

		$result = $query->orderBy('i.id')
			->setMaxResults(1)
		    ->getQuery()
		    ->getResult();

		/** @var InvoiceEntity $invoice */
		$invoice = $result[0];

		$this->assertGreaterThanOrEqual(1, count($invoice->getInvoiceLookup()->getItems()));
	}
}
