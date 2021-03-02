<?

namespace xJustJqy\Robots;

use pocketmine\entity\Entity;
use pocketmine\entity\Human;
use pocketmine\level\Level;
use pocketmine\nbt\tag\CompoundTag;

class Robot extends Human {

    public function __construct(Level $level, CompoundTag $nbt) {
      parent::__construct($level, $nbt);
    }

    public function entityBaseTick(int $tickDiff = 1): bool{
      $hasUpdate = parent::entityBaseTick($tickDiff);
      if(!$this->isAlive()){
        return false;
      }
      return $hasUpdate;
    }

}
