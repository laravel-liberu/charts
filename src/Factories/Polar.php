<?php

namespace LaravelLiberu\Charts\Factories;

use LaravelLiberu\Charts\Enums\Charts;

class Polar extends Circles
{
    public function __construct()
    {
        parent::__construct();

        $this->type(Charts::PolarArea)
            ->ratio(1);
    }
}
