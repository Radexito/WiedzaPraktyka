![Admin panel](https://i.imgur.com/s5ELMRK.png)
![Rejestracja](https://i.imgur.com/wgRuM3X.png)
![Instalacja](https://i.imgur.com/kTd4ixw.png)

# Zadanie rekrutacyjne Wiedza i Praktyka
W ramach pierwszego etatu rekrutacji prosimy o wykonanie mikro projektu. Polega on na napisaniu aplikacji umożliwiającej rejestrowanie różnego rodzaju użytkowników w serwisie oraz ich zarządzaniem (lista, edycja, usuwanie).
  

Aplikacja powinna składać się z dwóch części:  
    a) Frontowej (url /), która zawiera tylko formularz rejestracji nowego konta. Komunikacja z backendem z wykorzystaniem ajaxa, mogą być użyte frameworki js (np. react) i css (np. bootstrap)  
    Pola formularza:  
    - imie – obligatoryjne  
    - nazwisko – obligatoryjne  
    - email – obligatoryjne  
    - opis - opcjonalne  
    - stanowisko (select i 3 opcje do wyboru), w zależności od wybranej opcji wyświetlają się różne dodatkowe pola formularza  
    • tester:  
        o systemy testujące – string  
        o systemy raportowe – string  
        o zna selenium - checkbox  
    • developer:  
        o środowiska ide – string  
        o języki programowania – string  
        o zna mysql - checkbox  
    • project manager:  
        o metodologie prowadzenia projektów – string  
        o systemy raportowe – string  
        o zna scrum – checkbox  
    Po poprawnej rejestracji na podany mail wysyłana jest wiadomość powitalna (treść dowolna, grunt żeby w treści były zawarte wartości wszystkich wpisanych pól).  
  

b) Administracyjnej (/admin), na stronie wejściowej lista zarejestrowanych kont + opcje ich zarządzania (edycja, usuwanie)  
  

Oceniane będzie podejście do projektu bazy danych, podejścia obiektowego w kodzie oraz użycia JS na froncie. Można korzystać z frameworków PHP oraz frontendowych (np.: react).  
Dodatkowo punktowane będzie wykorzystanie dockera do stworzenia środowiska uruchomieniowego.  
  

Kwestia układu, interakcji, walidacji i tym podobnych kwestii pozostaje po Pana/Pani stronie. Oczekiwanym przez nas efektem jest link do repozytorium kodu na jednej z opularnych platform (github, gitlab, bitbucket) wraz z całym kodem, schema do założenia bazy danych oraz plikiem readme.md w którym powinien być zawarty opis instalacji i konfiguracji aplikacji.  
  

## Instalacja
1.) Wrzuć pliki do root folderu serwera  
2.) Stwórz pustą baze danych  
3.) Nawiguj do /install.php  
  

## Napotkane problemy
Biblioteka jQuery TableEdit ma bug który powoduje że funkcja onAjax zawsze rzuca null, tymczasowy fix to wykomentowanie tej sekcji kodu z jquery.tabledit.js:  
```
    result = settings.onAjax(action, serialize);
    // In onAjax() it is possible to modify the document sent in ajax request, 
    //e.g. adding additional information required by server, or do formatting / restructing of document to be sent.
    if (result === false) {
        return false;
    } else {
        serialize = result;
    }
```
Biblioteka jQuery TableEdit ma niekompletną dokumentacje, według dokumentacji powinny być 3 parametry lecz trzeba użyć 4.
https://markcell.github.io/jquery-tabledit/#examples  

```
    editable: [
        ...
        [5, 'Stanowisko', '{"1": "Tester", "2": "Developer", "3": "Project Manager"}'],
        ...
    ]
```
Zamiast:  
```
    editable: [
        ...
        [5, 'Stanowisko', 'select', '{"1": "Tester", "2": "Developer", "3": "Project Manager"}'],
        ...
    ]
```
