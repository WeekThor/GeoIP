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

class GeoIP extends CommandAPI{
	public function __construct(loader $plugin){
        parent::__construct($plugin, "geoip", "Город по IP", "/geoip <ip>", null, ["gip"]);
        $this->setPermission("geoip.show.by.IP");
    }

	public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}
    if(count($args) === 0){
            $sender->sendMessage("/geoip <ip>");

			return false;
		}
    $value = array_shift($args);

    $ipAddress = $value;
    $databaseFile = $this->getPlugin()->getDataFolder() . 'DB/GeoIP2-City.mmdb';

    $reader = new Reader($databaseFile);

    $GeoIP = $reader->get($ipAddress);
    
    $cfg = $this->getPlugin()->getConfig();
    $lang = $cfg->get('language');
    $sender->sendMessage(str_replace('{ip}', $ipAddress, $cfg->get('GeoIP')['IP']));
    
    if($cfg->get('showContinent') == true){
      if($GeoIP['continent']['names'][$lang] != null){
        $Continent = $GeoIP['continent']['names'][$lang];
      }else{
        $Continent = 'Не определено!';
      }
      $sender->sendMessage($cfg->get('GeoIP')['Continent'] . $Continent);
    }
    if($cfg->get('showCountry') == true){
      if($GeoIP['country']['names'][$lang] != null){
        $Country = $GeoIP['country']['names'][$lang];
      }else{
        $Country = 'Не определено!';
      }
      $sender->sendMessage($cfg->get('GeoIP')['Country'] . $Country);
    }
    if($cfg->get('showStats') == true){
      if($GeoIP['subdivisions'][0]['names'][$lang] != null){
        $Subdivisions = $GeoIP['subdivisions'][0]['names'][$lang];
      }else{
        $Subdivisions = 'Не определено!';
      }
      $sender->sendMessage($cfg->get('GeoIP')['Subdivisions'] . $Subdivisions);
    }
    if($cfg->get('showCity') == true){
      if($GeoIP['city']['names'][$lang] != null){
        $City = $GeoIP['city']['names'][$lang];
      }else{
        $City = 'Не определено!';
      }
      $sender->sendMessage($cfg->get('GeoIP')['City'] . $City);
    }
    
    
    $reader->close();
    
    
  }
}
