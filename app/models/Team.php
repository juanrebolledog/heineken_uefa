<?php

class Team extends Eloquent {
    public $table = 'equipos';

    public $timestamps = false;

    protected $guarded = array();

    public static $rules = array();
}
