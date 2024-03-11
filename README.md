# Aktivace účtu pomocí externí webové stránky.
Systém je velmi jednoduchý, stačí sledovat kroky níže. :)
Nezapomeň se přidat pro podporu, a mnohem více, zde: https://discord.gg/rdngUwKUqr


# Instalace
1. Stáhnout obsah této repozitáře.
2. Otevřít následující složku v obsahu tvého MTA:SA serveru: mods\deathmatch\resources\
3. Vložit do složky resources obsah složky resources, kterou lze nalézt v obsahu stažené repozitáře.
4. Zapsat resource "web" do mtaserver.conf, ať ho nemusíte stále zapínat.
- Tím jsou všechny kroky ohledně MTA:SA hotové, jdeme dále na web.
5. Stáhnout si XAMPP (tento krok lze přeskočit pouze tehdy, kdy máme například hosting pro svoji webovou stránku nebo jiný způsob pro zapnutí lokálního serveru).
6. Do obsahu webové stránky vložit obsah složky "WEB", která je obsahem stažené repozitáře.
7. Otevřít následující: inc/mtaConn.php
8. Nakonfigurovat si server a auth dle sebe (heslo účtu pro web lze upravit zde: mods\deathmatch\settings.xml, (<setting name="@usercontrolpanel.website_pass" value="HESLO" />) - Při každé změně je potřeba smazat účet website pomocí příkazu do konzole: delaccount website, a poté restartovat server/resource account.
9. Vše otestovat, pokud funguje jak má, hotovo!
9.1 Pokud něco nefunguje, kontaktuj mě zde: https://discord.gg/rdngUwKUqr

# Videoukázka
