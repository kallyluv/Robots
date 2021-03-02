<?

namespace xJustJqy\Robots;

use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class RobotCommand extends Command {

    public function __construct() {
      parent::__construct("robot", "Spawn in a robot!", "/robot", ["robots"]);
      $this->setDescription("Spawn in a robot!");
      $this->setPermission("robot.command");
    }

    public function execute(CommandSender $sender, string $label, array $args) : bool {

      if(!$sender instanceof Player) return true;
      if(Robots::createRobot($sender)){
        $sender->sendMessage("A robot has been spawned in!");
      }else{
        $sender->sendMessage("The robot failed to spawn in!");
      }

      return true;

    }

}
