# MagePsycho Blog - WordPress

Technical blog at magepsycho.com/blog, focused on Magento/eCommerce development.

## Development Environment

- **Platform**: Warden (Docker-based local dev)
- **Stack**: PHP 8.3, MariaDB 10.6, Redis, Node 22, Composer 2
- **Local URL**: https://app.blog.test
- **Env type**: `WARDEN_ENV_TYPE=wordpress`

### Commands

```bash
warden env up          # Start environment
warden env down        # Stop environment
warden shell           # SSH into PHP container
warden db connect      # Connect to MariaDB
```

### Database

- Host: `db` (inside container)
- Database: `wordpress`
- User/Pass: `wordpress/wordpress`

## Architecture

Standard WordPress installation with GeneratePress parent + child theme.

### Key Paths

```
wp-content/
  themes/
    generatepress/            # Parent theme (DO NOT EDIT)
    generatepress_child/      # Active child theme - all customizations here
      functions.php           # Custom hooks & enqueues
      header.php              # Custom header (Roboto font, icomoon icons)
      style.css               # All custom CSS styles
      lib/prism/              # Prism.js syntax highlighter (Dracula theme)
  plugins/                    # ~33 plugins
```

### Active Theme: generatepress_child

**functions.php** customizations:
- Prism.js syntax highlighter enqueue (Dracula theme)
- Prism quicktag button in admin editor
- Yoast breadcrumbs after header (desktop only, non-homepage)
- Logo/site-title link override to magepsycho.com

**header.php** overrides:
- Roboto font (Google Fonts)
- Icomoon icon font (CDN)

### Key Plugins

- **wordpress-seo** (Yoast) - SEO & breadcrumbs
- **wp-rocket** - Caching & performance
- **imagify** - Image optimization
- **search-by-algolia** - Search
- **wordfence** / **all-in-one-wp-security** / **better-wp-security** - Security
- **gp-premium** - GeneratePress premium modules
- **disqus-comment-system** / **disqus-conditional-load** - Comments
- **wordpress-popular-posts** / **yet-another-related-posts-plugin** - Related content
- **simple-tags** - Tag management

## Conventions

- All theme customizations go in `generatepress_child/` (never edit parent theme)
- Custom PHP hooks use `mp_` prefix (e.g., `mp_add_prism_css_js`)
- CSS uses direct selectors with `!important` overrides where needed
- Backup script: `_wpbackup.sh` (legacy, for production server)
