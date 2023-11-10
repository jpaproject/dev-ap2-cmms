<?php
namespace App\Helpers;

class FormSva
{
    static function formSvaChecklist1Harian(){
        $data['rw'] = ['25R', 'O7L'];
        $data['substation'] = ['Substation T3', 'Substation T4', 'Substation T5'];
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
                'pagi' => ['ON', 'OFF'],
                'sore' => ['ON', 'OFF'],
            ],
        ];


        return (object) $data;
    }
}