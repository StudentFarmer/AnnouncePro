<?php

namespace ifteam\AnnouncePro;

use pocketmine\Player;
use pocketmine\Server;

class AnnounceSystem {
	private static $instance = null;
	public $popups = [ ];
	public function __construct() {
		if (self::$instance == null)
			self::$instance = $this;
	}
	/**
	 * 인스턴스를 반환합니다.
	 *
	 * @return \ifteam\AnnouncePro\AnnounceSystem
	 */
	public static function getInstance() {
		return static::$instance;
	}
	/**
	 * 팝업을 추가합니다.
	 *
	 * @param Player $player        	
	 * @param string $text        	
	 * @param int $time        	
	 */
	public function pushPopup(Player $player, $text, $time = 5) {
		if (! isset ( $this->popups [$player->getName ()] ))
			$this->popups [$player->getName ()] = array ();
		
		array_push ( $this->popups [$player->getName ()], $text );
	}
	/**
	 * 팝업을 모두에게 추가합니다.
	 *
	 * @param string $text
	 * @param int $time
	 */
	public function pushBroadCastPopup($text, $time = 5) {
		$players = Server::getInstance ()->getOnlinePlayers ();
		
		foreach ( $players as $player )
			$this->pushPopup ( $player, $text, $time );
	}
	/**
	 * 바로표시해야하는 팝업을 추가합니다.
	 *
	 * @param Player $player        	
	 * @param string $text        	
	 * @param int $time        	
	 */
	public function pushEmergencyPopup(Player $player, $text, $time = 5) {
		if (! isset ( $this->popups [$player->getName ()] ))
			$this->popups [$player->getName ()] = array ();
		
		array_unshift ( $this->popups [$player->getName ()], $text );
	}
	/**
	 * 바로표시해야하는 팝업을 모두에게 추가합니다.
	 *
	 * @param string $text
	 * @param int $time
	 */
	public function pushBroadCastEmergencyPopup($text, $time = 5) {
		$players = Server::getInstance ()->getOnlinePlayers ();
	
		foreach ( $players as $player )
			$this->pushEmergencyPopup( $player, $text, $time );
	}
	/**
	 * 팝업을 하나 가져옵니다.
	 *
	 * @param Player $player        	
	 * @return string
	 */
	public function receivePopup(Player $player) {
		if (! isset ( $this->popups [$player->getName ()] ))
			return null;
		
		if (count ( $this->popups [$player->getName ()] ) == 0)
			return null;
		
		return ( string ) array_shift ( $this->popups [$player->getName ()] );
	}
}

?>