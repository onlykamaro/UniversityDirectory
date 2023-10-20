<?php

declare(strict_types=1);

class UniversityAPI
{
    private string $apiUrl = "http://universities.hipolabs.com/search?country=";

    public function getUniversitiesInCountry(string $country): array
    {
        $url = $this->apiUrl . urlencode($country);
        $universities = json_decode(file_get_contents($url), true);
        
        $universitiesObjects = [];

        foreach ($universities as $university)
        {
            $name = $university['name'];
            $country = $university['country'];
            $website = $university['web_pages'][0] ?? "N/A";

            $universityObjects[] = new University($name, $country, $website);
        }
        return $universityObjects;
    }
}