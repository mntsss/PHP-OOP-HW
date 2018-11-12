<?php

namespace Weather\Api;

use Weather\Model\NullWeather;
use Weather\Model\Weather;
use Weather\Api\DataProvider;
class GoogleApi implements DataProvider
{
    /**
     * @return Weather
     * @throws \Exception
     */
    public function selectByDate(\DateTime $date): Weather
    {
        $today = $this->load(new NullWeather());
        $today->setDate($date);

        return $today;
    }

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     * @return array
     */
    public function selectByRange(\DateTime $from, \DateTime $to): array
    {
      $fromClone = clone $from;
      $weatherArray = array();
      while($fromClone < $to){
        $weather = $this->load(new NullWeather());
        $weather->setDate($fromClone);
        $weatherArray[] = $weather;
        $fromClone->modify('+1 day');
      }
      return $weatherArray;
    }

    /**
     * @param Weather $before
     * @return Weather
     * @throws \Exception
     */
    private function load(Weather $before)
    {
        $now = new Weather();
        $base = $before->getDayTemp();
        $now->setDayTemp(random_int(5 - $base, 5 + $base));

        $base = $before->getNightTemp();
        $now->setNightTemp(random_int(-5 - abs($base), -5 + abs($base)));

        $now->setSky(random_int(1, 3));

        return $now;
    }
}
