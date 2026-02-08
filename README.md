<<<<<<< HEAD
# 🧾 Invoice Generator

A modern, professional invoice and receipt generator with a beautiful React frontend and robust Laravel backend. Generate stunning PDF documents instantly with bilingual support (English/Arabic) and a sleek, responsive UI.

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![React](https://img.shields.io/badge/React-18-61dafb.svg)
![TypeScript](https://img.shields.io/badge/TypeScript-5-3178c6.svg)
![Laravel](https://img.shields.io/badge/Laravel-10-FF2D20.svg)
![Vite](https://img.shields.io/badge/Vite-5-646cff.svg)

> [!NOTE]
> **Demo Application**: All company information and data shown in this application are sample/demo data for demonstration purposes only. You can easily customize the company information for your own use.


## ✨ Features

### 📄 Document Generation
- **Professional Receipts** - Generate beautiful receipt PDFs with company branding
- **Commercial Quotations** - Create detailed quotation documents
- **Bilingual Support** - Full English and Arabic language support
- **Instant PDF Export** - Client-side PDF generation with backend API support
- **Custom Branding** - Easily customize company information and logo

### 📊 Dashboard & Management
- **Real-time Statistics** - Track total income and document counts
- **Recent Activity Feed** - View latest generated documents at a glance
- **Search & Filter** - Find documents by client name, type, or date
- **Edit & Delete** - Manage your document history with ease
- **Dark Mode** - Eye-friendly dark theme support

### 💼 User Experience
- **📱 Fully Responsive** - Optimized for desktop, tablet, and mobile devices
- **⚡ Lightning Fast** - Built with Vite for instant hot module replacement
- **💾 Local Storage** - All data stored securely in browser
- **🎨 Modern UI** - Built with shadcn/ui components and Tailwind CSS
- **🌙 Theme Toggle** - Switch between light and dark modes

## 🛠️ Tech Stack

### Frontend
| Technology | Purpose |
|------------|---------|
| **React 18** | UI Framework |
| **TypeScript** | Type Safety |
| **Vite** | Build Tool & Dev Server |
| **Tailwind CSS** | Utility-First Styling |
| **shadcn/ui** | Beautiful UI Components |
| **@react-pdf/renderer** | PDF Generation |
| **React Hook Form** | Form Management |
| **Zod** | Schema Validation |
| **Lucide React** | Icon Library |

### Backend
| Technology | Purpose |
|------------|---------|
| **Laravel 10** | PHP Framework |
| **PHP 8.1+** | Server-Side Language |
| **DomPDF** | PDF Generation Engine |
| **Browsershot** | Advanced PDF Rendering |

## 🚀 Quick Start

### Prerequisites
- **Node.js 18+** and npm/pnpm
- **PHP 8.1+** and Composer (for backend)
- **Git**

### Frontend Setup

```bash
# Clone the repository
git clone https://github.com/YOUR_USERNAME/invoice-generator.git

# Navigate to frontend directory
cd invoice-generator/frontend

# Install dependencies
npm install

# Start development server
npm run dev
```

The frontend will be available at `http://localhost:5173`

### Backend Setup (Optional)

The backend provides enhanced PDF generation capabilities.

```bash
# Navigate to backend directory
cd invoice-generator/backend

# Install PHP dependencies
composer install

# Install Browsershot dependencies (optional, for advanced PDF)
npm install puppeteer

# Start Laravel server
php artisan serve
```

The backend API will be available at `http://localhost:8000`

### Build for Production

```bash
# Frontend
cd frontend
npm run build

# Backend
cd backend
php artisan config:cache
php artisan route:cache
```

## 📁 Project Structure

```
invoice-generator/
├── frontend/                 # React TypeScript Frontend
│   ├── src/
│   │   ├── components/
│   │   │   ├── ui/          # shadcn/ui components
│   │   │   ├── DashboardLayout.tsx
│   │   │   ├── InvoiceForm.tsx
│   │   │   ├── InvoicePDF.tsx
│   │   │   ├── InvoicePreview.tsx
│   │   │   ├── PastRecords.tsx
│   │   │   └── ModeToggle.tsx
│   │   ├── types/
│   │   │   └── invoice.ts   # TypeScript interfaces
│   │   ├── hooks/           # Custom React hooks
│   │   ├── lib/             # Utilities
│   │   └── App.tsx
│   ├── public/              # Static assets
│   └── package.json
│
└── backend/                 # Laravel Backend API
    ├── app/
    │   └── Http/Controllers/
    │       └── InvoiceController.php
    ├── resources/
    │   └── views/
    │       └── invoice.blade.php
    ├── routes/
    │   └── api.php
    └── composer.json
```

## 🎯 Usage

### Generating Documents

1. **Create Receipt**
   - Click "Receipts" in the sidebar
   - Fill in client details (name, phone, email)
   - Add line items with descriptions and amounts
   - Click "Save & Generate PDF"

2. **Create Quotation**
   - Click "Quotes" in the sidebar
   - Enter quotation details
   - Add items with quantities and prices
   - Save as quotation document

3. **View History**
   - Click "History" to see all generated documents
   - Search by client name or filter by type
   - Download or delete records as needed

4. **Dashboard Overview**
   - View total income statistics
   - See recent activity feed
   - Quick access to all features

## 🔧 Configuration

### Company Information

Customize company details in `frontend/src/types/invoice.ts`:

```typescript
export const COMPANY_INFO = {
  name: "Sample Print Co.",
  slogan: "Professional Printing & Design Services",
  email: "info@sampleprintco.com",
  website: "www.sampleprintco.com",
  address: "Business Bay, Dubai, UAE",
  // ... more fields - replace with your actual company information
};
```

**To customize for your business:**
1. Open `frontend/src/types/invoice.ts`
2. Replace all sample data with your actual company information
3. Update logo and stamp images in the `public/images/` directory
4. Modify the branding in `DashboardLayout.tsx` (company name in sidebar)

### Backend Configuration

Update `.env` file in the backend directory:

```env
APP_NAME="Invoice Generator"
APP_URL=http://localhost:8000

# CORS settings for frontend
FRONTEND_URL=http://localhost:5173
```

## 🌐 Live Demo

**Coming Soon** - Deploy to Vercel (frontend) and your preferred PHP hosting (backend)

## 📸 Screenshots

| Dashboard | Invoice Form | PDF Output |
|-----------|--------------|------------|
| Real-time stats & activity | Professional form UI | Bilingual PDF documents |

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**Akash Jamali**

- GitHub: [@akashjamali](https://github.com/akashjamali)
- Project Link: [https://github.com/akashjamali/invoice-generator](https://github.com/akashjamali/invoice-generator)

## 🙏 Acknowledgments

- Built with [React](https://react.dev/)
- UI Components from [shadcn/ui](https://ui.shadcn.com/)
- PDF Generation by [@react-pdf/renderer](https://react-pdf.org/)
- Backend powered by [Laravel](https://laravel.com/)

---

<p align="center">
  Made with ❤️ for professional printing businesses
</p>
=======
# Gulf-Print-Invoice
A modern invoice and receipt generator with React frontend and Laravel backend. Features bilingual PDF generation, dark mode, and responsive design.
>>>>>>> 7234c6ee1a99b4031fabf0f2098fc05f7c8079eb
