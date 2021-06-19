require('./bootstrap');

import Alpine from 'alpinejs';
import intersect from './alpinejs/intersect';
import persist from './alpinejs/persist';

window.Alpine = Alpine;
Alpine.plugin(intersect);
Alpine.plugin(persist);

Alpine.start();