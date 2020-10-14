<?php

namespace CF\Events;

use pocketmine\event\Listener as LT;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\TextFormat as Text;
/**
* @var Just in case (fake)
**/
use pocketmine\item\Item;
/**
* @var Needed for teleportation of the selected world 
**/
use pocketmine\level\{Position, Level};

class EventJoin implements LT {

public function onJoinEvent(PlayerJoinEvent $event){
$player = $event->getPlayer();
$event->setJoinMessage("");
$player->setHealth(20);
$player->setFood(20);
$player->removeAllEffects();
$player->setScale(1);
$player->getArmorInventory()->clearAll();
$player->getInventory()->clearAll();
//$player->teleport();
}

public function onRespawn(PlayerRespawnEvent $event){
$player = $event->getPlayer();
//$event->setRespawnPosition();
$player->setHealth(20);
$player->setFood(20);
$player->removeAllEffects();
$player->setScale(1);
$player->getArmorInventory()->clearAll();
$player->getInventory()->clearAll();
}

public function InteractionItem(PlayerInteractEvent $event){
$player = $event->getPlayer();
$item = $event->getItem();
if($item->getCustomName() == "§1§kA§r§bTravel§1§kA"){
FormsManager::getGames($player);
}else if($item->getCustomName() == "§b§kB§r§aCosmetics§b§kB"){
FormsManager::getCosmetic($player);
}else if($item->getCustomName() == "§e§kC§e§fInformation§e§kC"){
FormsManager::getInfo($player);
      }
   }
}
?>