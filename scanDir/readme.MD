Wystartować komendę:
```
php -S localhost:3000
```

otworzyć stronę index.html

Niestety nie udało mi się znaleźć sposobu, żeby wartość katalogu była przechowywana 
pomiędzy kolejnymi klinięciami (nie licząc bazy danych, która wydała mi się overkillem).

Inny problem na którym się zaciąłem na chwilę, to limit rekurencji. W mojej wersji PHP rekurencja 
mogła być wywołana 256 razy, więc jeżeli wyszliśmy poza główny katalog, program się wieszał. 
To jest pewnie powód, dla którego normalnie wielkości folderów nie widać. Katalogi z dużą
ilością plików wieszałyby apkę.
 