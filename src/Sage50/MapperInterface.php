<?php
namespace Sinergi\Sage50;

interface MapperInterface
{
    public function mapFromSage($entity);
    public function mapToSage();
}
