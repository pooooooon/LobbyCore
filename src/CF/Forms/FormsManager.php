<?php

namespace CF\Forms;

use pocketmine\utils\{Config, TextFormat as Text};
use pocketmine\{Player, Server};
use CF\Forms\{CustomForm, SimpleForm, ModalForm};

class FormsManager {

public static function getCosmetic(Player $player){
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
}
});
$form->setTitle("§b§kB§r§aCosmetics§b§kB§r");
$form->setContent("§aChoose a cosmetic");
$form->addButton("§fFly"."\n"."§eClick here");
$form->addButton("§dSize"."\n"."§eClick here");
$form->addButton("§cNickName"."\n"."§eClick here");
$form->sendToPlayer($player);
}
  
public static function getGames(Player $player){
$form = new SimpleForm(function (Player $player, int $data = null){
if($data === null){
return true;
}
switch ($data){
case 0:
break;
}
});
$form->setTitle("§e§kB§r§aGames§e§kB");
$form->setContent("Select You Favorite Game");
$form->addButton("Game 1");
$form->addButton("Game 2");
$form->addButton("Game 3");
$form->addButton("Game 4");
$form->addButton("Game 5");
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
$form->addButton("§cLeave",0,"textures/ui/check");
$form->sendToPlayer($player);
} else {
$player->sendMessage("§8[§eCF§8] §cYou do not have permissions to use");
}
}

public static function getProfile(Player $player){
$rank = Server::getInstance()->getPluginManager()->getPlugin("PurePerms")->getUserDataMgr($player)->getGroup($player);
$form = new SimpleForm (function (Player $player , int $data = null){
if($data === null){
return true;
}
switch ($data){
case 0:
self::getInfo($player);
break;
}
});
$form->setTitle("My Profile Info");
$form->setContent("NickName: " . $player->getName() . "\n" . "Ping: " . $player->getPing() . "\n" . "Rank: " .$rank. "\n" . "\n" . "Kills: " . "\n" . "Deaths: ");
$form->addButton ("§l§cBack");
$form->sendToPlayer($player);
}

public static function getServerInfo(Player $player){
$online = count(Server::getInstance()->getOnlinePlayers());
$max = Server::getInstance()->getMaxPlayers();
$form = new SimpleForm (function (Player $player , int $data = null){
if($data === null){
return true;
}
switch ($data){
case 0:
self::getInfo($player);
break;
}
});
$form->setTitle("Server Info");
$form->setContent ("Server Name: Example Name" . "\n" . "Online: " . "\n" . $online . "/" . $max . "Shop: link" . "\n" . "Ip: exampleip.xyz");
$form->addButton("§cBack");
$form->sendToPlayer($player);
}

public static function getRanks(Player $player){
$form = new SimpleForm (function (Player $player , int $data = null){
if($data === null){
return true;
}
switch ($data){
case 0:
self::getPublicRanks($player);
break;
case 1:
self::getBuyRanks($player);
break;
case 3:
self::getInfo($player);
break;
}
});
$form->setTitle("§a§kA§eE§bB§r§FRanks§a§kA§eE§bB§r");
$form->setContent("§eRanks Info");
$form->addButton("§fRanks");
$form->addButton("§fHow To Buy");
$form->addButton("§cBack");
$form->sendToPlayer($player);
}

public static function getPublicRanks(Player $player){
$form = new SimpleForm (function(Player $player , int $data = null){
if($data === null){
return true;
}
switch ($data){
case 0:
self::getRanks($player);
break;
}
});
$form->setTitle("Ranks");
$form->setContent("Available Ranks" . "\n" . "Add the ranks, their prices and benefits here ");
$form->addButton("§cBack");
$form->sendToPlayer($player);
}
public static function getBuyRanks(Player $player){
$form = new SimpleForm (function (Player $player , int $data = null){
if($data === null){
return true;
}
switch ($data){
case 0:
self::getRanks($player);
break;
}
});
$form->setTitle("How To Buy");
$form->setContent ("You can edit this text by adding " . "\n" . "Shop: Link" . "\n" . "Prices: $ , € , ¥" . "\n" . "Contact: exampleemail@tcf.com");
$form->addButton("§l§cBack");
$form->sendToPlayer($player);
}
}
