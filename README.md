# CustomRandomOre
One Plugin CustomRandomOre by DragoVN.
<p align="center">
  <img src="https://www.tynker.com/minecraft/api/block?id=578a8c1065e4f2ce648b4567&w=400&h=400&width=400&height=400&mode=contain&format=jpg&quality=75&cache=1m&v=1468697616"/>
</p>
# Raw materials for making machines are: 
- Water and Lava
- Water and Fence
- Lava and Bedrock
# Configuratio File
```yaml
## DO NOT TOUCH THIS
version: 1.3.0
prefix: "&f[&6OreGen&e3&f]"

# Enabling which format should Oregen generate ore
# waterBlock: Block + Water
# lavaBlock: Lava + Block
# waterLava: Water + Lava
mode:
  waterBlock: true
  lavaBlock: false
  waterLava: true

#Compatible block depending on the mode
blocks:
- FENCE
- ACACIA_FENCE
- BIRCH_FENCE
- DARK_OAK_FENCE
- IRON_FENCE

#Disabled worlds
disabledWorlds:
- world
- ASkyBlock
```
