<?php

namespace Smart\Sage50;

use Doctrine\ORM\EntityManagerInterface;
use Smart\Sage50\Customer\CustomerRepository;
use Smart\Sage50\Customer\CustomerSync;
use Smart\Sage50\SaleOrder\SaleOrderRepository;
use Smart\Sage50\SaleOrder\SaleOrderSync;
use Smart\Sage50\SaleOrder\SaleOrderBuilder;
use Smart\Sage50\SaleOrder\Item\ItemRepository as SaleOrderItemRepository;

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
     * @var SaleOrderBuilder
     */
    private $saleOrderBuilder;

    /**
     * @var SaleOrderSync
     */
    private $saleOrderSync;

    /**
     * @var SaleOrderRepository
     */
    private $saleOrderRepository;

    /**
     * @var SaleOrderItemRepository
     */
    private $saleOrderItemRepository;

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
     * @return SaleOrderBuilder
     */
    public function getSaleOrderBuilder()
    {
        if (null === $this->saleOrderBuilder) {
            $this->saleOrderBuilder = new SaleOrderBuilder($this->getEntityManager());
        }
        return $this->saleOrderBuilder;
    }

    /**
     * @param SaleOrderBuilder $saleOrderBuilder
     * @return $this
     */
    public function setSaleOrderBuilder(SaleOrderBuilder $saleOrderBuilder)
    {
        $this->saleOrderBuilder = $saleOrderBuilder;
        return $this;
    }

    /**
     * @return SaleOrderSync
     */
    public function getSaleOrderSync()
    {
        if (null === $this->saleOrderSync) {
            $this->saleOrderSync = new SaleOrderSync($this->getEntityManager());
        }
        return $this->saleOrderSync;
    }

    /**
     * @param SaleOrderSync $saleOrderSync
     * @return $this
     */
    public function setSaleOrderSync(SaleOrderSync $saleOrderSync)
    {
        $this->saleOrderSync = $saleOrderSync;
        return $this;
    }

    /**
     * @return SaleOrderRepository
     */
    public function getSaleOrderRepository()
    {
        if (null === $this->saleOrderRepository) {
            $this->saleOrderRepository = $this->getEntityManager()->getRepository(
                'Smart\\Sage50\\SaleOrder\\SaleOrderEntity'
            );
        }
        return $this->saleOrderRepository;
    }

    /**
     * @param SaleOrderRepository $saleOrderRepository
     * @return $this
     */
    public function setSaleOrderRepository(SaleOrderRepository $saleOrderRepository)
    {
        $this->saleOrderRepository = $saleOrderRepository;
        return $this;
    }

    /**
     * @return SaleOrderItemRepository
     */
    public function getSaleOrderItemRepository()
    {
        if (null === $this->saleOrderItemRepository) {
            $this->saleOrderItemRepository = $this->getEntityManager()->getRepository(
                'Smart\\Sage50\\SaleOrder\\Item\\ItemEntity'
            );
        }
        return $this->saleOrderItemRepository;
    }

    /**
     * @param SaleOrderItemRepository $saleOrderItemRepository
     * @return $this
     */
    public function setSaleOrderItemRepository(SaleOrderItemRepository $saleOrderItemRepository)
    {
        $this->saleOrderItemRepository = $saleOrderItemRepository;
        return $this;
    }
}