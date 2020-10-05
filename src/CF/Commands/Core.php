<?php

namespace CF\Comandos;

use CF\Main;
use pocketmine\command\{CommandSender, Command, PluginCommand};
use pocketmine\utils\TextFormat as Text;
use CF\Forms\{FormsManager};

class Core extends PluginCommand {

private $plugin;

public function __construct(Main $plugin){
parent::__construct("core", $plugin);
$this->setAliases(["c", "co"]);
$this->setDescription("LobbyCore Commands");
}

public function execute(CommandSender $sender, Command $cmd, string $label, array $args){
if(isset($args[0])){
$sender->sendMessage(Text::RED."Usage: ".Text::GRAY."/core help");
return false;
}
switch ($args[0]){
case "help":
$logo = "§bCF ";
$sender->sendMessage($logo."§7/core help: Commands Help");
break;
case "sethub":

break;
}
return true;
}
}
