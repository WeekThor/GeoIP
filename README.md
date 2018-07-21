# GeoIP
This plugin shows players GeoIP by MaxMind databese<br /><br />
## Uptates:
Modules support added (ToDo: modules creation giud) <br /><br />
## Config
``` yml
############################################################
# +------------------------------------------------------+ #
# |                    GLOBAL SETTINGS                   | #
# +------------------------------------------------------+ #
############################################################

# Show city's name?
#   true - show
#   false - don't show
showCity: true

# Show country's name?
#   true - show
#   false - don't show
showCountry: true

# Show subdivision's name?
#   true - show
#   false - don't show
showStats: false

# Show continent's names?
#   true - show
#   false - don't show
showContinent: false

# The language in which the names will be displayed (see the "List of available languages" section below)
language: 'en'



############################################################
# +------------------------------------------------------+ #
# |             List of available languages              | #
# +------------------------------------------------------+ #
############################################################

# Designation for 'language' | language name
# de     | German
# en     | English 
# es     | Spanish
# fr     | French
# ja     | Japanese
# pt-BR  | Portuguese
# ru     | Russian
# zh-CN  | Chinese


############################################################
# +------------------------------------------------------+ #
# |                  Message settings                    | #
# +------------------------------------------------------+ #
############################################################
GeoPlayer:
  Player: '§6====== Player: §c{player}§6 ======'
  IP: '§6- IP: §c'
  Continent: '§6- Continent: §c'
  Country: '§6- Country: §c'
  Subdivisions: '§6- Subdivision: §c'
  City: '§6- City: §c'

GeoIP:
  IP: '§6====== IP: §c{ip}§6 ======'
  Continent: '§6- Continent: §c'
  Country: '§6- Country: §c'
  Subdivisions: '§6- Subdivision: §c'
  City: '§6- City: §c'
  
PlayerOffline: '§4[Error] §cPlayer offline!!'
  
# Messages for official modules
Modules:
  GeoWhois:
    Header: '§6====== WhoIs: §c{name} §6======'
    Nick: '§6- Nick: §c'
    Health: '§6- Health: §c{0}§6/20'
    Hunger: '§6- Hunger: §c{0}§6/20 (+§c{1}§6 насыщение)'
    Exp: '§6- Exp: §c{0}§6 (level §c{1}§6)'
    Location: '§6- Location: (§c{world}§6)'
    IP: '§6- IP: §c'
    GeoLocation: '§6- GeoLocation: §c'
    GameMode: '§6- GameMode: §c'
    God: '§6- God: §c'
    OP: '§6- OP: §c'
    FLY: '§6- FLY: §c{0}§6 (§c{1}§6)'
    AFK: '§6- AFK: §c'
    Jail: '§6- In Jail: §c'
    Mute: '§6- In mute: §c'
    string_true: '§atrue'
    string_false: '§cfalse'
    not_flying: 'not flying'
    flying: 'flying'
    year: 'year'
    mouth: 'mouth'
    day: 'day'
    hour: 'hour'
    minute: 'minute'
    second: 'second'

creative: 'creative'
survival: 'survival'
adventure: 'adventure'
spectator: 'spectator'
```
