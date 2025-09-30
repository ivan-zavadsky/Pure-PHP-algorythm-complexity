<?php

class Nested
{
    public $input = [
        ['id' => 111, 'count' => 100, 'Price' => 30, 'pack' => 1,],
        ['id' => 222, 'count' => 60, 'Price' => 11, 'pack' => 10,],
        ['id' => 333, 'count' => 100, 'Price' => 13, 'pack' => 50,],
//        ['id' => 444, 'count' => 65, 'Price' => 12, 'pack' => 5,],
    ];
    public $N = 76;
    public $numberOfNestedLoops;
    public $limit;
    public $s;

    public function __construct()
    {
        $this->limit = $this->N;
        $this->numberOfNestedLoops = count($this->input);
    }
    public function go()
    {
        $n = new Nested();
        $n->cycle(0, $this->numberOfNestedLoops);
        ksort($n->s);
        echo current($n->s);

    }

    private function myFunc($quantities)
    {
        $unitsOrdered = 0;
        $unitsCost = 0;
        $isCountLimitSatisfied = true;
        foreach ($quantities as $key => $q) {
            $pack = $this->input[$key]['pack'];
            $price = $this->input[$key]['Price'];
            $count = $this->input[$key]['count'];

            $isCountLimitSatisfied &= $count > $q * $pack;
            if (!$isCountLimitSatisfied) {
                return;
            }
            $unitsOrdered += $q * $pack;
            $unitsCost += $q * $pack * $price;
        }

        if (
            $unitsOrdered == $this->N
        )
        {
            $pairs = [];
            foreach ($quantities as $key => $q) {
                if (!$q) {
                    continue;
                }
                $id = $this->input[$key]['id'];
                $pack = $this->input[$key]['pack'];
                $pairs[] = "[$id, " . $q * $pack . "]";
            }
            $this->s[$unitsCost] = '[' . implode(',', $pairs) . ']' ;
        }

    }
    private function cycle(int $depth, int $maxDepth, array $currentValues = []): void
    {
        if ($depth === $maxDepth) {
            $this->myFunc($currentValues);

            return;
        }

        for ($i = 0; $i < $this->limit; $i++) {
            $newValues = $currentValues;
            $newValues[] = $i;
            $this->cycle($depth + 1, $maxDepth, $newValues);
        }
    }
}