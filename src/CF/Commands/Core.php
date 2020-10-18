<?php

namespace CF\Commands;

use CF\Main;
use pocketmine\command\{CommandSender, Command, PluginCommand};
use pocketmine\utils\TextFormat as Text;
use CF\Forms\{FormsManager};
use CF\Manager\HubCreate;
use pocketmine\{Server,Player};
class Core extends PluginCommand {

public $plugin;

public function __construct(Main $plugin){
parent::__construct("core", $plugin);
$this->setAliases(["c", "co"]);
$this->setDescription("LobbyCore Commands");
$this->plugin = $plugin;
}

public function execute(CommandSender $sender, string $label, array $args){
if(!isset($args[0])) {
$sender->sendMessage(Text::RED."Usage: ".Text::GRAY."/core help");
return false;
}
switch ($args[0]){
case "help":
$logo = "§bCF ";
$sender->sendMessage($logo."§7/core help: Commands Help");
$sender->sendMessage("§7/core sethub: Create Hub");
break;
case "sethub":
if(!empty($args[1])) {
if (file_exists(Server::getInstance()->getDataPath()."worlds/".$args[1])) {
Server::getInstance()->loadLevel($args[1]);
$level = Server::getInstance()->getLevelByName($args[1]);
$sender->teleport($level->getSafeSpawn());
HubCreate::createHub($sender->getPlayer(), $args[1]);
$sender->sendMessage("§aUsage: §7/core setspawn");
} else {
$sender->sendMessage(Text::RED."Error: ".Text::GRAY."World not created §f".$args[1]." §7:(");
Main::getCore()->getLogger()->error("There is no world created with the name ".$args[1]);
}
} else {
$sender->sendMessage(Text::RED."Usage: ".Text::GRAY."/core sethub {World}");
Main::getCore()->getLogger()->warning("You wrote wrong :C");
}
break;
case "setspawn":
HubCreate::createSpawn($sender->getPlayer());
break;
default:
$sender->sendMessage(Text::RED."Usage: ".Text::GRAY."/core help");
break;
}
return true;
}
}
