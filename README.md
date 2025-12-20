# Bima Studio - WordPress Portfolio Theme

A modern, professional WordPress theme for creative agencies and freelancers. Built from scratch with clean code and best practices.

## Features

- **Custom Design** - Modern, responsive design with smooth animations
- **Custom Post Types** - Portfolio, Services, and Testimonials
- **Page Templates** - About, Services, Portfolio, Contact
- **Theme Customizer** - Logo, colors, social links, and more
- **SEO Friendly** - Clean markup and proper heading structure
- **Mobile First** - Fully responsive design
- **Fast & Lightweight** - No CSS frameworks, vanilla JavaScript

## Tech Stack

- WordPress 6.x
- PHP 8.x
- Custom CSS (CSS Variables, Grid, Flexbox)
- Vanilla JavaScript (ES6+)

## Installation

1. Download or clone this repository
2. Upload the `bima-studio` folder to `/wp-content/themes/`
3. Activate the theme in WordPress Admin > Appearance > Themes
4. Create pages: Home, About, Services, Portfolio, Contact
5. Assign page templates via Page Attributes
6. Configure via Appearance > Customize

## Theme Structure

```
bima-studio/
├── style.css              # Theme info + base styles
├── functions.php          # Theme setup
├── index.php              # Blog listing
├── header.php             # Site header
├── footer.php             # Site footer
├── front-page.php         # Homepage
├── page-about.php         # About template
├── page-services.php      # Services template
├── page-portfolio.php     # Portfolio template
├── page-contact.php       # Contact template
├── single.php             # Single post
├── archive.php            # Archive page
├── 404.php                # Error page
├── inc/
│   ├── custom-post-types.php  # CPT registration
│   ├── customizer.php         # Theme customizer
│   └── template-functions.php # Helper functions
└── assets/
    ├── css/main.css       # Additional styles
    └── js/
        ├── main.js        # Main JavaScript
        └── customizer.js  # Customizer preview
```

## Custom Post Types

### Portfolio
- Title, content, featured image
- Custom fields: Client, Category, URL, GitHub URL, Tech Stack
- Taxonomy: Portfolio Category, Portfolio Tags

### Services
- Title, content, featured image
- Custom field: Icon (emoji)

### Testimonials
- Title (client name), content (testimonial)
- Custom fields: Position, Company
- Featured image (avatar)

## Customizer Options

- **Social Links**: GitHub, LinkedIn, Twitter, Email
- **Contact Info**: Phone, Address
- **Colors**: Primary color, Secondary color
- **Hero Section**: Title, Description, Stats

## Page Setup

1. Create pages with the following slugs:
   - `home` or set as Front Page
   - `about`
   - `services`
   - `portfolio`
   - `contact`

2. Assign templates via Page Attributes:
   - About Page → About Page template
   - Services → Services Page template
   - Portfolio → Portfolio Page template
   - Contact → Contact Page template

3. Set static front page in Settings > Reading

## Development

### Requirements
- WordPress 6.0+
- PHP 8.0+

### CSS Architecture
- CSS Variables for theming
- BEM-like naming convention
- Mobile-first approach
- Modular component styles

### JavaScript
- Vanilla JavaScript (no jQuery dependency)
- ES6+ features
- IntersectionObserver for animations
- Event delegation for performance

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Credits

- Google Fonts: Inter, Poppins
- Icons: Custom SVG icons

## License

MIT License with Attribution Requirement

Copyright (c) 2024 Bima Kharisma Wicaksana

**You are free to:**
- Use this code for personal/commercial projects
- Modify and distribute

**You must:**
- Include the original copyright notice
- Provide visible attribution to the original author

See [LICENSE](LICENSE) for details.

---

Created by [Bima Kharisma Wicaksana](https://github.com/bimakw)
