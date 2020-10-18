<?php

namespace CF;

use pocketmine\plugin\PluginBase as PB;
use pocketmine\event\Listener as LT;
use pocketmine\{Player, Server};
use pocketmine\utils\{Config, TextFormat as Text};
use CF\ScoreAPI;
use CF\Commands\{Hub, Core};
use CF\Manager\{Items};
use CF\Events\{JoinEvent,LeaveEvent};
class Main extends PB implements LT {

public static $instancia;
public $prefix = "[LobbyCore] ";
public function onLoad(){
self::$instancia = $this;
$this->getLogger()->info($this->prefix."Loading LobbyCore..");
$this->saveResource("config.yml");
}

public function onEnable(){
$this->getServer()->getCommandMap()->register("hub", new Hub($this));
$this->getServer()->getCommandMap()->register("core", new Core($this));
$this->getServer()->getPluginManager()->registerEvents(new JoinEvent(), $this);
$this->getServer()->getPluginManager()->registerEvents(new LeaveEvent(), $this);
$this->getLogger()->notice($this->prefix."Plugin LobbyCore Enabled");
$this->getLogger()->info($this->prefix."Created by SrClauYT + iFail90");
$this->scoreapi = new ScoreAPI($this);
}

public static function getCore(): Main {
return self::$instancia;
}

public static function Items(){
return new Items();
}

public static function Config(){
return new Config(Main::getCore()->getDataFolder() . "config.yml", Config::YAML);
}
}
