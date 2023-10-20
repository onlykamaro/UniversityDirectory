<?php

declare(strict_types=1);

class UniversityApp
{
    public function run()
    {
        echo "Enter a country name to get a list of universities (e.g., 'Latvia'). Type 'exit' to quit." . PHP_EOL;

        while (true) {
            $country = readline("Country: ");

            if (strtolower($country) === "exit") {
                break;
            }

            $api = new UniversityAPI();
            $universities = $api->getUniversitiesInCountry($country);

            if (empty($universities)) {
                echo "No universities in given country" . PHP_EOL;
            } else {
                $this->displayUniversities($universities);
            }
        }
        echo "Bye!";
    }
    public function displayUniversities(array $universities): void {
        echo "List of universities in the selected country:". PHP_EOL;

        foreach ($universities as $university) {
            echo "University Name: {$university->name}". PHP_EOL;
            echo "Country: {$university->country}". PHP_EOL;
            echo "Website: {$university->website}". PHP_EOL;
            echo "-----------------------------------". PHP_EOL;
        }
    }
}