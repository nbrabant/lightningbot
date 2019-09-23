# LightingBotPHP

##Description
Connector for LightingBot game in PHP environnement

##Game timeline
*Phase 1: connection (20s) - connect to a existing game or create a new one
*Phase 2: infos (2s) - get the informations of the current game
*Phase 3: turn (2s) - each iterations until the end of the game

##API informations
Every request are GET and return JSON response

- URI Base : https://lightningbot.tk/api
- Endpoints :
    - Connect :  GET /connect/{token}
    - Info : GET /info/{token}
    - Directions : GET /directions/{token}/{turn}
    - Move : GET /move/{token}/{direction}/{turn}
- Errors :
    - 0 : Invalid request
    - 1 : Invalid parameter
    - 2 : Request phase is over
    - 3 : Request phase not yet in progress
    - 100 : Full game
    - 101 : Token already used
    - 200 : Winner
    - 201 : Bot is dead
 
##Testing
- URI Base : https://lightningbot.tk/api/test
- Endpoints :
    - Connect : GET /connect/{pseudo}
- Errors :
    - 101 : Pseudo already taken
    - 102 : Pseudo too long
    - 103 : Pseudo not alphanumeric

##Links
* Documentation [Lighting bot](https://webcache.googleusercontent.com/search?q=cache:e8hSEBRZeQAJ:https://lightningbot.tk/doc+&cd=1&hl=fr&ct=clnk&gl=fr)

