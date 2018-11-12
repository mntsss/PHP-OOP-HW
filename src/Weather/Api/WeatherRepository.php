<?php

namespace Weather\Api;

use Weather\Model\NullWeather;
use Weather\Model\Weather;
use Weather\Api\DbRepository;

class WeatherRepository extends DbRepository
{

    /**
     * @return Weather[]
     */
    private function selectAll(): array
    {
        $weatherArray = [];
        $data = json_decode(
            file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'Db' . DIRECTORY_SEPARATOR . 'Weather.json'),
            true
        );
        foreach ($data as $item) {
            $record = new Weather();
            $record->setDate(new \DateTime($item['date']));
            $record->setDayTemp($item['high']);
            $record->setNightTemp($item['low']);
            $record->setSky($this->convertSky($item['text']));
            $result[] = $record;
        }
        return $weatherArray;
    }

    private function convertSky($sky) :int
    {
        switch ($sky) {
            case 'Cloudy' || 'Mostly Cloudy' || 'Partly Cloudy':
                return 1;
            case 'Scattered Showers':
                return 2;
            default:
                return 3;
        }
    }
}
