# PhpAuthProtection
Login page with protection from bruteforce and flood.

1. Login.php (I found it in google) is programm for log in to your page (test.php). There check $SESSION and "test" decide ok or error. Also include secure program for block login page for 10 secs if u had 3 (4) invalide passwd typed.

2. Secure.php program. If login page found invalid passwd then "secure" program increment parameter "attack" in config.ini file. If "attack" = 3 or more then parameter "block" = 1. If "block" = 1 then login program blocked! And show u blockAttack.html. After update page  "secure" program start "timer" program and u show block.html and timer to unblock start (page will load about 10 secs. It's timer!!!). 

3. Timer.php program. Just wait 10 secs and write in config file "attack = 0" and "block=0". Login page unblocked.

4. test.php program. It's our main page. If login faild then u see "No login". Else u see "Hello! hello Admin!".

5. ip.txt and ipbad.txt. Here's write all login and login with incorrect passwords.
4. who.php and whobad.php. Here's writes in ip.txt and ipbad.txt.

RUSSIAN INSTRUCTION HERE:   https://vk.com/wall-39869096_738
