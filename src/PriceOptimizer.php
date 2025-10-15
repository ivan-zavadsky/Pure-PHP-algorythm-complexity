<?php

namespace Pack;

class PriceOptimizer
{
    /** @var Offer[] */
    private array $offers;
    private int $n;
    public array $result;
    private Printer $printer;
    private string $label;

    public function __construct(TestCase $testCase, Printer $printer)
    {
        $this->offers = $testCase->priceList;
        $this->label = $testCase->label;
        $this->n = $testCase->N;
        $this->printer = $printer;
        $this->result = $this->findOptimalPlan();
    }

    public function findOptimalPlan(): array
    {
        usort($this->offers, function (Offer $a, Offer $b) {
            return ($a->price / $a->pack) <=> ($b->price / $b->pack);
        });

        $result = [];
        $remaining = $this->n;

        foreach ($this->offers as $offer) {
            if ($remaining <= 0) {
                break;
            }
            $maxQty = intdiv($remaining, $offer->pack) * $offer->pack;
            $qty = min($maxQty, $offer->count);

            if ($qty > 0) {
                $result[] = ['id' => $offer->id, 'qty' => $qty];
                $remaining -= $qty;
            }
        }

        return $remaining > 0 ? [] : $result;
    }

    public function printResult(): void
    {
        $this->printer->print($this->result, $this->label);
    }
}
