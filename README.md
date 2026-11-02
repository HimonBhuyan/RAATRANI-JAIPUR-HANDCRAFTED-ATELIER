# RAATRANI — Jaipur Handcrafted Atelier
*Where Artistry Meets Comfort • Authentic Jaipur Hand Block Printing*

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-v4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Status](https://img.shields.io/badge/Tests-11%20Passed-10B981?style=for-the-badge)](https://github.com/HimonBhuyan/RAATRANI-JAIPUR-HANDCRAFTED-ATELIER)

---

## ✦ The Brand & Vision
**Raatrani** ([@the_raatrani](https://instagram.com/the_raatrani)) is an authentic Jaipur artisanal home furnishings, clothing, and accessories brand. Every duvet, kimono bathrobe, and hand-quilted bag is hand-stamped using generational teak-wood blocks dipped in natural, azo-free dyes and dried under the Rajasthani sun.

This application is a luxury e-commerce experience designed to rival high-fashion ateliers (Sabyasachi, Nicobar, Good Earth) while offering seamless purchasing via direct WhatsApp Concierge (`+91 89469 66292`) and standard online checkout.

---

## ✦ Key Features

### 🛍️ Artisanal Product Portfolio (All 16 Collections)
- **Bathrobes**: 100% Pure Cotton Waffle Kimono Robes (Botanical Ochre, Azure Vines, Cypress Leaf Trim).
- **Sofa Throws**: Natural Jute & Cotton Hand Block Printed Throws with rustic fringe tassels.
- **Towels**: Waffle Weave Hand Block Bath Towels & Safari Kids Animal Edition (Elephant & Giraffe).
- **Table Covers**: Refined Dining covers (Rectangular 6-seater, Round tablecloths, Coffee table covers).
- **Table & Bed Runners**: Hand-stamped Mughal lotus and cypress runners with matching shams.
- **Dohars**: Reversible single & double bed mulmul cotton AC dohars with chevron and booti borders.
- **Rugs & Dhurries**: 100% woven cotton floor runners and rugs with handmade fringe.
- **Cushion Covers**: 16x16 and 12x12 quilted diamond cushions with hand-carved block prints.
- **Quilted Bags & Totes**:
  - *Jungle Haven* Quilted Tote Sets (1 Tote + 3 Utility Pouches)
  - Quilted Travel Duffle Bags
  - Quilted Laptop Sleeves with Handles (Gingham Hearts & Strawberry)
  - Cute Quilted Backpacks
  - Quilted Makeup Pouches (Set of 3)
  - Cylindrical Yoga Mat Bags with shoulder straps
- **Bedsheets**: *Padma Bloom Collection*, *Bohemian Bedsheets*, and *Kalamkari Multi-Colour*.
- **Bed Covers & Diwan Sets**: 6-piece Sage Cypress diwan sets (sheet + 3 cushions + 2 bolsters).
- **Quilts & Comforters**: *Gulaal Ghar Collection* (Festive Magenta & Canary Yellow) and Patchwork Comforters.
- **Clothing / Jackets**: Quilted Cotton Short Jackets with mandarin collars and coconut buttons.
- **Curtains**: Hand block printed sheer cotton curtains.
- **Heritage Gifting**: Handcrafted fabric gift boxes and bespoke trousseau hampers.

### 💎 Editorial Luxury Experience
- **Multi-Tiered Architectural Header**: Luxury announcement ribbon, centered royal wordmark, and dedicated sticky navigation ribbon.
- **100% Mobile Responsive**: Tested and optimized down to 320px–360px viewports (Samsung Galaxy A55, iPhone SE). Single-line mobile header with zero text clipping or button wrapping.
- **Slide-Out Shopping Bag Drawer**: Instant cart preview, item increment/decrement, free shipping progress bar, and instant WhatsApp order generation.
- **Direct WhatsApp Concierge Integration**: Pre-populated WhatsApp order strings with product SKU, title, selected size/option, and live link.
- **Real-Time Currency Switcher**: Live switching across `INR (₹)`, `USD ($)`, `GBP (£)`, `EUR (€)`, and `AED (د.إ)`.
- **Client Wishlist & Saved Items**: Full client-side wishlist with animated badges and drawer access.
- **Interactive Pincode & COD Estimator**: Live Indian pincode delivery estimation with estimated delivery windows.
- **Admin Dashboard**: Full product, category, order, coupon, and inventory management.
- **Live Order Tracking**: Client lookup via unique Order Number + Phone/Email with visual courier timeline.

---

## ✦ Tech Stack
- **Framework**: Laravel 12 on PHP 8.3
- **Frontend**: Blade Components + Tailwind CSS v4 + Alpine.js + Vite
- **Database**: SQLite / MySQL compatible
- **Testing**: PHPUnit feature & unit tests (100% pass)
- **Code Standards**: PSR-12 formatted with Laravel Pint

---

## ✦ Installation & Local Setup

### 1. Clone the repository
```bash
git clone git@github.com:HimonBhuyan/RAATRANI-JAIPUR-HANDCRAFTED-ATELIER.git
cd RAATRANI-JAIPUR-HANDCRAFTED-ATELIER
```

### 2. Install PHP & Node dependencies
```bash
composer install
npm install
```

### 3. Environment configuration
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup & Artisanal Seeder
```bash
php artisan migrate:fresh --seed
```
*Seeds 39 authentic handcrafted products, categories, collections, reviews, and test users.*

### 5. Compile Frontend Assets
```bash
npm run build
```

### 6. Start the Server
```bash
php artisan serve
```
Open **[http://localhost:8000](http://localhost:8000)** in your browser.

---

## ✦ Test Credentials

### Admin Portal
- **URL**: `http://localhost:8000/admin`
- **Email**: `admin@raatrani.com`
- **Password**: `password`

### Client Account
- **URL**: `http://localhost:8000/login`
- **Email**: `patron@raatrani.com`
- **Password**: `password`

---

## ✦ Running Quality Checks & Tests
```bash
# Run PHPUnit feature tests
php artisan test --compact

# Run Laravel Pint formatter
vendor/bin/pint --format agent
```

---

## ✦ License & Credits
- **Brand**: Raatrani Atelier Jaipur ([@the_raatrani](https://instagram.com/the_raatrani))
- **Artisanal Photography**: Generative Studio Imagery (1200×896) matching the original `@the_raatrani` catalog.
- **License**: Private & Proprietary.
