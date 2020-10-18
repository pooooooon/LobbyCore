<?php

namespace CF\Events;

use pocketmine\event\Listener as LT;
use pocketmine\event\player\{PlayerJoinEvent, PlayerRespawnEvent, PlayerInteractEvent};
use pocketmine\{Player, Server};
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
use CF\Forms\{FormsManager};
use CF\Manager\HubCreate;
class JoinEvent implements LT {

public function onJoinEvent(PlayerJoinEvent $event){
$player = $event->getPlayer();
$config = Main::Config();
$name = $player->getName();
$event->setJoinMessage("");
Main::Items()->getItems($player);
if(HubCreate::getWorld()){
$player->teleport(HubCreate::TeleportHub());
} else {
$player->sendMessage("No world");
}
Server::getInstance()->broadcastMessage($config->get("prefix-myserver") . " §f" . $name . " " . $config->get("join-msg"));
}

public function onRespawn(PlayerRespawnEvent $event){
$player = $event->getPlayer();
Main::Items()->getItems($player);
$event->setRespawnPosition(HubCreate::TeleportHub());
}

public function InteractionItem(PlayerInteractEvent $event){
$player = $event->getPlayer();
$item = $event->getItem();
if($item->getCustomName() == "§1§kA§r§bTravel§1§kA"){
FormsManager::getGames($player);
}else if($item->getCustomName() == "§b§kB§r§aCosmetics§b§kB"){
$event->setCancelled();
FormsManager::getCosmetic($player);
}else if($item->getCustomName() == "§e§kC§r§e§fInformation§e§kC"){
FormsManager::getInfo($player);
      }
   }
}
?>
