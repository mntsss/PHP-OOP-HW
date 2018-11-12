<?php

namespace Weather;

use Weather\Api\DataProvider;
use Weather\Model\Weather;

class Manager
{
    /**
     * @var DataProvider
     */
    private $transporter;

    private $repoNamespace = "Weather\\Api\\";
    private $repoMap = [
      "google" => "GoogleApi",
      "weather" => "WeatherRepository",
      "data" => "DbRepository"
    ];


    /**
     * @param string $provider
     */
    public function __construct(string $provider = "google")
    {
       $this->getTransporter($provider);
    }

    public function getTodayInfo(): Weather
    {
        return $this->transporter->selectByDate(new \DateTime());
    }

    public function getWeekInfo(): array
    {
        return $this->transporter->selectByRange(new \DateTime(), new \DateTime('+7 days'));
    }

    private function getTransporter($provider)
    {
        if (null === $this->transporter) {
          //checks if given provider exists in repos array, if not, defaults to first array entry
            if(array_key_exists($provider, $this->repoMap))
              $repo = $this->repoNamespace.$this->repoMap[$provider];
            else
              $repo = $this->repoNamespace.$this->repoMap[0];

            $this->transporter = new $repo();
        }
    }
}
