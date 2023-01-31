import Vue from 'vue';
window.Vue = Vue;
import jQuery from 'jquery';
window.jQuery = jQuery;
window.$ = jQuery;
import PerfectScrollbar from 'perfect-scrollbar';
window.Cropper = require('cropperjs');
window.Cropper = 'default' in window.Cropper ? window.Cropper['default'] : window.Cropper;
window.toastr = require('toastr');
window.DataTable = require('datatables');
// require('./dataTables.colReorder');
require('datatables-bootstrap3-plugin/media/js/datatables-bootstrap3');
window.EasyMDE = require('easymde');
require('dropzone');
require('jquery-match-height');
require('bootstrap-toggle');
require('nestable2');
require('bootstrap');
require('select2');
require('eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker');
var brace = require('brace');
require('brace/mode/json');
require('brace/theme/github');
require('./slugify');
window.TinyMCE = window.tinymce = require('tinymce');
require('./multilingual');
require('./voyager_tinymce');
window.voyagerTinyMCE = require('./voyager_tinymce_config');
require('./voyager_ace_editor');
window.helpers = require('./helpers.js');

Vue.component('admin-menu', require('./components/admin_menu.vue').default);

var admin_menu = new Vue({
    el: '#adminmenu',
});

$(document).ready(function () {
    var appContainer = $(".app-container"),
        fadedOverlay = $('.fadetoblack'),
        hamburger = $('.hamburger');

    new PerfectScrollbar('.side-menu');

    $('#voyager-loader').fadeOut();

    $(".hamburger, .navbar-expand-toggle").on('click', function () {
        appContainer.toggleClass("expanded");
        $(this).toggleClass('is-active');
        if ($(this).hasClass('is-active')) {
            window.localStorage.setItem('voyager.stickySidebar', true);
        } else {
            window.localStorage.setItem('voyager.stickySidebar', false);
        }
    });

    helpers.initSelect2('select.select2');
    helpers.initSelect2Ajax('select.select2-ajax');

    helpers.initSelect2MorphToType('select.select2-morph-to-type');
    helpers.initSelect2MorphToAjax('select.select2-morph-to-ajax');

    $('.match-height').matchHeight();

    $('.datatable').DataTable({
        "dom": '<"top"fl<"clear">>rt<"bottom"ip<"clear">>'
    });

    $(".side-menu .nav .dropdown").on('show.bs.collapse', function () {
        return $(".side-menu .nav .dropdown .collapse").collapse('hide');
    });

    $('.panel-collapse').on('hide.bs.collapse', function(e) {
        var target = $(e.target);
        if (!target.is('a')) {
            target = target.parent();
        }
        if (!target.hasClass('collapsed')) {
            return;
        }
        e.stopPropagation();
        e.preventDefault();
    });

    $(document).on('click', '.panel-heading a.panel-action[data-toggle="panel-collapse"]', function (e) {
        e.preventDefault();
        var $this = $(this);

        // Toggle Collapse
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.removeClass('voyager-angle-up').addClass('voyager-angle-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.removeClass('voyager-angle-down').addClass('voyager-angle-up');
        }
    });

    //Toggle fullscreen
    $(document).on('click', '.panel-heading a.panel-action[data-toggle="panel-fullscreen"]', function (e) {
        e.preventDefault();
        var $this = $(this);
        if (!$this.hasClass('voyager-resize-full')) {
            $this.removeClass('voyager-resize-small').addClass('voyager-resize-full');
        } else {
            $this.removeClass('voyager-resize-full').addClass('voyager-resize-small');
        }
        $this.closest('.panel').toggleClass('is-fullscreen');
    });

    $('.datepicker').datetimepicker({
        useCurrent: false,
        showClear: true,
        debug: false,
        showClose: true,
        widgetPositioning: {
            vertical: 'bottom',
        },
    });

    // Save shortcut
    $(document).keydown(function (e) {
        if ((e.metaKey || e.ctrlKey) && e.keyCode == 83) { /*ctrl+s or command+s*/
            $(".btn.save").click();
            e.preventDefault();
            return false;
        }
    });

    /********** MARKDOWN EDITOR **********/

    $('textarea.easymde').each(function () {
        var easymde = new EasyMDE({
            element: this
        });
        easymde.render();
    });

    /********** END MARKDOWN EDITOR **********/

});
