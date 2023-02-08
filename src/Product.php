<?php

/**
 * @link https://www.doctrine-project.org/projects/doctrine-orm/en/2.14/tutorials/getting-started.html#starting-with-the-product-entity
 */
class Product
{
    private ?int $id = null;
    private string $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}
