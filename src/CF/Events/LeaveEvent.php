<?php

namespace CF\Events;

use pocketmine\event\Listener as LT;
use pocketmine\{Player, Server};
use pocketmine\utils\{Config, TextFormat as CF};
use pocketmine\event\player\{PlayerQuitEvent};

class LeaveEvent implements Listener {
  
public function EventLeave(PlayerQuitEvent $event){
$player = $event->getPlayer();
$nombre = $olayer->getName();
$event->setQuitMessage("");
}
}