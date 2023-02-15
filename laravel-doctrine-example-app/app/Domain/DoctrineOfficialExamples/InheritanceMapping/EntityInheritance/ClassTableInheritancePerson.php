<?php

namespace App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({
 *     "person"="ClassTableInheritancePerson",
 *     "employee"="ClassTableInheritanceEmployee",
 *     "ceo"="ClassTableInheritanceCEO",
 *     "cfo"="ClassTableInheritanceCFO"
 * })
 */
class ClassTableInheritancePerson
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
class ClassTableInheritanceEmployee extends ClassTableInheritancePerson
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
 * @Table(name="class_table_inheritance_ceos")
 */
class ClassTableInheritanceCEO extends ClassTableInheritanceEmployee
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
 * @Table(name="class_table_inheritance_cfos")
 */
class ClassTableInheritanceCFO extends ClassTableInheritanceEmployee
{
}
