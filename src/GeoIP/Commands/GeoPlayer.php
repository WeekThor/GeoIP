<?php
namespace GeoIP\Commands;
use GeoIP\loader;
use MaxMind\Db\Reader;
use GeoIP\API\CommandAPI;
use pocketmine\block\Air;
use pocketmine\block\Block;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\command\Command;

class GeoPlayer extends CommandAPI{
	public function __construct(loader $plugin){
        parent::__construct($plugin, "geoplayer", "Город по нику", "/geoplayer <ip>", null, ["gp", "geop"]);
        $this->setPermission("geoip.show.by.nick");
    }

	public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}
    if(count($args) === 0){
            $sender->sendMessage("/geoip <ip>");

			return false;
		}
    $cfg = $this->getPlugin()->getConfig();
    $value = array_shift($args);
    $player = $sender->getServer()->getPlayer($value);
    if($player instanceof Player){
      
      $player_ip = $player->getAddress();

      $ipAddress = $player_ip;
      $databaseFile = $this->getPlugin()->getDataFolder() . 'DB/GeoIP2-City.mmdb';

      $reader = new Reader($databaseFile);

      $GeoIP = $reader->get($ipAddress);
      
      
      $lang = $cfg->get('language');
      $sender->sendMessage(str_replace('{player}', $player->getDisplayName(), $cfg->get('GeoPlayer')['Player']));
      $sender->sendMessage($cfg->get('GeoPlayer')['IP'] . $player_ip);
      
      if($cfg->get('showContinent') == true){
        if($GeoIP['continent']['names'][$lang] != null){
          $Continent = $GeoIP['continent']['names'][$lang];
        }else{
          $Continent = 'Не определено!';
        }
        $sender->sendMessage($cfg->get('GeoPlayer')['Continent'] . $Continent);
      }
      if($cfg->get('showCountry') == true){
        if($GeoIP['country']['names'][$lang] != null){
          $Country = $GeoIP['country']['names'][$lang];
        }else{
          $Country = 'Не определено!';
        }
        $sender->sendMessage($cfg->get('GeoPlayer')['Country'] . $Country);
      }
      if($cfg->get('showStats') == true){
        if($GeoIP['subdivisions'][0]['names'][$lang] != null){
          $Subdivisions = $GeoIP['subdivisions'][0]['names'][$lang];
        }else{
          $Subdivisions = 'Не определено!';
        }
        $sender->sendMessage($cfg->get('GeoPlayer')['Subdivisions'] . $Subdivisions);
      }
      if($cfg->get('showCity') == true){
        if($GeoIP['city']['names'][$lang] != null){
          $City = $GeoIP['city']['names'][$lang];
        }else{
          $City = 'Не определено!';
        }
        $sender->sendMessage($cfg->get('GeoPlayer')['City'] . $City);
      }
      
      
      $reader->close();
    }else{
      $sender->sendMessage($cfg->get('PlayerOffline'));
    }
    
    
  }
}
