# uprising
Interaktywny informator o powstaniu wielkopolskim.

1.	Instalacja xampp

https://www.apachefriends.org/pl/index.html

2.	Instalacja composer

https://getcomposer.org/download/
Przy instalacji wskazać lokalizację PHP w folderze xampp np: C:\Dev\xampp\php\php.exe

3.	Instalacja gita 

https://git-scm.com/download/win

4.	Do C:\Dev\xampp\htdocs klonujemy projekt z repozytorium

git clone https://github.com/walkoda/uprising.git

5.	W katalogu głównym projektu uruchamiamy komende:

composer update

6.	DO C:\Dev\xampp\apache\conf\extra\httpd-vhosts dodajemy:

<VirtualHost *:80>
    DocumentRoot "C:/Dev/xampp/htdocs/uprising/public"
    ServerName uprising
</VirtualHost>

7.	C:\Windows\System32\drivers\etc dodajemy 127.0.0.1 uprising

8.	Uruchamiamy xampp controll panel i usługi Apache i MySQL

9.	Pod http://uprising mamy naszą aplikację.

10.	W katalogu projektu folder public tworzymy plik .htaccess :

<IfModule mod_rewrite.c>
    RewriteEngine On

    RewriteCond %{REQUEST_URI}::$1 ^(/.+)/(.*)::\2$
    RewriteRule ^(.*) - [E=BASE:%1]

    RewriteCond %{REQUEST_FILENAME} -f
    RewriteRule .? - [L]

    RewriteRule .? %{ENV:BASE}/index.php [L]
</IfModule>

11.	Wchodzimy do katalogu projektu i odpalamy 2 komendy

composer require symfony/orm-pack

composer require symfony/maker-bundle –dev
 
12.	W katalogu głównym w pliku .env zmieniamy:

DATABASE_URL=mysql://root@127.0.0.1:3306/uprisingdb

13.	Wchodzimy do katalogu głównego projektu I odpalamy komende:

php bin/console doctrine:database:create

Jak pojawią się jakieś wątpliwości/pytania to jestem dostępny na discordzie.
