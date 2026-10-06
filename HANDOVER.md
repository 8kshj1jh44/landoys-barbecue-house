# HANDOVER - Landoy's Barbecue House Website

Date: 2026-10-05
Project root: `D:\wordpress\Landoys` (not a git repository)
Live at: http://localhost:8082 (WP admin: http://localhost:8082/wp-admin)

## What this is

A single-page WordPress website for Landoy's Barbeque House (Oroquieta City), built as an Astra child theme. Dark charcoal/flame brand. Landing page sections: split hero (with logo), item marquee, story, full menu, operating hours + contact (address/phone/Facebook), Astra footer, sticky mobile order bar.

## Infrastructure

- Docker Compose: `docker-compose.yml` (containers `Landoyz` = wordpress:latest, `wordpress_db_site3` = mysql:8.0). Port 8082 -> 80.
- Theme volume mount: `./themes` -> `/var/www/html/wp-content/themes` (edits apply instantly; no rebuild needed).
- Start/stop: `docker compose up -d` / `docker compose down` from project root.
- PHP 8.0+. Lint edits with: `MSYS_NO_PATHCONV=1 docker exec Landoyz php -l /var/www/html/wp-content/themes/astra-child/<file>` (the MSYS_NO_PATHCONV=1 prefix is required in Git Bash on Windows, or the container path gets mangled).
- WordPress DB creds: wordpress / wordpress_password, db wordpress_site3 (see docker-compose.yml).
- Site title/tagline were set in DB via `docker exec ... php -r` bootstrapping `wp-load.php` (no wp-cli in the image).

## Where the code lives (child theme: `themes/astra-child/`)

- `style.css` - all styling. CSS tokens at top (`--bbq-dark`, `--bbq-red`, `--bbq-orange`, etc.). Bump the `Version:` field on every CSS change (cache-busting; currently 1.1.4). Landing-page styles are namespaced `lby-*`; menu styles `landoys-*`. Contains Astra integration overrides scoped to `body.home` (full-width dark header/footer, nav colors, logo sizing) because Astra's boxed layout centers header/footer containers at 1240px and would otherwise show light edges on wide screens.
- `front-page.php` - the entire landing page markup. WordPress uses it automatically as the site front page. Sections: `.lby-hero`, `.lby-marquee`, `.lby-story`, `.lby-menu-section` (renders `[bbq_menu]` shortcode), `.lby-hours` (hours / find us / connect). Mobile sticky order bar at bottom of file.
- `functions.php` - style enqueuing + the `[bbq_menu]` shortcode: full menu data (Pork / Chicken / Beverages / Sides & Extras) and the order phone number.
- `assets/img/logo.jpg` - brand logo (flame + wordmark, since 1972). JPG with baked-in black background; blends on the dark theme via `mix-blend-mode: lighten`. A transparent PNG would be needed for any light background.
- Astra parent theme in `themes/astra/` - never edit.

## Data / decisions recorded

- Contact number: 0999 209 5092 (replaced an earlier placeholder 0998 939 5337 everywhere: hero CTA, menu shortcode, mobile bar). Verify with the owner that the old number is truly dead.
- Facebook: https://www.facebook.com/LandoysBarbecue
- Address: Loboc Upper, Oroquieta City, Misamis Occidental (links to Google Maps place URL, tracking params stripped).
- Site title: "Landoy's Barbecue House"; tagline set in DB.
- Logo also set as the WP custom_logo (attachment ID 8, file in `wp-content/uploads/landoys/logo.jpg`), so it can be managed via Customizer.

## Known issues / TODO

1. **Menu price typo**: "Premium Pork Barbecue" is `₱16.00` in `functions.php:26` while Liempo is ₱150.00 - almost certainly should be ₱160.00. Flagged to the owner twice; awaiting confirmation before changing.
2. **Story section photo is a placeholder** (picsum seed, moody landscape, not actual food). Swap the `img src` in `front-page.php` for a real grill/skewer photo from the owner.
3. Operating hours (10-8 / 10-9 / 12-7) were invented as sensible defaults - confirm with the owner.
4. Footer still shows "Powered by Astra WordPress Theme"; owner may want it removed (Customizer or CSS).
5. Header/nav uses default Astra menu with a "Sample Page" link; real navigation was not requested yet.

## Skills installed this session

`npx skills add https://github.com/Leonxlnx/taste-skill` installed 13 skills into `.agents/skills/` (design-taste-frontend, high-end-visual-design, stitch-design-taste, etc.). The design-taste-frontend skill was used for the landing page and its rules (no em-dashes, theme lock, CTA contrast, marquee limit, reduced-motion) should be followed when extending the page.

Note: `/plugin install superpowers@claude-plugins-official` could NOT be installed - it is a Claude Code plugin and the `claude` CLI does not exist in this environment.

## Suggested skills for the next agent

- `design-taste-frontend` - before adding/modifying any landing-page section (it set the current design rules).
- `handoff` - to refresh this document when the work state changes materially.

## Environment notes

- User works in ZCode Desktop on Windows (Git Bash); in-app browser is available for visual checks (backend `iab`).
- `AGENT_CONTEXT.md` at root is an older context doc - partially stale (mentions a `Site-3/` root and points design tokens to itself instead of the theme files; menu data actually lives in `functions.php`). Its escaped-markdown formatting is an export artifact.
- No git repo initialized. If the owner wants history, `git init` + initial commit is a sensible first step.
