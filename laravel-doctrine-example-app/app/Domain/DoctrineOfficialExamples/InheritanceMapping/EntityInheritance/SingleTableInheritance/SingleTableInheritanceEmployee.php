<?php

namespace App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance\SingleTableInheritance;

use App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance\SingleTableInheritance\DTO\EmployeeDTO;
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

    /**
     * @param EmployeeDTO $employeeDTO
     */
    public function updateFromDTO($employeeDTO)
    {
        $this->empNo = $employeeDTO->getEmpNo();
        return $this;
    }
}
