<?php

namespace App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance\SingleTableInheritance\DTO;

class PersonDTO
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $age;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return PersonDTO
     */
    public function setName(string $name): PersonDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     *
     * @return PersonDTO
     */
    public function setAge(int $age): PersonDTO
    {
        $this->age = $age;
        return $this;
    }
}

