<?php

namespace CF\Comandos;

use pocketmine\command\{Command, CommandSender, PluginCommand};
use pocketmine\utils\{Config, TextFormat as Text};
use pocketmine\{Server, Player};
use CF\Main;
class Hub extends PluginCommand {

private $plugin;

public function __construct(Main $plugin){
parent::_construct("hub", $plugin);
$this->setAliases(["h", "lobby"]);
$this->setDescription("§7Return to Hub");
}

public function execute(CommandSender $player, Command $cmd, string $label, array $args){
if(isset($args)){
$player->sendMessage("§8[§eCF§8] §cUsage: §7/hub");
returm false;
}
$player->setFlying(false);
$player->setAllowFlight(false);
$player->setHealth(20);
$player->setFood(20);
$player->setScale(1);
$player->getArmorInventory()->clearAll();

return true;
}
}
