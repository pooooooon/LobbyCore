<?php

namespace CF\Manager;

use pocketmine\level\{Level, Position};
use pocketmine\{Player, Server};
use pocketmine\utils\Config;
use CF\Main;
class HubCreate {

public static function createHub(Player $player, string $mundo){
$hub = new Config(Main::getCore()->getDataFolder() . "hub.yml", Config::YAML);
$hub->set("Level", $mundo);
$hub->set("Spawns", [
$player->getFloorX(),
$player->getFloorY(),
$player->getFloorZ()
]);
}

}
