import './bootstrap';

import 'preline';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';

import TimeAgo from '@marcreichel/alpine-timeago';

window.Alpine = Alpine;

Alpine.plugin(TimeAgo);

Livewire.start()
