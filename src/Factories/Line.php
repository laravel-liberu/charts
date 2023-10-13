<?php

namespace LaravelLiberu\Charts\Factories;

use Illuminate\Support\Collection;
use LaravelLiberu\Charts\Enums\Charts;

class Line extends Chart
{
    private bool $fill;

    public function __construct()
    {
        parent::__construct();

        $this->fill = false;

        $this->type(Charts::Line)
            ->ratio(1.6);
    }

    public function response(): array
    {
        return [
            'data' => [
                'labels' => $this->labels,
                'datasets' => $this->data,
            ],
            'options' => $this->options,
            'title' => $this->title,
            'type' => $this->type,
        ];
    }

    public function fill(): self
    {
        $this->fill = true;

        return $this;
    }

    protected function build(): void
    {
        Collection::wrap($this->datasets)
            ->each(fn ($dataset, $label) => $this->data[] = [
                'fill' => $this->fill,
                'lineTension' => 0.3,
                'pointHoverRadius' => 5,
                'pointHitRadius' => 5,
                'label' => $label,
                'borderColor' => $this->color(),
                'backgroundColor' => $this->hex2rgba($this->color()),
                'data' => $dataset,
                'datalabels' => empty($this->datalabels) ? [
                    'backgroundColor' => $this->color(),
                ] : $this->datalabels,
            ]);
    }
}
