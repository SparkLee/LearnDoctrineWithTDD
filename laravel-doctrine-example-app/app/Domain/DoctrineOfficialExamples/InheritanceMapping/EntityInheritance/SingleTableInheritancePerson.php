<?php

namespace App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\InheritanceType;

/**
 * @Entity
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({
 *     "person"="SingleTableInheritancePerson",
 *     "employee"="SingleTableInheritanceEmployee",
 *     "ceo"="SingleTableInheritanceCEO",
 *     "cfo"="SingleTableInheritanceCFO"
 * })
 */
class SingleTableInheritancePerson
{
    /**
     * @var int|null
     *
     * @Id
     * @Column(type="integer")
     */
    private $id = null;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    private $name;
}

/**
 * @Entity
 */
class SingleTableInheritanceEmployee extends SingleTableInheritancePerson
{
    /**
     * @var int|null
     *
     * @Id
     * @Column(type="integer")
     */
    private $id = null;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    private $age;
}

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

/**
 * @Entity
 */
class SingleTableInheritanceCFO extends SingleTableInheritanceEmployee
{
}

