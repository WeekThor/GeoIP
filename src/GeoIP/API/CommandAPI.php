<?php
namespace GeoIP\API;
use GeoIP\loader;
use pocketmine\command\Command;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\utils\TextFormat;
abstract class CommandAPI extends Command implements PluginIdentifiableCommand{
    /** @var loader  */
    private $plugin;
    /** @var null|string */
    private $consoleUsageMessage = null;
    /**
     * @param loader $plugin
     * @param string $name
     * @param string $description
     * @param null|string $usageMessage
     * @param bool|null|string $consoleUsageMessage
     * @param array $aliases
     */
    public function __construct(loader $plugin, $name, $description = "", $usageMessage = null, $consoleUsageMessage = null, array $aliases = []){
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->plugin = $plugin;
        $this->consoleUsageMessage = $consoleUsageMessage;
    }
    /**
     * @return loader
     */
    public final function getPlugin(){
        return $this->plugin;
    }
    /**
     * @return string
     */
    public function getConsoleUsage(){
        if($this->consoleUsageMessage === null){
            $message = "Usage: " . str_replace("[player]", "<player>", $this->getUsage());
        }elseif(!$this->consoleUsageMessage){
            $message = "[Error] Please run this command in-game";
        }else{
            $message = $this->consoleUsageMessage;
        }
        return  $message;
    }
    /**
     * @return string
     */
    public function getUsage(){
        return parent::getUsage();
    }
}
