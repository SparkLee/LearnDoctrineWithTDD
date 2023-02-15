<?php

namespace App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance\SingleTableInheritance\DTO;

class EmployeeDTO
{
    /**
     * @var PersonDTO
     */
    private $personDTO;
    /**
     * @var string
     */
    private $empNo;

    /**
     * @return string
     */
    public function getEmpNo(): string
    {
        return $this->empNo;
    }

    /**
     * @param string $empNo
     *
     * @return EmployeeDTO
     */
    public function setEmpNo(string $empNo): EmployeeDTO
    {
        $this->empNo = $empNo;
        return $this;
    }

    /**
     * @return PersonDTO
     */
    public function getPersonDTO(): PersonDTO
    {
        return $this->personDTO;
    }

    /**
     * @param PersonDTO $personDTO
     *
     * @return EmployeeDTO
     */
    public function setPersonDTO(PersonDTO $personDTO): EmployeeDTO
    {
        $this->personDTO = $personDTO;
        return $this;
    }
}

