<?php

namespace Pack;

class Printer
{
    public static function print(array $result, string $label): void
    {
        if (empty($result)) {
            echo "Нет решения<br>";
            return;
        }
        $lines = [];
        foreach ($result as $item) {
            $lines[] = "[[{$item['id']}], [{$item['qty']}]]";
        }

        echo $label . ": " . implode(", ", $lines) . "<br>";
    }
}
