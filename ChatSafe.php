<?php 

namespace Withertube ;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat as Color;

class ChatSafe extends PluginBase implements Listener {

    public $badwords = array();

    public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
                $this->getLogger()->info("wurde aktiviert");
		@mkdir($this->getDataFolder());
                   @mkdir($this->getDataFolder() . "/Badwords");
                $this->cfg = $this->getConfig();
                $this->saveDefaultConfig();
                
                           }

	
	
	public function onChat(PlayerChatEvent $event)
        {
                $this->badwords = new Config($this->getDataFolder() . "/Badwords/" . ".yml" , Config::YAML);  
		$msg = $event->getMessage();
                $badwords = $this->cfg->get("badwords");
                $neuersatz = str_ireplace($badwords,"****",$msg); 
                $event->setMessage($neuersatz);
        }
		
		public function onDisable(){
	           $this->getLogger()->info("wurde deaktiviert");
		}
		
		
	}
	
	
	
	
	
	
