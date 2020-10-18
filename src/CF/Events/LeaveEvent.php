<?php

namespace CF\Events;

use pocketmine\event\Listener as LT;
use pocketmine\{Player, Server};
use pocketmine\utils\{Config, TextFormat as CF};
use pocketmine\event\player\{PlayerQuitEvent};
use CF\Main;
class LeaveEvent implements LT {
  
public function EventLeave(PlayerQuitEvent $event){
$player = $event->getPlayer();
$config = Main::Config();
$name = $player->getName();
$event->setQuitMessage("");

Server::getInstance()->broadcastMessage($config->get("prefix-myserver") . " §f" . $name . " " . $config->get("leave-msg"));
}
}
