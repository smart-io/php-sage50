<?php

namespace Smart\Sage50;

use Doctrine\ORM\EntityManagerInterface;
use Smart\Sage50\Customer\CustomerRepository;
use Smart\Sage50\Customer\CustomerSync;
use Smart\Sage50\Invoice\InvoiceLookup\InvoiceLookupRepository;
use Smart\Sage50\Invoice\InvoiceLookup\InvoiceSync;
use Smart\Sage50\SalesOrder\Item\ItemRepository as SalesOrderItemRepository;
use Smart\Sage50\SalesOrder\SalesOrderBuilder;
use Smart\Sage50\SalesOrder\SalesOrderRepository;
use Smart\Sage50\SalesOrder\SalesOrderSync;

abstract class Container
{
    /**
     * @return EntityManagerInterface
     */
    abstract function getEntityManager();

    /**
     * @var CustomerSync
     */
    private $customerSync;

    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * @var InvoiceSync
     */
    private $invoiceSync;

    /**
     * @var InvoiceLookupRepository
     */
    private $invoiceRepository;

    /**
     * @var SalesOrderBuilder
     */
    private $salesOrderBuilder;

    /**
     * @var SalesOrderSync
     */
    private $salesOrderSync;

    /**
     * @var SalesOrderRepository
     */
    private $salesOrderRepository;

    /**
     * @var SalesOrderItemRepository
     */
    private $salesOrderItemRepository;

    /**
     * @return CustomerSync
     */
    public function getCustomerSync()
    {
        if (null === $this->customerSync) {
            $this->customerSync = new CustomerSync($this->getEntityManager());
        }
        return $this->customerSync;
    }

    /**
     * @param CustomerSync $customerSync
     * @return $this
     */
    public function setCustomerSync(CustomerSync $customerSync)
    {
        $this->customerSync = $customerSync;
        return $this;
    }

    /**
     * @return CustomerRepository
     */
    public function getCustomerRepository()
    {
        if (null === $this->customerRepository) {
            $this->customerRepository = $this->getEntityManager()->getRepository(
                'Smart\\Sage50\\Customer\\CustomerEntity'
            );
        }
        return $this->customerRepository;
    }

    /**
     * @param CustomerRepository $customerRepository
     * @return $this
     */
    public function setCustomerRepository(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
        return $this;
    }

	/**
	 * @return InvoiceSync
	 */
	public function getInvoiceSync()
	{
		if (null === $this->invoiceSync) {
			$this->invoiceSync = new InvoiceSync($this->getEntityManager());
		}
		return $this->invoiceSync;
	}

	/**
	 * @param InvoiceSync $invoiceSync
	 * @return $this
	 */
	public function setInvoiceSync(InvoiceSync $invoiceSync)
	{
		$this->invoiceSync = $invoiceSync;
		return $this;
	}

	/**
	 * @return InvoiceLookupRepository
	 */
	public function getInvoiceRepository()
	{
		if (null === $this->invoiceRepository) {
			$this->invoiceRepository = $this->getEntityManager()->getRepository(
				'Smart\\Sage50\\Invoice\\InvoiceLookup\\InvoiceLookupEntity'
			);
		}
		return $this->invoiceRepository;
	}

	/**
	 * @param InvoiceLookupRepository $invoiceRepository
	 *
*@return $this
	 */
	public function setInvoiceRepository( InvoiceLookupRepository $invoiceRepository)
	{
		$this->invoiceRepository = $invoiceRepository;
		return $this;
	}

    /**
     * @return SalesOrderBuilder
     */
    public function getSalesOrderBuilder()
    {
        if (null === $this->salesOrderBuilder) {
            $this->salesOrderBuilder = new SalesOrderBuilder($this->getEntityManager());
        }
        return $this->salesOrderBuilder;
    }

    /**
     * @param SalesOrderBuilder $salesOrderBuilder
     * @return $this
     */
    public function setSalesOrderBuilder(SalesOrderBuilder $salesOrderBuilder)
    {
        $this->salesOrderBuilder = $salesOrderBuilder;
        return $this;
    }

    /**
     * @return SalesOrderSync
     */
    public function getSalesOrderSync()
    {
        if (null === $this->salesOrderSync) {
            $this->salesOrderSync = new SalesOrderSync($this->getEntityManager());
        }
        return $this->salesOrderSync;
    }

    /**
     * @param SalesOrderSync $salesOrderSync
     * @return $this
     */
    public function setSalesOrderSync(SalesOrderSync $salesOrderSync)
    {
        $this->salesOrderSync = $salesOrderSync;
        return $this;
    }

    /**
     * @return SalesOrderRepository
     */
    public function getSalesOrderRepository()
    {
        if (null === $this->salesOrderRepository) {
            $this->salesOrderRepository = $this->getEntityManager()->getRepository(
                'Smart\\Sage50\\SalesOrder\\SalesOrderEntity'
            );
        }
        return $this->salesOrderRepository;
    }

    /**
     * @param SalesOrderRepository $salesOrderRepository
     * @return $this
     */
    public function setSalesOrderRepository(SalesOrderRepository $salesOrderRepository)
    {
        $this->salesOrderRepository = $salesOrderRepository;
        return $this;
    }

    /**
     * @return SalesOrderItemRepository
     */
    public function getSalesOrderItemRepository()
    {
        if (null === $this->salesOrderItemRepository) {
            $this->salesOrderItemRepository = $this->getEntityManager()->getRepository(
                'Smart\\Sage50\\SalesOrder\\Item\\ItemEntity'
            );
        }
        return $this->salesOrderItemRepository;
    }

    /**
     * @param SalesOrderItemRepository $salesOrderItemRepository
     * @return $this
     */
    public function setSalesOrderItemRepository(SalesOrderItemRepository $salesOrderItemRepository)
    {
        $this->salesOrderItemRepository = $salesOrderItemRepository;
        return $this;
    }
}
