\# Project: Landoy's Barbecue Website (WordPress / Astra Child Theme)



\## 1. Infrastructure \& Environment

\- \*\*Stack\*\*: Docker Compose (`wordpress:latest` + `mysql:8.0`)

\- \*\*Port Mapping\*\*: Host `8082` -> Container `80`

\- \*\*Local URL\*\*: http://localhost:8082

\- \*\*WP Admin\*\*: http://localhost:8082/wp-admin

\- \*\*Volume Mount\*\*: `./themes` -> `/var/www/html/wp-content/themes`

\- \*\*Active Theme\*\*: Astra Child (`./themes/astra-child`)

\- \*\*Parent Theme\*\*: Astra (`./themes/astra`)

\- \*\*PHP Version\*\*: 8.0+ (Strict error handling; avoid undefined bare constants)



\## 2. Directory Tree

```text

Site-3/

├── docker-compose.yml

├── themes/

│   ├── astra/

│   └── astra-child/

│       ├── style.css

│       └── functions.php

└── AGENT\_CONTEXT.md
---



\### Ready-to-Use Agent Prompt



When kicking off a coding task with Claude Code, Cursor, Aider, or OpenCode, use this prompt:



```text

You are an expert full-stack WordPress developer working on an Astra child theme.



Context:

\- Read `AGENT\_CONTEXT.md` for environment setup, design tokens, color palette, and menu data.

\- Active child theme path: `./themes/astra-child/`.

\- Site is running locally at http://localhost:8082.



Task:

\[State your requirement, e.g.:

"Add a sticky mobile bottom navigation bar with a direct WhatsApp/SMS order button and an interactive operating hours section to the footer."]



Constraints:

1\. Ensure full compatibility with PHP 8.0+.

2\. Match the charcoal and flame CSS color tokens defined in `AGENT\_CONTEXT.md`.

3\. Use native WordPress/Astra hooks; do not touch the parent theme.

