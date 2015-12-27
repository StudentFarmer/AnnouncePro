<?php

namespace ifteam\AnnouncePro;

use pocketmine\Player;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class LongPopupTask extends Task {
	private $string;
	private $player;
	private $time;
	public function __construct(Player $player, $text, $time = 5) {
		$this->string = $text;
		$this->player = $player;
		$this->time = $time;
	}
	public function onRun($currentTick) {
		$this->player->sendPopup ( $this->string );
		
		for($i = 0; $i <= $this->time - 1; $i ++)
			Server::getInstance ()->getScheduler ()->scheduleDelayedTask ( new PopupTask ( $player, $text ), 10 * $i );
	}
}

?>