<?php

namespace Weather\Api;

use Weather\Model\Weather;

interface DataProvider
{
    /**
     * @param \DateTime $date
     * @return Weather
     */
    public function selectByDate(\DateTime $date): Weather;

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     * @return array
     */
    public function selectByRange(\DateTime $from, \DateTime $to): array;
}
