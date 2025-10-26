# Loulou Confiture WordPress Website

🍯 A beautiful WordPress website for an artisanal jam business built with custom theme and modern design.

## Features

- **Custom WordPress Theme** - Built from scratch with Tailwind CSS
- **Product Management** - Custom post types for jam products
- **Responsive Design** - Mobile-first approach
- **Dark Mode** - Complete dark/light theme support
- **Contact Forms** - Contact Form 7 integration with custom styling
- **Modern UI** - Beautiful gradients, animations, and hover effects

## Pages

- **Home** - Hero section with featured products
- **Boutique** - Product catalog with filtering and sorting
- **Contact** - Contact form with email notifications
- **À propos** - Company story, values, and team

## Technical Stack

- **WordPress** - Content Management System
- **PHP** - Server-side scripting
- **Tailwind CSS** - Utility-first CSS framework
- **JavaScript** - Interactive features
- **Contact Form 7** - Form handling and email delivery

## Custom Features

- **Product Post Type** - Custom fields for jam products
- **Image Optimization** - Multiple image sizes for different contexts
- **Admin Interface** - Custom admin panels for content management
- **Email System** - Automatic notifications and confirmations

## Setup

1. Install WordPress
2. Place theme in `/wp-content/themes/loulou-theme/`
3. Install Contact Form 7 plugin
4. Import products and configure forms
5. Build CSS: `npm run build`

## Development

```bash
# Navigate to theme directory
cd wp-content/themes/loulou-theme

# Install dependencies
npm install

# Build CSS
npm run build

# Watch for changes (development)
npm run dev
```

## Theme Structure

```
loulou-theme/
├── style.css                 # Main compiled CSS
├── functions.php             # Theme functions
├── front-page.php           # Home page
├── page-boutique.php        # Shop page
├── page-contact.php         # Contact page
├── page-a-propos.php        # About page
├── resources/
│   ├── css/                 # Source CSS files
│   ├── js/                  # JavaScript files
│   └── views/               # Template parts
└── tailwind.config.js       # Tailwind configuration
```

## Author

Created by Ilyes Menzli

---

*A modern WordPress theme showcasing the best of artisanal jam making with beautiful design and professional functionality.*