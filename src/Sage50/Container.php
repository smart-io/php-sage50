<?php
namespace Sinergi\Sage50;

use Doctrine\ORM\EntityManagerInterface;
use Sinergi\Sage50\Customer\CustomerRepository;
use Sinergi\Sage50\Customer\CustomerSyncer;
use Sinergi\Sage50\SaleOrder\SaleOrderRepository;
use Sinergi\Sage50\SaleOrder\SaleOrderSyncer;
use Sinergi\Sage50\SaleOrder\SaleOrderBuilder;
use Sinergi\Sage50\SaleOrder\Item\ItemRepository as SaleOrderItemRepository;

abstract class Container
{
    /**
     * @return EntityManagerInterface
     */
    abstract function getEntityManager();

    /**
     * @var CustomerSyncer
     */
    private $customerSyncer;

    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * @var SaleOrderBuilder
     */
    private $saleOrderBuilder;

    /**
     * @var SaleOrderSyncer
     */
    private $saleOrderSyncer;

    /**
     * @var SaleOrderRepository
     */
    private $saleOrderRepository;

    /**
     * @var SaleOrderItemRepository
     */
    private $saleOrderItemRepository;

    /**
     * @return CustomerSyncer
     */
    public function getCustomerSyncer()
    {
        if (null === $this->customerSyncer) {
            $this->customerSyncer = new CustomerSyncer($this->getEntityManager());
        }
        return $this->customerSyncer;
    }

    /**
     * @param CustomerSyncer $customerSyncer
     * @return $this
     */
    public function setCustomerSyncer(CustomerSyncer $customerSyncer)
    {
        $this->customerSyncer = $customerSyncer;
        return $this;
    }

    /**
     * @return CustomerRepository
     */
    public function getCustomerRepository()
    {
        if (null === $this->customerRepository) {
            $this->customerRepository = $this->getEntityManager()->getRepository(
                'Sinergi\\Sage50\\Customer\\CustomerEntity'
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
     * @return SaleOrderSyncer
     */
    public function getSaleOrderSyncer()
    {
        if (null === $this->saleOrderSyncer) {
            $this->saleOrderSyncer = new SaleOrderSyncer($this->getEntityManager());
        }
        return $this->saleOrderSyncer;
    }

    /**
     * @param SaleOrderSyncer $saleOrderSyncer
     * @return $this
     */
    public function setSaleOrderSyncer(SaleOrderSyncer $saleOrderSyncer)
    {
        $this->saleOrderSyncer = $saleOrderSyncer;
        return $this;
    }

    /**
     * @return SaleOrderRepository
     */
    public function getSaleOrderRepository()
    {
        if (null === $this->saleOrderRepository) {
            $this->saleOrderRepository = $this->getEntityManager()->getRepository(
                'Sinergi\\Sage50\\SaleOrder\\SaleOrderEntity'
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
                'Sinergi\\Sage50\\SaleOrder\\Item\\ItemEntity'
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
