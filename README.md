# VolunteeringApp

Dit is een Laravel-gebaseerde applicatie voor vrijwilligerswerk. 

## Stappen om het project te draaien

Volg de onderstaande stappen om het project lokaal te draaien:

### 1. Vereisten

Zorg ervoor dat de volgende software geïnstalleerd is op je computer:
- PHP
- Composer
- Node.js
- MySQL

### 2. Clonen van het project

Clone het project naar je lokale machine:
```bash
git clone https://github.com/jouwusername/VolunteeringApp.git

Je kan fondsenwervers vinden bij "Discover" aan de hand van keywords zoals: school, animals, children, etc..
Dit feature maakt gebruik van een externe API. Voeg daarom de onderstaande API-sleutels toe aan de .env file:

EVERY_ORG_PUBLIC_KEY=pk_live_134475a89f773460fe7f05d18219905c
EVERY_ORG_PRIVATE_KEY=sk_live_ee15c852bdc25cebbac4c745db24088d

### 3. Belangerijke Commondo's
Na het clonen van het project, voer de volgende commando's uit:

composer install
npm install
php artisan key:generate
php artisan storage:link

### Algemene Informatie

Mailfunctionaliteit: Gebruikers kunnen een e-mail sturen naar de admin. In het adminpanel krijgt de admin een overzicht van alle ontvangen e-mails.
Om ervoor te zorgen dat dit goed werkt, voeg de nodige mailconfiguratie toe aan de .env file:

MAIL_MAILER=smtp
MAIL_HOST=smtp.your-email-provider.com
MAIL_PORT=587
MAIL_USERNAME=your-email@example.com
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@example.com
MAIL_FROM_NAME="${APP_NAME}"

Gebruikersprofielen: Alle gebruikers zijn publiek zichtbaar onder de Users-tab in de header.

Extra features in de header:

FAQ: Toegang tot de veelgestelde vragen.
Contact: Formulier om een e-mail te sturen.
Projects: Overzicht van lopende projecten.

