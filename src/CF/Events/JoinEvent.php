<?php

namespace CF\Events;

use pocketmine\event\Listener as LT;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\TextFormat as Text;
/**
* @var Just in case
**/
use pocketmine\item\Item;
/**
* @var Needed for teleportation of the selected world 
**/
use pocketmine\level\{Position, Level};

class EventJoin implements LT {

public function onJoinEvent(PlayerJoinEvent $event){
$player = $event->getPlayer();
}

}
?>
