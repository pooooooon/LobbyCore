<?php

namespace CF;

use pocketmine\plugin\PluginBase as PB;
use pocketmine\event\Listener as LT;
use pocketmine\{Player, Server};
use CF\ScoreAPI;
use CF\Commands\{Hub, Core};
class Main extends PB implements LT {

public static $instancia;

public function onLoad(){
self::$instancia = $this;
$this->getLogger()->info("Loading LobbyCore..");
}

public function onEnable(){
$this->getServer()->getCommandMap()->register("hub", new Hub($this));
$this->getServer()->getCommandMap()->register("core", new Core($this));
$this->getLogger()->notice("Plugin LobbyCore Enabled");
$this->getLogger()->info("Created by SrClauYT + iFail90");
$this->scoreapi = new ScoreAPI($this);
}

public static function getCore(): Main {
return self::$instancia;
}
}
