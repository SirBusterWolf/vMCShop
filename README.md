![vMCShop](https://vmcshop.pro/assets/images/vmcshop-github.png)

### Ta wersja nie jest już wspierana! Nowa dostępna będzie [tutaj](https://github.com/Verlikylos/vMCShop-Standard).

Aktualna wersja: **1.6.4**

[Instrukcja aktualizacji skryptu do najnowszej wersji](https://github.com/Verlikylos/vMCShop/wiki/Instrukcja-aktualizacji-skryptu-do-najnowszej-wersji)

[Instrukcja instalacji na serwerze WWW](https://verlikylos.me/vmcshop-standard-instrukcja-instalacji-na-serwerze-www/)

<hr>

Demo: [Klik](https://vmcshop.pro/)

Demo ACP: [Klik](https://vmcshop.pro/admin)

Login: **Admin**

Hasło: **password**

<hr>

### Ogłoszenia

## Ważne
Okej, można powiedzieć, że spowrotem wróciły mi chęci do tworzenia sklepu i zamiast robić płatną wersję skryptu (vMCShop Premium), postanowiłem wydać wersję 2.0 vMCShop Standard. Wygląd pozostanie mniej więcej ten sam, ale zostanie dodana dodatkowa funkcjonalność. Z racji na to, że mój czas jest ograniczony premiera odbędzie się najprawdopodobniej gdzieś w okolicach 20 stycznia 2018. Osoby, które chcą pomóc w testowaniu wersji alpha/beta zapraszam do kontaktu, linki poniżej.

#### Aktualizacja
Wrzuciłem już pierwsze demo wersji 2.0.0, można je obejrzeć [tutaj](https://standard.vmcshop.pro/). Aktualnie jest to sam frontend, ale mimo to czekam na jakieś propozycje, rady, pomysły itd., aby wersja 2.0.0 zaraz po premierze spełniała większość Waszych oczekiwań ;)

<hr>

Zapraszam do polubienia [FanPage](https://www.facebook.com/verlikylos), dzięki temu będę mial lepszy kontakt z Wami oraz szybciej dowiecie się o nowych aktualizacjach.

**Zanim napiszesz do mnie w związku z jakimś błędem, sprawdź czy [tutaj](https://github.com/Verlikylos/vMCShop/wiki/Znane-b%C5%82%C4%99dy-i-sposoby-ich-rozwi%C4%85zywania) nie ma opisu jak go rozwiazać!**

### Opis

Sklep oferuje obsługę wielu serwerów i usług, dodawanie newsów z obrazkami, realizację voucherów oraz tworzenie stron z własną zawartością. Dashboard ACP zawiera kilka podstawowych informacji takich jak ilosć sprzedanych usług czy aktualne zarobki. Znajduje się tam również wykres sprzedaży usług w bieżącym tygodniu, status serwerów podpiętych do skryptu, lista ostatnich zakupów oraz logowań do ACP. Panel sklepu obsługuje wiele kont, dlatego została dodana zakładka logów sklepu, aby móc sprawdzić co i kiedy dany użytkownik zrobił. Podczas realizacji usługi czy vouchera sprawdzane jest czy serwer, na którym komenda ma być wykonana jest aktualnie online.

W razie jakichkolwiek pytań/wątpliwosci/problemów/błędów zapraszam do kontaktu [mailowego](mailto:kontakt@verlikylos.pro), przez mój [FanPage](https://www.facebook.com/verlikylos), Discord (Verlikylos#5640) lub przy pomocy komunikatora [Telegram](https://t.me/Verlikylos).

Używasz tego skryptu sklepu? Napisz do mnie, a dodam Twoją stronę do poniższej listy!

### Donejtorzy
- blackxxoj | 0.01 zł | Prestiż ( ͡° ͜ʖ ͡°)

### Lista serwisów używających skryptu vMCShop
- mcfrix.pl

### Obsługiwani operatorzy płatności
- MicroSMS.pl
- Homepay.pl
- LvlUp.pro
- Pukawka.pl

### Funkcje sklepu (TO-DO list)
- [x] Strona główna z newsami, ostatnimi zakupami i statusem serwerów
- [x] Strona sklepu z listą usług
- [x] Logowanie do ACP
- [x] Dashboard z wykresem statystyk sprzedaży, statusem serwerów, ostatnimi zakupami dla poszczególnych serwerów, historią logowań do panelu i kilkoma podstawowymi informacjami
- [x] Dodawanie i usuwanie użytkowników ACP
- [x] Ustawienia konta użytkownika ACP ze zmianą hasła i avataru
- [x] Dodawanie i usuwanie serwerów
- [x] Dodawanie i usuwanie usług
- [x] Dodawanie i usuwanie newsów
- [x] Tworzenie i usuwanie stron z własną zawartością oraz przycisków nawigacji
- [x] Historia zakupów
- [x] Realizacja zakupów (Sprawdzanie czy serwer jest włączony podczas realizacji usługi)
- [x] Obsługa voucherów
- [x] Logi panelu administratora
- [ ] Możliwość edycji serwerów, usług, newsów oraz stron własnych (Aktualnie można tylko dodawać i usuwać)
- [ ] Anty-bot (Weryfikacja nicku gracza poprzez wysyłanie odpowiedniej komendy do serwera)
- [ ] Możliwość dodania newsa bez obrazka
- [ ] Podział strony z logami na kategorie
- [ ] Poprawa responsywności strony
- [ ] Jeżeli do skryptu dodany jest tylko jeden serwer, tooltipsy w "ostatnich kupujących" nie wyświetlają informacji na jakim serwerze usługa została zakupiona
- [ ] Panel gracza z własnym pluginem zbierającym statystyki
- [ ] Top gildii i graczy. Integracja z [FunnyGuilds](https://github.com/FunnyGuilds/FunnyGuilds/) oraz [NovaGuilds](https://github.com/MarcinWieczorek/NovaGuilds)
- [ ] Możliwość wyłączenia strony z newsami

### Wymagania
 - PHP 5.6
 - MySQL
 - Aktywne mod_rewrite

### Instalacja
[Tutaj](https://verlikylos.me/vmcshop-standard-instrukcja-instalacji-na-serwerze-www/) możesz znaleźć dokładniejszy opis instalacji.

1. Wgraj pliki na serwer www.
2. Importuj plik ```database.sql``` do swojej bazy danych MySQL.
3. Edytuj plik ```application/config/config.php```. Zmienną ```$config['base_url']``` ustaw na adres do swojej witryny. Przykład ```$config['base_url'] = 'https://vmcshop.pro/'```.
4. Edytuj plik ```application/config/database.php```. Zmienne ```'hostname' => 'adres bazy danych'```, ```'username' => 'nazwa użytkownika bazy danych'```, ```'password' => 'hasło do bazy danych'```, ```'database' => 'nazwa bazy danych'``` ustaw na wartosci odpowiadające Twojej bazie danych.
5. Edytuj plik ```application/config/settings.php```. Skonfiguruj go według upodobań. Ustawiasz tam między innymi dane do integracji z operatorem płatnosci, tło strony, logo itp.
6. Przejdź do witryny ```twojadomena.com/admin``` i zaloguj się używając domyslnych danych. (Login: Admin, Hasło: password).
7. Sklep jest gotowy do użycia.

### Changelog
#### Wersja 1.6.4
 - Dodano możliwość dodawania stron z własną treścią oraz przycisków nawigacji
 - Kilka mniejszych poprawek

#### Wersja 1.6.3
 - Naprawiono błędy [#8](https://github.com/Verlikylos/vMCShop/issues/8), [#6](https://github.com/Verlikylos/vMCShop/issues/6), [#4](https://github.com/Verlikylos/vMCShop/issues/4) oraz [#3](https://github.com/Verlikylos/vMCShop/issues/3)
 - Dodanie obsługi operatorów SMS Premium: Homepay.pl oraz Pukawka.pl
 - Kilka mniejszych poprawek
 
##### Wersja 1.6.2
 - Poprawiono skrypty łączące się z serwerem przy pomocy RCON oraz Query
 - Jeżeli do sklepu dodany jest tylko jeden serwer, w navigacji pojawia się jeden przycisk prowadzący do sklepu zamiast listy
 - Poprawiono zachowanie historii zakupów kiedy usuniemy dotyczącą jej usługę lub serwer
 - Poprawiono wyświetlanie listy sklepów na stronie realizacji voucheru i logowania do acp
 - Formularz dodawania usługi wyświetla teraz odpowiednie pola w zależności od wybranego operatora płatności SMS
 - W zakładce Usługi w ACP wyświetla się teraz informacja o aktualnym operatorze płatności SMS
 - Kilka mniejszych poprawek

##### Wersja 1.6.1
 - Dodanie operatora płatności SMS LvlUp.pro
 - Kilka mniejszych poprawek
 
##### Wersja 1.6
 - Publikacja sklepu

### Licencja: **GNU GPLv3**

[![Donate with PayPal](https://host.verlikylos.pro/images/paypal-donate.png)](https://www.paypal.me/Verlikylos)
