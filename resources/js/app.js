import './bootstrap';

const menuButton = document.querySelector('[data-menu-toggle]');
const mobileNavigation = document.querySelector('[data-mobile-navigation]');

if (menuButton instanceof HTMLButtonElement && mobileNavigation instanceof HTMLElement) {
    menuButton.addEventListener('click', () => {
        const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
        menuButton.setAttribute('aria-expanded', String(!isExpanded));
        menuButton.setAttribute('aria-label', isExpanded ? 'Buka navigasi' : 'Tutup navigasi');
        mobileNavigation.hidden = isExpanded;
    });

    mobileNavigation.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            menuButton.setAttribute('aria-expanded', 'false');
            menuButton.setAttribute('aria-label', 'Buka navigasi');
            mobileNavigation.hidden = true;
        });
    });
}

const filterControls = document.querySelectorAll('[data-filter-value]');
const productCards = Array.from(document.querySelectorAll('[data-product-card]'));
const filterEmptyState = document.querySelector('[data-filter-empty]');

function filterProducts(categoryId) {
    let visibleCount = 0;

    productCards.forEach((card) => {
        const matches = categoryId === 'all' || card.dataset.categoryId === categoryId;
        card.hidden = !matches;

        if (matches) {
            visibleCount += 1;
        }
    });

    filterControls.forEach((control) => {
        const isActive = control.dataset.filterValue === categoryId;

        if (control instanceof HTMLButtonElement) {
            control.setAttribute('aria-pressed', String(isActive));
        } else if (control instanceof HTMLAnchorElement) {
            if (isActive) {
                control.setAttribute('aria-current', 'true');
            } else {
                control.removeAttribute('aria-current');
            }
        }
    });

    if (filterEmptyState instanceof HTMLElement) {
        filterEmptyState.hidden = visibleCount > 0;
    }
}

filterControls.forEach((control) => {
    control.addEventListener('click', () => {
        const categoryId = control.dataset.filterValue;

        if (categoryId) {
            filterProducts(categoryId);
        }
    });
});

document.querySelectorAll('[data-product-image]').forEach((image) => {
    image.addEventListener('error', () => {
        if (image instanceof HTMLImageElement && image.dataset.fallback) {
            image.src = image.dataset.fallback;
        }
    }, { once: true });
});

const adminMenuButton = document.querySelector('[data-admin-menu-toggle]');
const adminMobileNavigation = document.querySelector('[data-admin-mobile-navigation]');

if (adminMenuButton instanceof HTMLButtonElement && adminMobileNavigation instanceof HTMLElement) {
    adminMenuButton.addEventListener('click', () => {
        const isExpanded = adminMenuButton.getAttribute('aria-expanded') === 'true';
        adminMenuButton.setAttribute('aria-expanded', String(!isExpanded));
        adminMobileNavigation.classList.toggle('hidden', isExpanded);
    });

    adminMobileNavigation.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            adminMenuButton.setAttribute('aria-expanded', 'false');
            adminMobileNavigation.classList.add('hidden');
        });
    });
}

document.querySelectorAll('[data-admin-image-input]').forEach((input) => {
    input.addEventListener('change', () => {
        const file = input instanceof HTMLInputElement ? input.files?.[0] : null;
        const preview = document.querySelector('[data-admin-image-preview]');

        if (file && preview instanceof HTMLImageElement) {
            preview.src = URL.createObjectURL(file);
        }
    });
});
