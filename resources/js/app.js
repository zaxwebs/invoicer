import './bootstrap';

import 'preline';

import Alpine from 'alpinejs';

import TimeAgo from '@marcreichel/alpine-timeago';

window.Alpine = Alpine;

Alpine.plugin(TimeAgo);

Alpine.start();
