<?php

namespace CF\Commands;

use pocketmine\command\{Command, CommandSender, PluginCommand};
use pocketmine\utils\{Config, TextFormat as Text};
use pocketmine\{Server, Player};
use CF\Main;
use CF\Manager\HubCreate;
class Hub extends PluginCommand {

public $plugin;

public function __construct(Main $plugin){
parent::__construct("hub", $plugin);
$this->setAliases(["h", "lobby"]);
$this->setDescription("§7Return to Hub");
}

public function execute(CommandSender $player, string $label, array $args){
Main::Items()->getItems($player);
$player->setFlying(false);
$player->setAllowFlight(false);
$player->teleport(HubCreate::TeleportHub());
return true;
}
}
