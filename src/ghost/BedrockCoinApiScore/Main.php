<?php
declare(strict_types=1);

namespace ghost\BedrockCoinApiScore;


use ghost\BedrockCoinApiScore\listeners\EventListener;
use ghost\BedrockCoinApiScore\listeners\TagResolveListener;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getServer()->getPluginManager()->registerEvents(new  TagResolveListener($this), $this);
    }
}