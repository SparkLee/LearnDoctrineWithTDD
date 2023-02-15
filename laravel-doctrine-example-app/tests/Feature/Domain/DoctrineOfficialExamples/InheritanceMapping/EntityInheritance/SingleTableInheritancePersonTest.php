<?php

namespace Tests\Feature\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance;

use App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance\SingleTableInheritance\DTO\EmployeeDTO;
use App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance\SingleTableInheritance\DTO\PersonDTO;
use App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance\SingleTableInheritance\SingleTableInheritanceEmployee;
use App\Domain\DoctrineOfficialExamples\InheritanceMapping\EntityInheritance\SingleTableInheritance\SingleTableInheritancePerson;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Tests\TestCase;

class SingleTableInheritancePersonTest extends TestCase
{
    public function test_should_only_create_person_instance_from_dto()
    {
        // Given
        $dto = (new PersonDTO())
            ->setName('spark')
            ->setAge(18);

        // When
        $person = SingleTableInheritancePerson::createFromDTO($dto);

        // Then
        self::assertSame("Hello, my name is spark, I am 18 years old", $person->greeting());
    }

    public function test_should_only_create_employee_instance_from_dto()
    {
        $employee = SingleTableInheritanceEmployee::createFromDTO(
            (new EmployeeDTO())
                ->setPersonDTO((new PersonDTO())
                    ->setName('lee')
                    ->setAge(35))
                ->setEmpNo('foo001')
        );
        self::assertSame('foo001', $employee->getEmpNo());
    }

    public function test_should_save_person()
    {
        $person = SingleTableInheritancePerson::createFromDTO(
            (new PersonDTO())
                ->setName('spark')
                ->setAge(18)
        );
        EntityManager::persist($person);
        EntityManager::flush();

        /** @var SingleTableInheritancePerson $spark */
        $spark = EntityManager::getRepository(SingleTableInheritancePerson::class)->findOneBy(['name' => 'spark']);
        self::assertSame('spark', $spark->getName());
    }
}
