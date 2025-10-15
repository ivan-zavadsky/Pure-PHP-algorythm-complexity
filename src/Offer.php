<?php

namespace Pack;

class Offer
{
    public int $id;
    public int $count;
    public float $price;
    public int $pack;

    public function __construct(int $id, int $count, float $price, int $pack)
    {
        $this->id = $id;
        $this->count = $count;
        $this->price = $price;
        $this->pack = $pack;
    }
}
