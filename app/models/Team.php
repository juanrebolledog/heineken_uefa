<?php

class Team extends Eloquent {
    public $table = 'equipos';

    public $timestamps = false;

    protected $guarded = array();

    public static $rules = array();

    public function scopeActive($query)
    {
        return $query->whereActivo(1);
    }

    static public function getAvailableTeams($group_id)
    {
        $teams = self::active()->where('grupo', $group_id)->get();
        return $teams;
    }
}
