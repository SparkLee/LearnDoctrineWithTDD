<?php

namespace App\Domain\DoctrineOfficialExamples\InheritanceMapping\MappedSuperclasses;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * @MappedSuperclass
 */
class MappedSuperclassPerson
{
    /**
     * @var int
     *
     * @Column(type="integer")
     */
    protected $mapped1;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    protected $mapped2;

    /**
     * @var MappedSuperclassToothbrush|null
     *
     * @OneToOne(targetEntity="MappedSuperclassToothbrush")
     * @JoinColumn(name="toothbrush_id",referencedColumnName="id")
     */
    protected $toothbrush = null;

    // ... more fields and methods
}

/**
 * @Entity
 */
class MappedSuperclassEmployee extends MappedSuperclassPerson
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

    // ... more fields and methods
}

/**
 * @Entity
 */
class MappedSuperclassToothbrush
{
    /**
     * @var int|null
     *
     * @Id
     * @Column(type="integer")
     */
    private $id = null;

    // ... more fields and methods
}
