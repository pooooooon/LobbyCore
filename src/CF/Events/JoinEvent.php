<?php

namespace CF\Events;

use pocketmine\event\Listener as LT;
use pocketmine\event\player\{PlayerJoinEvent, PlayerRespawnEvent, PlayerInteractEvent};
use pocketmine\utils\TextFormat as Text;
/**
* @var Just in case (fake)
**/
use pocketmine\item\Item;
/**
* @var Needed for teleportation of the selected world 
**/
use pocketmine\level\{Position, Level};
use CF\Main;
class EventJoin implements LT {

public function onJoinEvent(PlayerJoinEvent $event){
$player = $event->getPlayer();
$event->setJoinMessage("");
Main::Items()->giveItems($player);
//$player->teleport();
}

public function onRespawn(PlayerRespawnEvent $event){
$player = $event->getPlayer();
//$event->setRespawnPosition();
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
