<?php

namespace CF\Forms;

use pocketmine\utils\{Config, TextFormat as Text};
use pocketmine\{Player, Server};
use CF\Forms\{CustomForm, SimpleForm, ModalForm};
use CF\Main;
class FormsManager {

public static function getCosmetic(Player $player){
$config = Main::Config();
$form = new SimpleForm(function (Player $player, int $data = null){
if($data === null){
return true;
  }
switch ($data){
case 0:
self::getFly($player);    
break;
case 1:
self::getSize($player);   
break;
case 2:
self::getNickName($player);   
break;
case 3:
$config = Main::Config();
Server::getInstance()->dispatchCommand($player, $config->get("cmd-cosmetic4"));
break;
}
});
$form->setTitle("§b§kB§r§aCosmetics§b§kB§r");
$form->setContent("§aChoose a cosmetic");
$form->addButton("§fFly"."\n"."§eClick here");
$form->addButton("§dSize"."\n"."§eClick here");
$form->addButton("§cNickName"."\n"."§eClick here");
$form->addButton($config->get("button-cosmetic4") . "\n" . "§eClick here");
$form->sendToPlayer($player);
}
  
public static function getGames(Player $player){
$config = Main::Config();
$form = new SimpleForm(function (Player $player, int $data = null){
if($data === null){
return true;
}
switch ($data){
case 0:
$config = Main::Config();
Server::getInstance()->dispatchCommand($player, $config->get("cmd-game1"));
break;
case 1:
$config = Main::Config();
Server::getInstance()->dispatchCommand($player, $config->get("cmd-game2"));
break;
case 2:
$config = Main::Config();
Server::getInstance()->dispatchCommand($player, $config->get("cmd-game3"));
break;
case 3:
$config = Main::Config();
Server::getInstance()->dispatchCommand($player, $config->get("cmd-game4"));
break;  
case 4:
$config = Main::Config();
Server::getInstance()->dispatchCommand($player, $config->get("cmd-game5"));
break;
}
});
$form->setTitle("§e§kB§r§aGames§e§kB");
$form->setContent("Select You Favorite Game");
$form->addButton($config->get("button-game1"));
$form->addButton($config->get("button-game2"));
$form->addButton($config->get("button-game3"));
$form->addButton($config->get("button-game4"));
$form->addButton($config->get("button-game5"));
$form->sendToPlayer($player);
}

public static function getInfo(Player $player){
$form = new SimpleForm (function (Player $player, int $data = null){
if($data === null){
return true;
}
switch ($data){
case 0:
self::getProfile($player);
break;
case 1:
self::getServerInfo($player);
break;
case 2;
self::getRanks($player);
break;
}
});
$form->setTitle("§a§kA§r§bInformation§a§kA§r");
$form->setContent("§eGeneral Information");
$form->addButton("My Profile"."\n"."§eTap To View");
$form->addButton("§fServer"."\n"."§eTap To View");
$form->addButton("§dRanks"."\n"."§eTap To View");
$form->sendToPlayer($player);
}

public static function getFly(Player $player){
if($player->hasPermission("fly.core")){
if($player->getAllowFlight()){
$player->setFlying(false);
$player->setAllowFlight(false);
$player->sendMessage("§cFly Disabled");
} else {
$player->setFlying(true);
$player->setAllowFlight(true);
$player->sendMessage("§aFly Enabled");
                 }
 } else {
 $player->sendMessage("§8[§eCF§8] §cYou do not have permissions to use");
 }
}
public static function getSize(Player $player){
if($player->hasPermission("size.core")){
$form = new SimpleForm (function (Player $player, int $data = null){
if($data === null){
self::getCosmetic($player); 
return true;
}
switch ($data){
case 0:
$player->setScale(0.5);
$player->sendMessage("§eSmall Size Selected");
break;
case 1:
$player->setScale(1.0);
$player->sendMessage("§bNormal Size Selected");
break;
case 2:
$player->setScale(1.5);
$player->sendMessage ("§cBig Size Selected");
break;
case 3:
self::getCosmetic($player); 
break;
}
});
$form->setTitle("§aSize");
$form->setContent("§eSelect The Size You Like");
$form->addButton("§eSmall");
$form->addButton("§bNormal");
$form->addButton("§cBig");
$form->addButton("§l§cBack",0,"textures/ui/check");
$form->sendToPlayer($player);
} else {
$player->sendMessage("§8[§eCF§8] §cYou do not have permissions to use");
}
}

public static function getNickName(Player $player){
if($player->hasPermission("nick.core")){
$form = new CustomForm (function (Player $player, $data){
if($data === null){
self::getCosmetic($player); 
return true;
}
$player->setDisplayName("$data[1]");
$player->setNameTag("$data[1]");
$player->sendMessage("§aYour nickname has been successfully changed!");
$player->sendMessage("§aNew Nick: ".$data[1]);
});
$form->setTitle("§l§cNICKNAME UI");
$form->addLabel("§aNick: ".$player->getNametag());
$form->addInput(" ", "TeamCF");
$form->sendToPlayer($player);
} else {
$player->sendMessage("§8[§eCF§8] §cYou do not have permissions to use");
}
}

public static function getProfile(Player $player){
$rank = Server::getInstance()->getPluginManager()->getPlugin("PurePerms")->getUserDataMgr($player)->getGroup($player);
$config = Main::Config();
$form = new SimpleForm (function (Player $player , int $data = null){
if($data === null){
self::getInfo($player);
return true;
}
switch ($data){
case 0:
self::getInfo($player);
break;
}
});
$form->setTitle("My Profile Info");
$form->setContent("Nick: ".$player->getName() . "\n" . "Ping: ".$player->getPing() . "\n" . "Rank: ".$rank."\n");
$form->addButton("§l§cBack",0,"textures/ui/check");
$form->sendToPlayer($player);
}

public static function getServerInfo(Player $player){
$online = count(Server::getInstance()->getOnlinePlayers());
$max = Server::getInstance()->getMaxPlayers();
$config = Main::Config();
$form = new SimpleForm (function (Player $player , int $data = null){
if($data === null){
self::getInfo($player);
return true;
}
switch ($data){
case 0:
self::getInfo($player);
break;
}
});
$form->setTitle("Server Info");
$form->setContent("Server: " . $config->get("Server") . "\n" . "Online: " . $online . "/" . $max . "\n" . "Shop: " . $config->get("Shop") . "\n" . "IP:  " . $config->get("IP"));
$form->addButton("§l§cBack",0,"textures/ui/check");
$form->sendToPlayer($player);
}

public static function getRanks(Player $player){
$form = new SimpleForm (function (Player $player , int $data = null){
if($data === null){
self::getInfo($player);
return true;
}
switch ($data){
case 0:
self::getPublicRanks($player);
break;
case 1:
self::getBuyRanks($player);
break;
case 2:
self::getInfo($player);
break;
}
});
$form->setTitle("§a§kA§eE§bB§r§FRanks§a§kA§eE§bB§r");
$form->setContent("§eRanks Info");
$form->addButton("§fRanks");
$form->addButton("§fHow To Buy");
$form->addButton("§l§cBack",0,"textures/ui/check");
$form->sendToPlayer($player);
}

public static function getPublicRanks(Player $player){
$config = Main::Config();
$form = new SimpleForm (function(Player $player , int $data = null){
if($data === null){
self::getRanks($player);
return true;
}
switch ($data){
case 0:
self::getRanks($player);
break;
}
});
$form->setTitle("Ranks");
$form->setContent($config->get("content-ranks"));
$form->addButton("§l§cBack",0,"textures/ui/check");
$form->sendToPlayer($player);
}
public static function getBuyRanks(Player $player){
$config = Main::Config();
$form = new SimpleForm (function (Player $player , int $data = null){
if($data === null){
self::getRanks($player);
return true;
}
switch ($data){
case 0:
self::getRanks($player);
break;
}
});
$form->setTitle("How To Buy");
$form->setContent($config->get("text-buyrank") . "\n" . "Shop: " . $config->get("text-shop") . "\n" . "Prices: " . $config->get("text-prices") . "\n" . "Contact: " . $config->get("text-contact"));
$form->addButton("§l§cBack",0,"textures/ui/check");
$form->sendToPlayer($player);
}
}
