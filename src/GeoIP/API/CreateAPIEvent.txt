<?php
declare(strict_types = 1);
namespace GeoIP\API;
use GeoIP\API\updater;
use GeoIP\loader;
use pocketmine\event\plugin\PluginEvent;
class CreateAPIEvent extends PluginEvent{
    public static $handlerList = null;
    /** @var string */
    private $class;
    /**
     * @param loader $plugin
     * @param updater::class $api
     */
    public function __construct(loader $plugin, string $api){
        parent::__construct($plugin);
        if(!is_a($api, updater::class, true)){
            throw new \RuntimeException("Class $api must extend " . updater::class);
        }
        $this->class = updater::class;
    }
    /**
     * @return string
     */
    public function getClass(): string{
        return $this->class;
    }
    /**
     * @param updater::class $api
     */
    public function setClass(string $class): void{
        if(!is_a($class, updater::class, true)){
            throw new \RuntimeException("Class $class must extend " . updater::class);
        }
        $this->class = $class;
    }
}