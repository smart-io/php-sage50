<?php
namespace Sinergi\Sage50;

use Doctrine\ORM\EntityManagerInterface;
use Sinergi\Sage50\SaleOrder\SaleOrderRepository;
use Sinergi\Sage50\SaleOrder\SaleOrderSyncer;
use Sinergi\Sage50\SaleOrder\SaleOrderBuilder;

abstract class Container
{
    /**
     * @return EntityManagerInterface
     */
    abstract function getEntityManager();

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
}
