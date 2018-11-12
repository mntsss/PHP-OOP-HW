<?php

namespace Visibility;

class UserClassForProtected extends MeAndSubClasses
{
    /**
     * @param string $displayName
     */
    public function setDisplayName(string $displayName)
    {
        $words = explode(' ', $displayName);
        $this->setName($words[0]);
        $this->setSurname($words[1]);
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->surname . ' ' . strtoupper($this->name);
    }
}
