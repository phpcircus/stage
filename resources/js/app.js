require('./bootstrap');

import Alpine from 'alpinejs';
import persist from './alpinejs/persist';
import Fern from '@ryangjchandler/fern';
import intersect from '@alpinejs/intersect'

window.Alpine = Alpine;

Alpine.plugin(Fern);
Alpine.plugin(persist);
Alpine.plugin(intersect);

Alpine.persistedStore('stage', {
    mobileMenuOpen: false,
    darkMode: true,
    theme: 'dark',
    seen: null,
    newest: null,
    setSeenToNewest() {
        this.seen = this.newest;
    },
    hasntSeenNewest() {
        return this.seen != this.newest;
    },
    getDarkMode() {
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            return 'dark';
        } else {
            return 'light';
        }
    },
    isDarkMode() {
        return this.theme === 'dark';
    },
    toggleTheme() {
        if(this.theme === 'light') {
            this.theme = 'dark';
            this.darkMode = true;
        } else {
            this.theme = 'light';
            this.darkMode = false;
        }
    },
});
Alpine.start();