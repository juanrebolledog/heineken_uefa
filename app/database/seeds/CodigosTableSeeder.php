<?php

class CodigosTableSeeder extends Seeder {

    public function run()
    {
        DB::table('codigos')->delete();

        foreach(range(1, 100) as $i)
        {
            $codigo = array(
                'valor' => uniqid()
            );

            DB::table('codigos')->insert($codigo);
        }
    }

}
