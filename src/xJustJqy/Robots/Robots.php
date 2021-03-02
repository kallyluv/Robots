<?

namespace xJustJqy\Robots;

use pocketmine\entity\Entity;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;

class Robots extends PluginBase {

    /** @var array */
    private $robots = [];

    public function onEnable() {
      $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
      $this->getServer()->getCommandMap()->registerAll("robot", [new RobotCommand()]);
      Entity::registerEntity(Robot::class, true);
    }

    public function createRobot(Player $owner) : bool {
      if(isset($this->robots[$owner->getName()])) {
        unset($this->robots[$owner->getName()]);
      }
      $nbt = Entity::createBaseNBT($player, null, $player->getYaw(), $player->getPitch());
      $nbt->setTag($owner->getNamedTag()->getTag("Skin"));
      $nbt->setString("playername", $player->getName() . "'s Robot");
      $robot = new Robot($owner->getLevel(), $nbt);
      $robot->setNameTagAlwaysVisible(true);
      $robot->spawnToAll();
      $robot->getDataPropertyManager()->setFloat(Entity::DATA_SCALE, $scale);
      $robot->sendData($robot->getViewers());
    }

}
