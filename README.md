# AutoDijelovi Shop

E-commerce Web Aplikacija za Prodaju Auto Dijelova

**Predmet:** Web Programiranje i Dizajn  
**Akademska godina:** 2024/2025  
**Godina studija:** 3. godina

---

## Opis Projekta

AutoDijelovi Shop je moderna e-commerce web aplikacija razvijena u Laravel framework-u koja omogućava:
- **Pregled proizvoda** sa pretraživanjem i filtriranjem po kategorijama
- **Autentifikaciju korisnika** (registracija i prijava)
- **Admin panel** za upravljanje proizvodima
- **Multi-language podrška** (Bosanski/Engleski)
- **Responsive dizajn** za sve uređaje

---

## Tehnologije

### Backend
- **Framework:** Laravel 10
- **Database:** MySQL
- **PHP:** 8.1+

### Frontend
- **Template Engine:** Blade
- **CSS Framework:** Bootstrap 5
- **Icons:** Bootstrap Icons
- **JavaScript:** Vanilla JS

---

## Preduvjeti

Prije instalacije, potrebno je imati instalirano:

### 1. XAMPP (preporučeno)
- **Download:** https://www.apachefriends.org/
- Uključuje: Apache, MySQL, PHP

**Ili alternativno:**

### 2. PHP 8.1 ili noviji
- **Download:** https://www.php.net/downloads

### 3. Composer (PHP Package Manager)
- **Download:** https://getcomposer.org/download/

### 4. MySQL/MariaDB
- Uključeno u XAMPP
- **Ili samostalno:** https://dev.mysql.com/downloads/

### 5. Git (opciono)
- **Download:** https://git-scm.com/downloads

---

## Instalacija

### 1. Klonirajte ili preuzmite projekat

```bash
git clone https://github.com/harunhubljar/autodijelovi-shop.git
cd autodijelovi-shop
```

### 2. Instalirajte PHP zavisnosti

```bash
composer install
```

### 3. Kreirajte .env fajl

```bash
copy .env.example .env
```

### 4. Generirajte Application Key

```bash
php artisan key:generate
```

### 5. Kreirajte bazu podataka

1. Pokrenite **XAMPP Control Panel**
2. Startujte **Apache** i **MySQL**
3. Otvorite **phpMyAdmin**: http://localhost/phpmyadmin
4. Kreirajte novu bazu: `autodijelovi_db`

### 6. Konfigurišite .env fajl

Otvorite `.env` fajl i podesite database konekciju:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=autodijelovi_db
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Importujte bazu podataka

**Opcija A - Import SQL dump:**
```
Import fajl: database/autodijelovi_dump.sql u phpMyAdmin
```

**Opcija B - Koristite migracije i seeders:**
```bash
php artisan migrate --seed
```

### 8. Kreirajte symbolic link za storage

```bash
php artisan storage:link
```

---

## Pokretanje Aplikacije

### 1. Pokrenite XAMPP
- Startujte **Apache**
- Startujte **MySQL**

### 2. Pokrenite Laravel Development Server

```bash
php artisan serve
```

### 3. Otvorite u browseru

Aplikacija će biti dostupna na: **http://localhost:8000**

---

## Testni Korisnici

### Administrator
- **Email:** admin@autodijelovi.com
- **Lozinka:** password

### Korisnik
- **Email:** korisnik@autodijelovi.com
- **Lozinka:** password

---

## Funkcionalnosti

### Za Korisnike:
- ✅ Pregled svih auto dijelova
- ✅ Pretraga proizvoda po nazivu
- ✅ Filtriranje po kategorijama
- ✅ Detaljan prikaz proizvoda
- ✅ Multi-language (BS/EN)
- ✅ Responsive dizajn

### Za Administratore:
- ✅ CRUD operacije za auto dijelove
- ✅ Upload slika proizvoda
- ✅ Upravljanje kategorijama
- ✅ Pregled svih proizvoda
- ✅ Admin dashboard

---

## Struktura Projekta

```
autodijelovi-shop/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── AutoPartController.php
│   │   │   └── HomeController.php
│   │   └── Middleware/
│   └── Models/
│       ├── User.php
│       ├── Category.php
│       └── AutoPart.php
│
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── autodijelovi_dump.sql
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── parts/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   └── edit.blade.php
│       └── home.blade.php
│
├── routes/
│   └── web.php
│
├── config/
├── public/
└── storage/
```

---

## Rute

### Javne Rute:
- `GET /` - Početna stranica (spisak auto dijelova)
- `GET /login` - Prijava
- `GET /register` - Registracija
- `POST /login` - Procesiranje prijave
- `POST /register` - Procesiranje registracije
- `POST /logout` - Odjava

### Admin Rute (zaštićene):
- `GET /parts/create` - Dodaj novi dio
- `POST /parts` - Sačuvaj novi dio
- `GET /parts/{id}/edit` - Uredi dio
- `PUT /parts/{id}` - Ažuriraj dio
- `DELETE /parts/{id}` - Obriši dio

---

## Kategorije Proizvoda

- Felge
- Kočnice
- Motori
- Dijelovi karoserije
- Svjetla
- Ostalo

---

## Konfiguracija

### Promjena jezika
U `resources/views/layouts/app.blade.php` možete promijeniti jezik:
```php
<a href="{{ route('locale', 'bs') }}">BS</a>
<a href="{{ route('locale', 'en') }}">EN</a>
```

### Upload slika
Maksimalna veličina: definisana u `.env` i `php.ini`

---

## Troubleshooting

### Problem: "Class not found" error
**Rješenje:**
```bash
composer dump-autoload
```

### Problem: MySQL ne radi
**Rješenje:** Provjerite da li je MySQL port 3306 slobodan u XAMPP.

### Problem: Storage link ne radi
**Rješenje:**
```bash
php artisan storage:link
```

### Problem: 500 Internal Server Error
**Rješenje:**
```bash
php artisan config:clear
php artisan cache:clear
```

---

## Razvoj

### Dodavanje nove kategorije:
1. Otvorite phpMyAdmin
2. Dodajte novi red u `categories` tabelu

### Dodavanje novog proizvoda:
1. Prijavite se kao admin
2. Kliknite "Dodaj Novi Dio"
3. Popunite formu i upload-ujte sliku

---

## Deployment

Za production deployment:

1. Postavite `APP_ENV=production` u `.env`
2. Postavite `APP_DEBUG=false`
3. Pokrenite optimizacije:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## Licenca

Ovaj projekat je razvijen u edukativne svrhe.

---

## Kontakt

Za pitanja i sugestije, kontaktirajte autora projekta.
