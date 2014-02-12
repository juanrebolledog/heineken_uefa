<?php

class CodeTest extends TestCase {

    public function testValid()
    {
        $one_code = Code::first();
        $this->assertTrue(Code::valid($one_code->valor));
    }

    public function testInvalid()
    {
        $invalid_code = 'odjfodfj';
        $this->assertFalse(Code::valid($invalid_code));
    }

    public function testExchangeTwice()
    {
        $one_code = Code::first();
        $exchange = Code::exchange($one_code->valor);
        $this->assertTrue(!empty($exchange));
        $this->assertEquals(3, count($exchange));

        $exchange = Code::exchange($one_code->valor);
        $this->assertTrue(empty($exchange));
    }

    public function testExchange()
    {
        $one_code = Code::first();
        $exchange = Code::exchange($one_code->valor);
        $this->assertTrue(!empty($exchange));
        $this->assertEquals(3, count($exchange));
    }

    public function testExchangeDistribution()
    {
        $results = array();
        $group_counter = array(1 => 0, 2 => 0, 3 => 0);
        $group_probability = array(1 => 0, 2 => 0, 3 => 0);
        $total = 0;
        $codes = Code::all();
        foreach ($codes as $code)
        {
            $exchange = Code::exchange($code->valor);
            array_push($results, $exchange);
            foreach ($exchange as $team)
            {
                $total += 1;
                $group_counter[$team->grupo] += 1;
            }
        }

        $group_probability[1] = $group_counter[1] * 100 / $total;
        $group_probability[2] = $group_counter[2] * 100 / $total;
        $group_probability[3] = $group_counter[3] * 100 / $total;

        $this->assertTrue($group_probability[1] <= 15);
        $this->assertTrue($group_probability[1] <= 50);
        $this->assertTrue($group_probability[1] <= 75);
    }

}