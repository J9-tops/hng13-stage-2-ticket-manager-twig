# Ticket Manager — Twig implementation

This repository contains the PHP + Twig implementation of the Ticket Manager challenge. The full challenge asks for three separate frontend implementations (React, Vue.js, and Twig) that share the same layout, design language and behavior. This repo contains the Twig implementation. To see the React implementation https://ticketflow-react.netlify.app/ and Vue implementation https://ticketflow-vue.netlify.app/

This README explains what is implemented, how to run the app, where key UI pieces live, validation & auth details, accessibility notes.

## Quick overview

- Template Engine: Twig
- Backend: PHP
- Storage: JSON files
- CSS: Standard CSS files under `public/css/`

### What this implementation includes

- Landing page with hero, CTA links, and responsive layout (see `templates/landing.html.twig`).
- Authentication screens: Sign In and Sign Up with client-side validation (`templates/auth/login.html.twig`, `templates/auth/signup.html.twig`).
- Dashboard overview with cards for ticket stats and navigation to Tickets screen (`templates/dashboard.html.twig` and `templates/layouts/dashboard-layout.html.twig`).
- Ticket management screen with modal components in `templates/components/modals/` for create/update/delete flows.
- Session-based authentication and localstorage-based storage for users and tickets.

## How to run (local)

You can run this project using PHP's built-in server or with Docker:

Using PHP's built-in server:
```powershell
php -S localhost:8080 -t public/
```

Using Docker:
```powershell
docker build -t ticket-manager .
docker run -p 8080:80 ticket-manager
```

Then visit `http://localhost:8080` in your browser.

Accessing `http://localhost:8080/dashboard/tickets` first generates sample tickets.

## Authentication & session

- User data is stored in localstorage
- PHP sessions are used to maintain authentication state
- Protected routes check for valid session before allowing access

Example test credentials (for local testing):
- Email: test@example.com
- Password: password123

## Validation & business rules

Per the challenge instructions the app enforces:

- Required fields: `title` and `status` on tickets.
- Allowed status values (challenge spec): `open`, `in_progress`, `closed` (lowercase, underscore for in_progress).
- UI color mapping (status → color):
  - `open` → green tone
  - `in_progress` → amber tone
  - `closed` → gray tone

Form validation includes:
- Sign In / Sign Up: email format check and minimum password length
- Ticket forms: required fields and valid status values

## Files & key components

- `public/index.php` — Application entry point and routing
- `templates/layouts/base.html.twig` — Base template with common structure
- `templates/layouts/dashboard-layout.html.twig` — Dashboard specific layout
- `templates/components/` — Reusable components like headers and modals
- `templates/*.html.twig` — Main page templates
- `public/css/index.css` — Main stylesheet
- `storage/users.json` — User data storage

### Template structure
```
templates/
├── layouts/          # Base layouts
├── components/       # Reusable components
│   └── modals/      # Modal dialogs
└── partials/        # Header, footer
```

## Design & accessibility notes

- Layout rule: content is centered with a max-width container
- Hero section: includes wavy bottom edge design
- Decorative elements: circular decorations and card boxes
- Accessibility: semantic HTML elements, proper ARIA attributes where needed, visible focus styles, and good color contrast
