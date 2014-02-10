<?php

class Code extends Eloquent {
    protected $guarded = array();

    public $table = 'codigos';

    public static $rules = array();

    static public function valid($value)
    {
        $code = Code::where('valor', $value)->first();
        if (isset($code->exists) && $code->exists)
        {
            return true;
        }
        return false;
    }

    static public function exchange($value)
    {
        if (self::valid($value))
        {
            $teams = array();
            foreach (range(1, 3) as $j)
            {
                array_push($teams, self::pick());
            }
            return $teams;
        }
        return false;
    }

    static public function pick()
    {
        $weights = Config::get('app.weights');
        $intervals = array(14, 64, 139);
        $num = mt_rand(0, array_sum($weights)-1);
        $selected_group = 0;
        foreach ($intervals as $group=>$i)
        {
            if ($num <= $i)
            {
                $selected_group = $group + 1;
                break;
            }
        }

        $group_teams = Team::where('grupo', $selected_group)->get();
        return $group_teams[mt_rand(0, count($group_teams)-1)];
    }


}
