<?php

namespace App\DataFixtures;

use App\Entity\Medal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MedalFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
     {
         return ['medals'];
     }

    public function load(ObjectManager $manager)
    {
        $Medal = new Medal();
        $Medal->setName('Brązowy Krzyż Zasługi z Mieczami');
        $Medal->setDescription('Brązowy Krzyż Zasługi z Mieczami został ustanowiony dekretem Prezydenta RP w dniu 19 października 1942 roku. Mógł być on nadawany w czasie wojny, celem nagradzania czynów męstwa i odwagi, dokonanych nie bezpośrednio w walce z nieprzyjacielem oraz zasług położonych względem Państwa lub jego obywateli w warunkach szczególnego niebezpieczeństwa. Do tego orderu mógł być przedstawiany każdy.');
        $Medal->setImage('brazowy_krzyz_zaslugi_z_mieczami.JPG');
        $Medal->setNeededPoints('50');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Srebrny Krzyż Zasługi z Mieczami');
        $Medal->setDescription('Srebrny Krzyż Zasługi z Mieczami został ustanowiony dekretem Prezydenta RP w dniu 19 października 1942 roku. Mógł być on nadawany w czasie wojny, celem nagradzania czynów męstwa i odwagi, dokonanych nie bezpośrednio w walce z nieprzyjacielem oraz zasług położonych względem Państwa lub jego obywateli w warunkach szczególnego niebezpieczeństwa. Do tego orderu mogli być przedstawiani żołnierze w stopniu: major, kapitan, porucznik i podporucznik');
        $Medal->setImage('srebrny_krzyz_zaslugi_z_mieczami.jpg');
        $Medal->setNeededPoints('100');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Złoty Krzyż Zasługi z Mieczami');
        $Medal->setDescription('Złoty Krzyż Zasługi z Mieczami został ustanowiony dekretem Prezydenta RP w dniu 19 października 1942 roku. Mógł być on nadawany w czasie wojny, celem nagradzania czynów męstwa i odwagi, dokonanych nie bezpośrednio w walce z nieprzyjacielem oraz zasług położonych względem Państwa lub jego obywateli w warunkach szczególnego niebezpieczeństwa. Do tego orderu mogli być przedstawiani żołnierze w stopniu: marszałek, generał, pułkownik i podpułkownik');
        $Medal->setImage('zloty_krzyz_zaslugi_z_mieczami.jpeg');
        $Medal->setNeededPoints('150');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Krzyż Walecznych');
        $Medal->setDescription('Polskie odznaczenie wojskowe ustanowione w 1920 roku. Krzyż Walecznych został ustanowiony rozporządzeniem Rady Obrony Państwa z dnia 11 sierpnia 1920 roku celem nagrodzenia czynów męstwa i odwagi, wykazanych w boju przez oficerów, podoficerów i szeregowców[2]. W wyjątkowych przypadkach mógł być nadany osobom cywilnym współdziałającym z armią czynną.');
        $Medal->setImage('krzyz_walecznych.jpg');
        $Medal->setNeededPoints('300');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Krzyż Wojskowy');
        $Medal->setDescription('Polskie odznaczenie przyznawane żołnierzom Sił Zbrojnych i osobom cywilnym za zasługi w działaniach przeciw terroryzmowi lub podczas operacji pokojowych i stabilizacyjnych. Jest jednym z odznaczeń wojskowych, które nadawane są w Polsce za czyny bojowe w czasie pokoju.');
        $Medal->setImage('krzyz_wojskowy.jpeg');
        $Medal->setNeededPoints('250');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Krzyż Zasługi za Dzielność');
        $Medal->setDescription('Polskie odznaczenie państwowe ustanowione w 1928, jako odmiana Krzyża Zasługi, celem szczególnego wyróżnienia żołnierzy, funkcjonariuszy Policji i służb mundurowych. Krzyż został zniesiony w 1944 i wznowiony w 1992.');
        $Medal->setImage('krzyz_zaslugi_za_dzielnosc.jpg');
        $Medal->setNeededPoints('200');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Medal Wojska');
        $Medal->setDescription('Polskie odznaczenie wojskowe. Medal Wojska został ustanowiony dekretem Prezydenta RP na Uchodźstwie w Londynie dnia 3 lipca 1945. Nadawany był żołnierzom wojsk lądowych Polskich Sił Zbrojnych na Zachodzie za czyny dokonane w czasie II wojny światowej.');
        $Medal->setImage('medal_wojska.jpg');
        $Medal->setNeededPoints('30');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Order Krzyża Niepodległości');
        $Medal->setDescription('Piąte w kolejności polskie państwowe odznaczenie cywilne, nadawane osobom, które w latach 1939–1956 jako ochotnicy lub podejmując się służby ponad wymaganą od nich miarę położyły zasługi w obronie niepodległości Państwa Polskiego. Zostało ustanowione ustawą z dnia 5 sierpnia 2010 i jest kontynuacją ustanowionego 29 października 1930 Krzyża Niepodległości');
        $Medal->setImage('order_krzyza_niepodleglosci.jpeg');
        $Medal->setNeededPoints('500');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Order Krzyża Wojskowego');
        $Medal->setDescription('Polski order wojskowy przyznawany żołnierzom Sił Zbrojnych i osobom cywilnym za wybitne zasługi w działaniach przeciw terroryzmowi lub podczas operacji pokojowych. Stanowi najwyższe z odznaczeń wojskowych nadawanych w Polsce za czyny bojowe w czasie pokoju.');
        $Medal->setImage('Order_krzyza_wojskowego.jpg');
        $Medal->setNeededPoints('600');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Order Odrodzenia Polski');
        $Medal->setDescription('Drugie pod względem starszeństwa polskie państwowe odznaczenie cywilne (po Orderze Orła Białego), nadawane za wybitne osiągnięcia na polu oświaty, nauki, sportu, kultury, sztuki, gospodarki, obronności kraju, działalności społecznej, służby państwowej oraz rozwijania dobrych stosunków z innymi krajami. Ustanowione przez Sejm Rzeczypospolitej ustawą z dnia 4 lutego 1921 jako najwyższe odznaczenie państwowe po Orderze Orła Białego. Na straży honoru Orderu stoi Kapituła Orderu.');
        $Medal->setImage('order_odrodzenia_polski.jpg');
        $Medal->setNeededPoints('700');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Order Orła Białego');
        $Medal->setDescription('Najstarsze i najwyższe odznaczenie państwowe Rzeczypospolitej Polskiej nadawane za znamienite zasługi cywilne i wojskowe dla pożytku Rzeczypospolitej Polskiej, położone zarówno w czasie pokoju, jak i w czasie wojny. Nie dzieli się na klasy. Nadawany jest najwybitniejszym Polakom oraz najwyższym rangą przedstawicielom państw obcych');
        $Medal->setImage('order_orla_bialego.jpg');
        $Medal->setNeededPoints('1000');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Order Zasługi Rzeczypospolitej');
        $Medal->setDescription('Cywilne odznaczenie państwowe Rzeczypospolitej Polskiej. Order jest nadawany cudzoziemcom i zamieszkałym za granicą obywatelom polskim, którzy swoją działalnością wnieśli wybitny wkład we współpracę międzynarodową oraz współpracę łączącą Rzeczpospolitą Polską z innymi państwami i narodami.');
        $Medal->setImage('order_zaslugi_rzeczypospolitej.jpg');
        $Medal->setNeededPoints('400');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Virtuti Militari');
        $Medal->setDescription('Najwyższe polskie odznaczenie wojenne, nadawane za wybitne zasługi bojowe. Jest jednym z najstarszych orderów wojennych na świecie[1]. Ustanowiony przez króla Stanisława Augusta Poniatowskiego 22 czerwca 1792 dla uczczenia zwycięstwa w bitwie pod Zieleńcami po rozpoczęciu wojny polsko-rosyjskiej przeciwko interwencji Imperium Rosyjskiego i konfederacji targowickiej, a w obronie Konstytucji 3 maja. Dewiza orderu brzmi: Honor i Ojczyzna.');
        $Medal->setImage('Virtuti Militari.jpg');
        $Medal->setNeededPoints('800');
        $manager->persist($Medal);

                $Medal = new Medal();
        $Medal->setName('Medal za Długoletnią Służbę');
        $Medal->setDescription('Polskie odznaczenie cywilne z okresu II Rzeczypospolitej, nadawane za pracę w służbie państwowej, przywrócone do systemu odznaczeń państwowych w Polsce w 2007 roku.');
        $Medal->setImage('za_dlugoletnia_sluzbe.jpg');
        $Medal->setNeededPoints('20');
        $manager->persist($Medal);


                $Medal = new Medal();
        $Medal->setName('unknown');
        $Medal->setDescription('Musisz zdobyć więcej punktów, aby odblokować to odznaczenie');
        $Medal->setImage('unknown.jpg');
        $Medal->setNeededPoints('0');
        $manager->persist($Medal);

        $manager->flush();
    }
}
