<?php

namespace Smart\Sage50;

use Doctrine\ORM\EntityManagerInterface;

abstract class Sync implements SyncFromSage50Interface, SyncToSage50Interface
{
    /**
     * @var MapperInterface
     */
    protected $mapper;

    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param MapperInterface $mapper
     */
    public function setMapper(MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @return MapperInterface $mapper
     */
    public function getMapper()
    {
        return $this->mapper;
    }

    /**
     * @param RepositoryInterface $repository
     */
    public function setRepository(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return RepositoryInterface $repository
     */
    public function getRepository()
    {
        return $this->repository;
    }
}
