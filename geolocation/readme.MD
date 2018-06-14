Za dużo czasu poświęcilem na zliczanie wielkości w katalogach i to zadanie tylko rozgrzebałem. 
Jeżeli miałbym więcej czasu, to ogólny flow byłby taki:
1. sprawdzić czy funkcja "read_exif_data" istnieje, bo nie w każdym PHP jest włączona
2. sprawdzić czy przesłany plik jest obrazkiem
3. sprawdzić czy ma exif
4. sprawdzić czy exif posiada dane z geolokacją
5. albo zwrócić jest JSONem do frontu, albo przerobić je w PHP na wartości rozumiane
    przez leaflet.js (o ile leaflet nie może odebrać surowych danych z exif)
6. wykorzystać laeflet do wyświetlenia lokalizacji zdjęcia (nie wczytałem się w dokumentację)

DODATKI:

zapisać każde zdjęcie na dysku i każde uruchomienie strony pobrałoby exif wszystkich dostępnych zdjęć
i umieściłoby je na geolokacji, może wartości zapisać do bazy danych, żeby wyświetlać je szybciej.