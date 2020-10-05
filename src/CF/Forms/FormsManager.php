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
  
  
  }

public static function getInfo(Player $player){
  
  }
  
}


  
