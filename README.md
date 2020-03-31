# Vinobest

Dit is een school project voor onze les projecten. We moesten een website maken waar je afspraken kan plannen voor het bijwonen van wijnproeverijen.

## Installatie

Gebruik composer en npm om het project te installeren.

```bash
composer install
```
Als die klaar is kun je beginnen met het opzetten

Windows:
```bash
copy .env.example .env
```

Linux: 
```bash
cp .env.example .env
```

Vul hierna de database gegevens en e-mail gegevens in in de .env file

Als je dat gedaan hebt en een database hebt aangemaakt moet je het volgende doen
```bash
php artisan migrate
```

Als dat klaar is kun je npm installeren en de assets compilen
```bash
npm install
npm run dev
```
## License
[MIT](https://choosealicense.com/licenses/mit/)
