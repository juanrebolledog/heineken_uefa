<?php

class TeamTest extends TestCase {

    public function testGetAvailableTeams()
    {
        $group_id = 1;
        $teams = Team::getAvailableTeams($group_id);
        $this->assertFalse($teams->isEmpty());
    }

    public function testGetAvailableTeamsNoGroup()
    {
        $group_id = null;
        $teams = Team::getAvailableTeams($group_id);
        $this->assertTrue($teams->isEmpty());
    }

    public function testGetAvailableTeamsNonexistantGroup()
    {
        $group_id = 9999;
        $teams = Team::getAvailableTeams($group_id);
        $this->assertTrue($teams->isEmpty());
    }

}