<?php

namespace ifteam\AnnouncePro;

use pocketmine\Player;
use pocketmine\scheduler\Task;

class PopupTask extends Task {
	private $string;
	private $player;
	public function __construct(Player $player, $text) {
		$this->string = $text;
		$this->player = $player;
	}
	public function onRun($currentTick) {
		$this->player->sendPopup ( $this->string );
	}
}

?>