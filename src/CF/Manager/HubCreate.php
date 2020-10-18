<?php

namespace CF\Manager;

use pocketmine\level\{Level, Position};
use pocketmine\{Player, Server};
use pocketmine\utils\Config;
use CF\Main;
class HubCreate {

public static function createHub(Player $player, string $mundo){
$hub = new Config(Main::getCore()->getDataFolder()."hub.yml", Config::YAML);
$hub->set("Level", $mundo);
$hub->save();
Main::getCore()->getLogger()->notice("Registered World :D");
}

public static function createSpawn(Player $player){
$hub = new Config(Main::getCore()->getDataFolder()."hub.yml", Config::YAML);
$hub->set("Spawns", [
$player->getFloorX(),
$player->getFloorY(),
$player->getFloorZ()
]);
$hub->save();
Main::getCore()->getLogger()->notice("Registered Spawns :D");
}

public static function TeleportHub(){
$hub = new Config(Main::getCore()->getDataFolder()."hub.yml", Config::YAML);
$level = $hub->get("Level");
$levelname = Server::getInstance()->getLevelByName($level);
$spawn = $hub->get("Spawns");
$pos = new Position($spawn[0], $spawn[1], $spawn[2], $levelname);
return $pos;
}

public static function getWorld(){
$hub = new Config(Main::getCore()->getDataFolder()."hub.yml", Config::YAML);
return $hub->get("Level");
}
}
