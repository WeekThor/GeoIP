<?php
namespace GeoIP;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use GeoIP\API\CommandAPI;
use GeoIP\API\CreateAPIEvent;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginDescription;
use pocketmine\plugin\Pluginloader;
use pocketmine\utils\Utils;
use pocketmine\utils\Config;
use pocketmine\Player;

//0.1
use GeoIP\Commands\GeoPlayer;
use GeoIP\Commands\GeoIP;
use MaxMind\Db\Reader;

class Loader extends PluginBase{
  public function onLoad(){
    
    $this->registerCommands();
    $this->getServer()->getLogger()->info("§2[GeoIP]§a Загрузка...");
    $this->saveResource('config.yml');
    $this->getServer()->getLogger()->info("§2[GeoIP]§a Загрузка Баз данных...");
    $this->saveResource('DB\GeoIP2-City.mmdb');
  }
  
  public function onEnable(){
    $this->getServer()->getLogger()->info("§2[GeoIP]§a Плагин успешно запущен!");
    
  }
  public function onDisable(){
	  $this->getServer()->getLogger()->info("§4[GeoIP]§c Выключение плагина....");
  }
  
  private function unregisterCommands(array $commands){
        $commandmap = $this->getServer()->getCommandMap();
        foreach($commands as $commandlabel){
            $command = $commandmap->getCommand($commandlabel);
            $command->setLabel($commandlabel . "_disabled");
            $command->unregister($commandmap);
        }
    }
  private function registerCommands(){
        $this->unregisterCommands([

        ]);
        $this->getServer()->getCommandMap()->registerAll("GeoIP", [
            new GeoPlayer($this),
            new GeoIP($this)
		]);
	} 
  
  public function getGeo($ip){

      $ipAddress = $ip;
      $databaseFile = $this->getDataFolder() . 'DB/GeoIP2-City.mmdb';

      $reader = new Reader($databaseFile);

      $GeoIP = $reader->get($ipAddress);

    return $GeoIP;
  }
}