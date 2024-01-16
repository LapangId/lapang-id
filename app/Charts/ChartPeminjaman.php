<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class ChartPeminjaman extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        $this->options([
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
        ]);

        $this->labels(['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']); // Label pada sumbu X

        $data = [10, 5, 8, 15]; // Jumlah pemesanan per minggu, Anda dapat menggantinya dengan data yang sesuai.
        $this->dataset('Jumlah Pemesanan', 'bar', $data)->backgroundColor('rgba(75, 192, 192, 0.2)'); // Dataset
    }
}