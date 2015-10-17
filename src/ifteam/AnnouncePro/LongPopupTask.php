<?php

namespace ifteam\AnnouncePro;

use pocketmine\scheduler\PluginTask;
use pocketmine\Player;

class LongPopupTask extends PluginTask {
	private $string;
	private $player;
	public function __construct(AnnouncePro $owner, Player $player, string $text) {
		parent::__construct ( $owner );
		$this->string = $text;
		$this->player = $player;
	}
	public function onRun($currentTick) {
		$this->player->sendPopup ( $this->string );
	}
}

?>