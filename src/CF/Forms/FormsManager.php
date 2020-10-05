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
$form->setTitle("§b§kB§r§aCosmetics§b§kB§r §eUI");
$form->setContent("§aChoose a cosmetic");
$form->addButton("§eFly"."\n"."§7Click here");
$form->addButton("§eSize"."\n"."§7Click here");
$form->addButton("§eNickName"."\n"."§7Click here");
$form->sendToPlayer($player);
}
  
public static function getGames(Player $player){
$form = new SimpleForm(function (Player $player, int $data = null){
$resultado = $data;
if($resultado === null){
return true;
}
switch ($resultado){
case 0:
break;
}
});
$form->setTitle("Title");
$form->setContent("Content");
$form->addButton("Game 1");
$form->addButton("Game 2");
$form->addButton("Game 3");
$form->addButton("Game 4");
$form->addButton("Game 5");
$form->sendToPlayer($player);
}
  
  
  }

public static function getInfo(Player $player){
  
  }

public static function getFly(Player $player){
if($player->getAllowFlight()){
$player->setFlying(false);
$player->setAllowFlight(false);
$player->sendMessage("§8[§eCF§8] §cFly Disabled");
}else{
$player->setFlying(true);
$player->setAllowFlight(true);
$player->sendMessage("§8[§eCF§8] §aFly Enabled");
}


  
