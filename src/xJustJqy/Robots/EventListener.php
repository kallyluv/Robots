<?

namespace xJustJqy\Robots;

use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;

class EventListener extends Listener {

    public function onDamage(EntityDamageEvent $event){
      if($event->getEntity() instanceof Robot){
        $event->setCancelled(true);
      }
    }

}
