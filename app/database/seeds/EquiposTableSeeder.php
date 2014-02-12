<?php

class EquiposTableSeeder extends Seeder {

    public function run()
    {
        DB::table('equipos')->delete();

        $equipos = array(
            array(
                'nombre' => 'ARSENAL FC',
                'fundado' => '1886-01-01',
                'ranking_uefa' => 6,
                'campeon' => 'NUNCA',
                'abreviacion' => 'ARS',
                'grupo' => 2
            ),
            array(
                'nombre' => 'CLUB ATLÉTICO DE MADRID',
                'fundado' => '1903-01-01',
                'ranking_uefa' => 8,
                'campeon' => 'NUNCA',
                'abreviacion' => 'ATL',
                'grupo' => 2
            ),
            array(
                'nombre' => 'FC BARCELONA',
                'fundado' => '1899-01-01',
                'ranking_uefa' => 1,
                'campeon' => '1992, 2006, 2009, 2011',
                'abreviacion' => 'BAR',
                'grupo' => 1
            ),
            array(
                'nombre' => 'FC BAYERN MÜNCHEN',
                'fundado' => '1900-01-01',
                'ranking_uefa' => 2,
                'campeon' => '1974, 1975, 1976, 2001, 2013',
                'abreviacion' => 'BAY',
                'grupo' => 1
            ),
            array(
                'nombre' => 'BAYER 04 LEVERKUSEN',
                'fundado' => '1904-01-01',
                'ranking_uefa' => 21,
                'campeon' => 'NUNCA',
                'abreviacion' => 'LEV',
                'grupo' => 3
            ),
            array(
                'nombre' => 'BORUSSIA DORTMUND',
                'fundado' => '1909-01-01',
                'ranking_uefa' => 16,
                'campeon' => '1997',
                'abreviacion' => 'BOR',
                'grupo' => 2
            ),
            array(
                'nombre' => 'CHELSEA FC',
                'fundado' => '1905-01-01',
                'ranking_uefa' => 4,
                'campeon' => '2012',
                'abreviacion' => 'CHE',
                'grupo' => 1
            ),
            array(
                'nombre' => 'GALATASARAY AŞ',
                'fundado' => '1905-01-01',
                'ranking_uefa' => 35,
                'campeon' => 'NUNCA',
                'abreviacion' => 'GAL',
                'grupo' => 3
            ),
            array(
                'nombre' => 'MANCHESTER CITY FC',
                'fundado' => '1880-01-01',
                'ranking_uefa' => 18,
                'campeon' => 'NUNCA',
                'abreviacion' => 'CIT',
                'grupo' => 3
            ),
            array(
                'nombre' => 'MANCHESTER UNITED FC',
                'fundado' => '1878-01-01',
                'ranking_uefa' => 5,
                'campeon' => '1968, 1999, 2008',
                'abreviacion' => 'MAN',
                'grupo' => 1
            ),
            array(
                'nombre' => 'AC MILAN',
                'fundado' => '1899-01-01',
                'ranking_uefa' => 10,
                'campeon' => '1963, 1969, 1989, 1990, 1994, 2003, 2007',
                'abreviacion' => 'MIL',
                'grupo' => 2
            ),
            array(
                'nombre' => 'OLYMPIACOS FC',
                'fundado' => '1925-01-01',
                'ranking_uefa' => 26,
                'campeon' => 'NUNCA',
                'abreviacion' => 'OLY',
                'grupo' => 3
            ),
            array(
                'nombre' => 'PARIS SAINT-GERMAIN',
                'fundado' => '1970-01-01',
                'ranking_uefa' => 17,
                'campeon' => 'NUNCA',
                'abreviacion' => 'PSG',
                'grupo' => 3
            ),
            array(
                'nombre' => 'REAL MADRID FC',
                'fundado' => '1902-01-01',
                'ranking_uefa' => 3,
                'campeon' => '1956, 1957, 1958, 1959, 1960, 1966, 1998, 2000, 2002',
                'abreviacion' => 'REA',
                'grupo' => 1
            ),
            array(
                'nombre' => 'FC SHALKE 04',
                'fundado' => '1904-01-01',
                'ranking_uefa' => 12,
                'campeon' => 'NUNCA',
                'abreviacion' => 'SCH',
                'grupo' => 2
            ),
            array(
                'nombre' => 'FC ZENIT',
                'fundado' => '1925-01-01',
                'ranking_uefa' => 20,
                'campeon' => 'NUNCA',
                'abreviacion' => 'ZEN',
                'grupo' => 3
            ),
        );

        foreach ($equipos as $equipo)
        {
            DB::table('equipos')->insert($equipo);
        }
    }

}
