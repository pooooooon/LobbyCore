<?php

namespace CF\Forms;

use pocketmine\utils\{Config, TextFormat as Text};
use pocketmine\{Player, Server};
use CF\Forms\{CustomForm, SimpleForm, ModalForm};

class FormsManager {

/**
*@var Code SrClau
**/ 
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
  
/**
*@var Code iFail90
**/
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
$form->setTitle("§e§KB§r§aGames§e§kB§r");
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
self::getProfile;
break;
case 1:
self::getServer;
break;
case 2;
self::getRanks;
}
});
$form->setTitle("§a§kA§r§bInformation§a§kA§r");
$form->setContent("§eGeneral Information");
$form->addButton("aMy Profile"."\n"."§eTap To View");
$form->addButton("§fServer"."\n"."§eTap To View");
$form->addButton("§dRanks"."\n"."§eTap To View");
$form->sendToPlayer($player);
}

/**
*@var Code SrClau
**/
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
/**
*@var Code iFail90
**/
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
$player->setScale(0.5);
$player->sendMessage ("§cBig Size Selected");
break;
}
});
$form->setTitle("§aSize");
$form->setContent("§eSelect The Size You Like");
$form->addButton("§eSmall");
$form->addButton("§bNormal");
$form->addButton("§cBig");
$form->sendToPlayer($player);
} else {
$player->sendMessage("§8[§eCF§8] §cYou do not have permissions to use");
}
}

public static function getProfile(Player $player){
$player->sendMessage("§aMy NickName: §f".$player->getName()."\n"."§aMy Ping: §f".$player->getPing());
}
/**
* public static function getServer
*
* public static function getRanks
**/
