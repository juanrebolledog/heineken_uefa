<?php

class CodigosTableSeeder extends Seeder {

    public function run()
    {
        DB::table('codigos')->truncate();

        foreach(range(1, 100) as $i)
        {
            $codigo = array(
                'valor' => uniqid()
            );

            DB::table('codigos')->insert($codigo);
        }
    }

}
