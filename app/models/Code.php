<?php

class Code extends Eloquent {
    protected $guarded = array();

    public $timestamps = false;

    public $table = 'codigos';

    public static $rules = array();

    static public function valid($value)
    {
        $code = Code::where('valor', $value)->first();
        if (isset($code->exists) && $code->exists && $code->activo)
        {
            return true;
        }
        return false;
    }

    static public function exchange($value)
    {
        if (self::valid($value))
        {
            $code = Code::where('valor', $value)->first();
            $code->activo = false;
            if ($code->save())
            {
                $teams = array();
                foreach (range(1, 3) as $j)
                {
                    array_push($teams, self::pick());
                }
                return $teams;
            }
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

        $group_teams = Team::getAvailableTeams($selected_group);
        if (!$group_teams->isEmpty())
        {
            return $group_teams[mt_rand(0, $group_teams->count()-1)];
        }
    }


}
