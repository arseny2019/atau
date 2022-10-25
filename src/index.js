import html from './templates/views/index.pug'
import style from './styles/main.styl';
import $ from 'jquery';
import { App } from './js';

const app = new App();

$(document).ready(() => app.start());