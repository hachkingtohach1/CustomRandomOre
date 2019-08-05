<?php

/**
 * Adapted from the Wizardry License
 *
 * Copyright (c) 2015-2018 DragoVN and contributors
 *
 * Permission is hereby granted to any persons and/or organizations
 * using this software to copy, modify, merge, publish, and distribute it.
 * Said persons and/or organizations are not allowed to use the software or
 * any derivatives of the work for commercial use or any other means to generate
 * income, nor are they allowed to claim this software as their own.
 *
 * The persons and/or organizations are also disallowed from sub-licensing
 * and/or trademarking this software without explicit permission from DragoVN.
 *
 * Any persons and/or organizations using this software must disclose their
 * source code and have it publicly available, include this license,
 * provide sufficient credit to the original authors of the project (IE: DragoVN),
 * as well as provide a link to the original project.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,FITNESS FOR A PARTICULAR
 * PURPOSE AND NON INFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE
 * USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
 
namespace DragoVN;

// Player, Entity //
use pocketmine\Player;

// Level, Vector3 //
use pocketmine\level\Level;
use pocketmine\math\Vector3;

// Listener, PluginBase //
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

// Commands //
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

// Events //
use pocketmine\event\block\BlockUpdateEvent;

//utils
use pocketmine\utils\TextFormat;

// Blocks //
use pocketmine\block\Block;
use pocketmine\block\Cobblestone;
use pocketmine\block\Fence;
use pocketmine\block\Water;
use pocketmine\block\IronOre;
use pocketmine\block\DiamondOre;
use pocketmine\block\EmeraldOre;
use pocketmine\block\GoldOre;
use pocketmine\block\CoalOre;
use pocketmine\block\LapisOre;
use pocketmine\block\RedstoneOre;
use pocketmine\block\Quartz;
use pocketmine\block\Coal;
use pocketmine\block\Emerald;

class Main extends PluginBase implements Listener{
    
	    //---------------------------------------------------------------------------------
        public function onEnable(){
		  $this->initConfig();
		  $this->getLogger()->info(TextFormat::GOLD . "------------------------------");
          $this->getLogger()->info(TextFormat::GREEN . "Plugin by DragoVN!");
		  $this->getLogger()->info(TextFormat::AQUA . "Thanks for using! You are using version: 1.0");
		  $this->getLogger()->info(TextFormat::GOLD . "------------------------------");
		  $this->getLogger()->info(TextFormat::YELLOW . "Raw materials for making machines are:");
		  $this->getLogger()->info(TextFormat::AQUA . "Water and Fence");
		  
          $this->getServer()->getPluginManager()->registerEvents($this,$this);
		}
        //---------------------------------------------------------------------------------
	    public function initConfig(){
          if(!file_exists($this->getDataFolder())){
             @mkdir($this->getDataFolder());
		  }
            if(!is_file($this->getDataFolder()."config.yml")){
               $this->saveResource("config.yml");
			}
               $this->config = new Config($this->getDataFolder()."config.yml", Config::YAML);
		}
        //---------------------------------------------------------------------------------
        public function RandomBlockOne(BlockUpdateEvent $event){
          $block = $event->getBlock();
          $water = false;
          $fence = false;
         for ($i = 2; $i <= 4; $i++) {
            $nearBlock = $block->getSide($i);
            if ($nearBlock instanceof Water) {
                $water = true;
            } else if ($nearBlock instanceof Fence) {
                $fence = true;
            }
            if ($water || $fence) {
                $id = mt_rand(1, 30);
                switch ($id) {
                    case $this->config->get("Random-one");
                           $newBlock = new Cobblestone();               
                        break;
					case $this->config->get("Random-two");
                           $newBlock = new IronOre();
                        break;
                    case $this->config->get("Random-three");
                           $newBlock = new GoldOre();
                        break;
                    case $this->config->get("Random-four");
                           $newBlock = new EmeraldOre();
                        break;
                    case $this->config->get("Random-five");
                           $newBlock = new CoalOre();
                        break;
                    case $this->config->get("Random-six");
                           $newBlock = new RedstoneOre();
                        break;
                    case $this->config->get("Random-seven");
                           $newBlock = new DiamondOre();
                        break;
					case $this->config->get("Random-eight");
                           $newBlock = new LapisOre();
                        break;
                    case $this->config->get("Random-nine");
                           $newBlock = new Quartz();
                        break;
					case $this->config->get("Random-ten");
                           $newBlock = new Coal();
                        break;
					case $this->config->get("Random-eleven");
                           $newBlock = new Emerald();
                        break;
                    default:
                        $newBlock = new Cobblestone();
						
                }
                $block->getLevel()->setBlock($block, $newBlock, true, false);
                return;
            }
        }
    }
}
?>

