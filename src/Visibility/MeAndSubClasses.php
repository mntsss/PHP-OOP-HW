<?php

namespace Visibility;

class MeAndSubClasses
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $surname;

    /**
     * @return string
     */
    protected function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    protected function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    protected function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    protected function setSurname(string $surname)
    {
        $this->surname = $surname;
    }
}
