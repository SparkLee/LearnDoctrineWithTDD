<?php

namespace App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance\SingleTableInheritance;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity
 */
class SingleTableInheritanceEmployee extends SingleTableInheritancePerson
{
    /**
     * @var string
     *
     * @Column(type="string")
     */
    private $empNo;

    public static function createFromDTO($dto)
    {
        $employ = parent::createFromDTO($dto->getPersonDTO());
        $employ->empNo = $dto->getEmpNo();
        return $employ;
    }

    /**
     * @return string
     */
    public function getEmpNo(): string
    {
        return $this->empNo;
    }

}
