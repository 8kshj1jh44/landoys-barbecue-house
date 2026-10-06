# Landoy's Barbecue House - Website

A single-page WordPress website for **Landoy's Barbeque House** (Loboc Upper, Oroquieta City, Misamis Occidental), serving charcoal-grilled Filipino barbecue since 1972.

Built as an **Astra child theme** running in Docker. Dark charcoal-and-flame design with a full menu, operating hours, tap-to-call ordering, and links to the [Facebook page](https://www.facebook.com/LandoysBarbecue).

## Quick start

Requirements: Docker Desktop with Docker Compose.

```bash
git clone https://github.com/8kshj1jh44/landoys-barbecue-house.git
cd landoys-barbecue-house
docker compose up -d
```

Then open **http://localhost:8082**. WordPress runs with its own MySQL database; first boot takes a minute.

> The stack assumes a WordPress database named `wordpress_site3` (user `wordpress`, password `wordpress_password`). On a fresh MySQL volume, Compose creates all of this automatically. Existing volumes from a prior run are reused as-is.

Stop with `docker compose down` (add `-v` to also wipe the database - destructive).

## Project structure

```
landoys-barbecue-house/
├── docker-compose.yml      WordPress + MySQL 8.0 stack (port 8082 -> 80)
├── logo.jpg                Brand logo (source copy)
├── AGENT_CONTEXT.md        Older environment notes (partially stale)
├── HANDOVER.md             Detailed handover doc: decisions, TODOs, gotchas
└── themes/
    ├── astra/              Astra parent theme - DO NOT EDIT
    └── astra-child/        All custom code lives here
        ├── style.css       Design tokens + all styling (bump Version on change)
        ├── front-page.php  The landing page (hero, marquee, story, menu, contact)
        ├── functions.php   [bbq_menu] shortcode: menu data + order number
        └── assets/img/     Logo used by the theme
```

The `themes/` folder is volume-mounted into the container at `/var/www/html/wp-content/themes`, so **edits to theme files appear on the site immediately** - no rebuild, no container restart. WordPress core, plugins, and uploads live inside the container/volumes, not in this repo.

## How the site works

The homepage is rendered by `front-page.php` (WordPress picks it up automatically as the front page). Sections:

1. **Hero** - split layout with the brand logo, headline, and an "Order Now" tap-to-call button.
2. **Marquee** - scrolling strip of featured items.
3. **Story** - short brand story with photo.
4. **Menu** - the `[bbq_menu]` shortcode, four card sections (Pork, Chicken, Beverages, Sides & Extras) with peso prices and badges.
5. **Hours & Contact** - operating hours, address (links to Google Maps), phone, and Facebook page.
6. **Sticky mobile order bar** - fixed bottom bar with Menu / Call buttons, shown under 768px viewport width.

### Editing the menu or phone number

All menu items, prices, and badges live in the `$menu_sections` array in `themes/astra-child/functions.php`. The order phone number is `$contact_number` in the same file, and the CTA links in `front-page.php`.

### Editing styles

Design tokens (colors) are CSS variables at the top of `style.css`:

```css
:root {
    --bbq-dark: #121212;    /* page background */
    --bbq-red: #e63928;     /* flame red, primary accent */
    --bbq-orange: #ff8c00;  /* highlight accent */
    /* ... */
}
```

**Important:** bump the `Version:` field in the `style.css` header on every CSS change - it is used as the stylesheet cache-buster.

Landing-page classes are prefixed `lby-`, menu shortcode classes `landoys-*`. Rules scoped to `body.home` integrate with Astra (full-width dark header/footer, nav colors, logo sizing) - keep them if you touch Astra settings, they fix Astra's boxed-layout light edges on wide screens.

## WP Admin

http://localhost:8082/wp-admin - DB credentials above. The site logo is a registered attachment (media library) and can be swapped under **Appearance -> Customize**.

## Known issues / TODO

- Menu shows "Premium Pork Barbecue - ₱16.00", almost certainly meant to be ₱160.00 (in `functions.php`).
- The story-section photo is a placeholder; needs a real photo of the grill.
- Operating hours are sensible defaults, not yet confirmed by the owner.
- See [HANDOVER.md](HANDOVER.md) for the full list and context.

## Repo notes

- The Astra parent theme is committed on purpose: the Docker mount serves `themes/` as-is, so the stack needs it present.
- `docker-compose.yml` contains local-dev database credentials; fine for a local stack, review before deploying anywhere public.
