<?php

namespace App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance\SingleTableInheritance;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity
 */
class SingleTableInheritanceCEO extends SingleTableInheritanceEmployee
{
    /**
     * @var int
     *
     * @Column(type="integer")
     */
    private $annualSalary;
}
