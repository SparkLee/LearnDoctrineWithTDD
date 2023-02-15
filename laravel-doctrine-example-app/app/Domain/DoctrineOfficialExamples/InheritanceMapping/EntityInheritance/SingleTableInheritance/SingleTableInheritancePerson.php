<?php

namespace App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance\SingleTableInheritance;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
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
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id = null;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    private $name;

    /**
     * @var int
     *
     * @Column(type="integer")
     */
    private $age;

    private function __construct()
    {
    }

    public static function createFromDTO($dto)
    {
        $person = new static();
        $person->name = $dto->getName();
        $person->age = $dto->getAge();
        return $person;
    }

    public function greeting(): string
    {
        return sprintf("Hello, my name is %s, I am %d years old", $this->name, $this->age);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
