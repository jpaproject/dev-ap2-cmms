<?php
namespace App\Helpers;

class FormNva
{
    static function formNvaChecklist1Harian()
    {
        $data['listRw'] = [
            [
                'name' => 'runway2',
                'title' => 'RUNWAY 07L - 25R',
                'option' => ['25R', '07L'],
            ],
            [
                'name' => 'runway3',
                'title' => 'RUNWAY 06 - 24',
                'option' => ['06', '24'],
            ],
        ];
        $data['rcms'] = [
            [
                'peralatan' => 'RUNWAY EDGE LIGHT',
                'pagi' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
                'sore' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
            ],
            [
                'peralatan' => 'RUNWAY CENTERLINE LIGHT',
                'pagi' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
                'sore' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
            ],
            [
                'peralatan' => 'PAPI',
                'pagi' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
                'sore' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
            ],
            [
                'peralatan' => 'TRESHOLD / END LIGHT',
                'pagi' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
                'sore' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
            ],
            [
                'peralatan' => 'APPROACH LIGHT',
                'pagi' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
                'sore' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
            ],
            [
                'peralatan' => 'SQUENCE FLASHING LIGHT',
                'pagi' => ['OFF', 'L', 'M', 'H'],
                'sore' => ['OFF', 'L', 'M', 'H'],
            ],
            [
                'peralatan' => 'HIGH SPEED TAXIWAY (HST)',
                'pagi' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
                'sore' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
            ],
            [
                'peralatan' => 'APRON CENTERLINE LIGHT',
                'pagi' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
                'sore' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
            ],
            [
                'peralatan' => 'TAXIWAY EDGE LIGHT',
                'pagi' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
                'sore' => ['OFF', 'VL', 'L', 'M', 'H', 'VH'],
            ],
            [
                'peralatan' => 'STOP BAR LIGHT',
                'pagi' => ['ON', 'OFF'],
                'sore' => ['ON', 'OFF'],
            ],
        ];


        return (object) $data;
    }
}