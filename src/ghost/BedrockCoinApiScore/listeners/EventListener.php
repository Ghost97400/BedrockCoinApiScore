<?php

declare(strict_types=1);

namespace ghost\BedrockCoinApiScore\listeners;



use ghost\BedrockCoinApiScore\Main;
use Ifera\ScoreHud\event\PlayerTagUpdateEvent;
use Ifera\ScoreHud\scoreboard\ScoreTag;
use pocketmine\event\Listener;
use BeeAZZ\BedrockCoinAPI\event\CoinChangeEvent;
use pocketmine\player\Player;
use function is_null;

class EventListener implements Listener {

    private $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;

    }

    public function onCoinChange(CoinChangeEvent $event){
        $username = $event->getPlayer();
        if(is_null($username)){
            return;
        }
        $player = $event->getPlayer();
        if($player instanceof Player && $player->isOnline()){
            (new PlayerTagUpdateEvent($player, new ScoreTag("bedrockcoinapiscore.money", (string) $event->getCoin())))->call();
        }

    }
}