<?php

namespace Visibility;

class OnlyMe
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @return string
     */
    private function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    private function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    private function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->getName() . ' ' . $this->surname;
    }

    /**
     * @param string $displayName
     */
    public function setFullName(string $displayName)
    {
        $words = explode(' ', $displayName);
        $this->setName($words[0]);
        $this->setSurname($words[1]);
    }
}
