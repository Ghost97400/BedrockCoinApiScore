<?php

declare(strict_types=1);


namespace ghost\BedrockCoinApiScore\listeners;

use ghost\BedrockCoinApiScore\Main;
use pocketmine\event\Listener;
use Ifera\ScoreHud\event\TagsResolveEvent;
use function count;
use function explode;

class TagResolveListener implements Listener {
    private $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
    }

    public function onTagResolve(TagsResolveEvent $event){
        $tag = $event->getTag();
        $tags = explode('.', $tag->getName(), 2);
        $value = "";

        if($tags[0] !== 'bedrockcoinapiscore' || count($tags) <2){
            return;
        }
        switch($tags[1]){
            case "money";
                $this->coin  = $this->plugin->getServer()->getPluginManager()->getPlugin("BedrockCoinAPI");
                $value = $this->coin->myCoin($event->getPlayer());

        }
        $tag->setValue((string) $value);
    }
}