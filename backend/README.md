# Invoice Generator Backend (Laravel)

This is the API backend for generating high-quality PDFs for the Invoice Generator.

## Prerequisites

- **PHP 8.1+**
- **Composer**
- **Node.js & NPM** (for Browsershot/Puppeteer if used)

## Setup Instructions

1.  **Initialize Laravel**:
    If you haven't already initialized this folder as a full Laravel project, run:
    ```bash
    composer create-project laravel/laravel .
    ```
    Then copy the provided `InvoiceController.php` and `invoice.blade.php` back to their respective locations.

2.  **Install Dependencies**:
    ```bash
    composer require spati/laravel-browsershot
    composer require barryvdh/laravel-dompdf
    ```

3.  **Run the Server**:
    ```bash
    php artisan serve
    ```

4.  **CORS Setup**:
    Ensure `config/cors.php` allows requests from your frontend (usually `http://localhost:5173`).

## PDF Engines

- **DomPDF**: Currently enabled in the controller. Good for basic layouts.
- **Browsershot**: Recommended for full Tailwind CSS support. Requires Puppeteer (`npm install puppeteer`).
