<?php

namespace unnyancat\lapisarmor;

use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Refaltor\Natof\CustomItem\CustomItem;

class Main extends PluginBase {
    public static Main $instance;

    protected function onEnable(): void
    {
        $this->getServer()->getLogger()->info("§1Lapis Armor §fget §aInjected");
    }

    public function loadItems() {
        if (Server::getInstance()->getPluginManager()->getPlugin("CustomItem") != null) {

            $helmet = CustomItem::createHelmetItem(new ItemIdentifier(2004, 0), new ArmorTypeInfo(10, 500, 0), "lapis helmet");
            $helmet->setTexture('lapis_helmet');

            $chestplate = CustomItem::createChestPlateItem(new ItemIdentifier(2005, 0), new ArmorTypeInfo(10, 500, 1), "lapis chestplate");
            $chestplate->setTexture('lapis_chestplate');

            $leggings = CustomItem::createLeggingsItem(new ItemIdentifier(2006, 0), new ArmorTypeInfo(10, 500, 2), "lapis leggings");
            $leggings->setTexture('lapis_leggings');

            $boots = CustomItem::createBootsItem(new ItemIdentifier(2007, 0), new ArmorTypeInfo(10, 500, 3), "lapis boots");
            $boots->setTexture('lapis_boots');

            $items = [$chestplate, $helmet, $leggings, $boots];
            foreach ($items as $item) {
                CustomItem::registerItem($item);
            }
        }
    }

    protected function onDisable(): void
    {
        $this->getServer()->getLogger()->info("§cLe test de unnyancat s'arrête");
    }

    protected function onLoad(): void {
        $this->loadItems();
    }
}