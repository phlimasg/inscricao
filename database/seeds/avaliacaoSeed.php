<?php

use Illuminate\Database\Seeder;

class avaliacaoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avaliacaos')->insert([
            [
                'DTLIMITE_INSC' => '2018-10-03',
                'DTPROVA' => '2018-10-06',
            ],
            [
                'DTLIMITE_INSC' => '2018-11-07',
                'DTPROVA' => '2018-11-10',
            ],
            [
                'DTLIMITE_INSC' => '2018-12-12',
                'DTPROVA' => '2018-12-15',
            ],
            [
                'DTLIMITE_INSC' => '2019-01-23',
                'DTPROVA' => '2019-01-26',
            ]
            ]);
    }
}
