<?php

declare(strict_types=1);

class University
{
    public string $name;
    public string $country;
    public string $website;

    public function __construct(string $name, string $country, string $website)
    {
        $this->name = $name;
        $this->country = $country;
        $this->website = $website;
    }
}