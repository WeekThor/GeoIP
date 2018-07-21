<?
namespace GeoIP\API;
use GeoIP\loader;
use pocketmine\Server;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginDescription;
use pocketmine\plugin\Pluginloader;
use pocketmine\utils\Utils;

class updater{
   /** public function check_upd($pl_name){
        $ess = Server::getPluginManager()->getPlugin($pl_name);
        $plugin->getServer()->getLogger()->notice('§c[GeoIP] §6Проверка наличия обновлений плагина...');
        $response = Utils::getURL("https://api.github.com/repos/TableStudio/PluginsUPDATER/contents/GeoIP.json");
        $i = json_decode($response, true);
        $info = json_decode(base64_decode($i['content']), true);
        $authro = $this->getDescription()->getAuthors();
        $version = $this->getDescription()->getVersion();
        $name = $this->getDescription()->getName();
        $author = $authro[0];
        if($author != $info['Author'] or $name != $info['name'] ){
            $this->disable("CR", true);
        }else{
            $VerCode = str_replace(".", "", $version );
            if($VerCode == $info['VerCode']){
                $this->getServer()->getLogger()->info("§c[GeoIP] §6Обновлений не найдено!");
            }elseif($VerCode < $info['VerCode']){
                $this->getServer()->getLogger()->info("§c[GeoIP] §6Найдена новая версия плагина: §c{$info['version']}!");
                $this->getServer()->getLogger()->info("§c[GeoIP] §6Количество нововведений: §c{$info['upd_news_count']}");
                if(!$info['downloadurl']){  
                }else{
                    $this->getServer()->getLogger()->info("§c[GeoIP] §6Скачать: §c{$info['downloadurl']}");
                }
            }else{
                $this->getServer()->getLogger()->warning("§4[GeoIP] §cУ вас стоит неизвестная нам версия!");
            }
        }
      }
      
          public function disable($code, $report){
        if($code == 'CR'){
            $this->getServer()->getLogger()->info("§4[GeoIP] §c=~=~=~=~=~=~=~=~=~=~=~=~=~=");
            $this->getServer()->getLogger()->info("§4[GeoIP]");
            $this->getServer()->getLogger()->info("§4[GeoIP] §cПлагин был выключен!");
            $this->getServer()->getLogger()->info("§4[GeoIP]");
            $this->getServer()->getLogger()->info("§4[GeoIP] §cАвтор плагина или названия не совпадают с оригиналом!");
            $this->getServer()->getLogger()->info("§4[GeoIP]");
            $this->getServer()->getLogger()->info("§4[GeoIP] §c=~=~=~=~=~=~=~=~=~=~=~=~=~=");
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
    }**/
}