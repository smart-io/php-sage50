<?php

namespace Smart\Sage50\Tests\Invoice;

use Doctrine\ORM\EntityManager;
use PHPUnit_Framework_TestCase;
use Smart\Sage50\Config;
use Smart\Sage50\Doctrine\Doctrine;
use Smart\Sage50\Invoice\InvoiceEntity;
use Smart\Sage50\Invoice\InvoiceLookup\ItemTax\ItemTaxEntity;
use Smart\Sage50\Invoice\InvoiceLookup\TotalTaxes\TotalTaxesEntity;

class InvoiceRepositoryTest extends PHPUnit_Framework_TestCase
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

		$this->assertInstanceOf(TotalTaxesEntity::class, $invoice->getInvoiceLookup()->getTotalTaxes());

		$this->assertGreaterThanOrEqual(1, count($invoice->getInvoiceLookup()->getItems()));
		$this->assertInstanceOf(ItemTaxEntity::class, $invoice->getInvoiceLookup()->getItems()[0]->getTax());
	}
}
