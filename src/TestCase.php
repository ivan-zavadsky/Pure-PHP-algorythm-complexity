<?php

namespace Pack;

class TestCase
{
    /** @var Offer[] */
    public array $priceList;
    public int $N;
    public string $label;

    public function __construct(array $priceList, int $N, string $label)
    {
        $this->priceList = $priceList;
        $this->N = $N;
        $this->label = $label;
    }
}
