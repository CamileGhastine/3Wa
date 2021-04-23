<?php

namespace App\Classes;

class Sorter
{
    private int $countBrelan = 0;
    private int $countCarre = 0;
    private int $countTwoPaire = 0;
    private int $countYam = 0;

    public function sort(array $allThrow): array
    {
        foreach ($allThrow as $oneThrow) {
            $repartition = $this->analyseThrow($oneThrow);
            $this->analyseCombinaison($repartition);
        }

        return [$this->countTwoPaire, $this->countBrelan, $this->countCarre, $this->countYam];
    }

    private function analyseThrow(array $oneThrow): array
    {
        $repartition = [0, 0, 0, 0, 0, 0];

        foreach ($oneThrow as $dice) {
            $repartition[$dice - 1] += 1;
        }
        return $repartition;
    }

    private function analyseCombinaison(array $repartition): void
    {

        if (in_array(5, $repartition)) {
            $this->countYam += 1;
            // exit;        
        }

        if (in_array(4, $repartition)) {
            $this->countCarre += 1;
            // exit;
        }

        if (in_array(3, $repartition)) {
            $this->countBrelan += 1;
            // exit;
        }

        $countPaire = 0;
        foreach ($repartition as $occ) {
            if ($occ === 2) $countPaire += 1;
        }

        if ($countPaire === 2) $this->countTwoPaire += 1;
    }
}
