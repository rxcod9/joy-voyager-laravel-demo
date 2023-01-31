/*--------------------
|
| HELPERS
|
--------------------*/

var displayAlert = function (alert, alerter) {
    let alertMethod = alerter[alert.type];

    if (alertMethod) {
        return alertMethod(alert.message);
    }

    alerter.error("No alert method found for alert type: " + alert.type);
}

var displayAlerts = function (alerts, alerter, type) {
    if (type) {
        // Only display alerts of this type...
        alerts = alerts.filter(function (alert) {
            return type == alert.type;
        });
    }

    for (a in alerts) {
        displayAlert(alerts[a], alerter);
    }
}

var bootstrapAlerter = function (customOptions) {
    // Default options
    let options = {
        alertsContainer: '#alertsContainer',
        dismissible: false,
        dismissButton: '<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
    };

    if (customOptions) {
        options = $.extend({}, options, customOptions);
    }

    let dismissibleClass = '';
    let dismissButton = '';

    if (options.dismissible) {
        dismissButton = options.dismissButton;
        dismissibleClass = ' alert-dismissible';
    }

    function notify(type, message) {
        let alert = '<div class="alert alert-' + type + dismissibleClass + '" role="alert">'
            + dismissButton + message +
            '</div>';

        $(options.alertsContainer).append(alert);
    }

    return {
        success(message) {
            notify('success', message);
        },
        info(message) {
            notify('info', message);
        },
        warning(message) {
            notify('warning', message);
        },
        error(message) {
            notify('danger', message);
        }
    };
}

// select.select2
var initSelect2 = function (el, parent, options) {
    $(el, parent).select2({
        ...{ width: '100%' },
        ...options,
    });

    $(el, parent).on('select2:select', function (e) {
        var data = e.params.data;
        if (data.id == '') {
            // "None" was selected. Clear all selected options
            $(this).val([]).trigger('change');
        }
    });
}

// select.select2-ajax
var initSelect2Ajax = function (el, parent, options) {
    $(el, parent).each(function () {
        $(this).select2({
            ...{
                width: '100%',
                tags: $(this).hasClass('taggable'),
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term,
                        newTag: true
                    }
                },
                ajax: {
                    url: $(this).data('get-items-route'),
                    data: function (params) {
                        var query = {
                            search: params.term,
                            type: $(this).data('get-items-field'),
                            method: $(this).data('method'),
                            id: $(this).data('id'),
                            page: params.page || 1
                        }
                        return query;
                    }
                }
            },
            ...options
        });

        $(this).on('select2:select', function (e) {
            var data = e.params.data;
            if (data.id == '') {
                // "None" was selected. Clear all selected options
                $(this).val([]).trigger('change');
            } else {
                $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected', 'selected');
            }
        });

        $(this).on('select2:unselect', function (e) {
            var data = e.params.data;
            $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected', false);
        });

        $(this).on('select2:selecting', function (e) {
            if (!$(this).hasClass('taggable')) {
                return;
            }
            var $el = $(this);
            var route = $el.data('route');
            var label = $el.data('label');
            var errorMessage = $el.data('error-message');
            var newTag = e.params.args.data.newTag;

            if (!newTag) return;

            $el.select2('close');

            $.post(route, {
                [label]: e.params.args.data.text,
                _tagging: true,
            }).done(function (data) {
                var newOption = new Option(e.params.args.data.text, data.data.id, false, true);
                $el.append(newOption).trigger('change');
            }).fail(function (error) {
                toastr.error(errorMessage);
            });

            return false;
        });
    });
}

// select.select2-morph-to-type
var initSelect2MorphToType = function (el, parent, options) {
    $(el, parent).select2({
        ...{ width: '100%' },
        ...options,
    });

    $(el, parent).on('change.select2-morph-to-type', function (e) {
        const thisParent = $(this).closest('.form-group');
        let idEl = $('select.select2-morph-to-ajax[name=' + $(this).data('column') + ']', thisParent);
        if(idEl.length <= 0) {
            idEl = $('select.select2-morph-to-ajax[name="' + $(this).data('column') + '[]"]', thisParent);
        }
        if(!idEl.prop('multiple')) {
            idEl.val(null).trigger('change');
        } else {
            idEl.val([]).trigger('change');
        }
    });
}

// select.select2-morph-to-ajax
var initSelect2MorphToAjax = function (el, parent, options) {
    $(el, parent).each(function () {
        $(this).select2({
            ...{
                width: '100%',
                tags: $(this).hasClass('taggable'),
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term,
                        newTag: true
                    }
                },
                ajax: {
                    url: $(this).data('get-items-route'),
                    data: function (params) {
                        const thisParent = $(this).closest('.form-group');
                        var query = {
                            search: params.term,
                            type: $(this).data('get-items-field'),
                            "type-column-value": $('select.select2-morph-to-type[name=' + $(this).data('type-column') + ']', thisParent).val(),
                            method: $(this).data('method'),
                            id: $(this).data('id'),
                            page: params.page || 1
                        }
                        return query;
                    }
                }
            },
            ...options
        });

        $(this).on('select2:select', function (e) {
            var data = e.params.data;
            if (data.id == '') {
                // "None" was selected. Clear all selected options
                $(this).val([]).trigger('change');
            } else {
                $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected', 'selected');
            }
        });

        $(this).on('select2:unselect', function (e) {
            var data = e.params.data;
            $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected', false);
        });

        $(this).on('select2:selecting', function (e) {
            if (!$(this).hasClass('taggable')) {
                return;
            }
            var $el = $(this);
            var route = $el.data('route');
            var label = $el.data('label');
            var errorMessage = $el.data('error-message');
            var newTag = e.params.args.data.newTag;

            if (!newTag) return;

            $el.select2('close');

            $.post(route, {
                [label]: e.params.args.data.text,
                _tagging: true,
            }).done(function (data) {
                var newOption = new Option(e.params.args.data.text, data.data.id, false, true);
                $el.append(newOption).trigger('change');
            }).fail(function (error) {
                toastr.error(errorMessage);
            });

            return false;
        });
    });
}

var setImageValue = function (url) {
    $('.mce-btn.mce-open').parent().find('.mce-textbox').val(url);
}

var initMatchHeight = function (parent) {
    $('.match-height', parent).matchHeight();
}

var initDataTable = function (parent) {
    $('.datatable', parent).DataTable({
        "dom": '<"top"fl<"clear">>rt<"bottom"ip<"clear">>'
    });
}

var initDatepicker = function (parent) {
    $('.datepicker', parent).datetimepicker({
        useCurrent: false,
        showClear: true,
        debug: false,
        showClose: true,
        widgetPositioning: {
            vertical: 'bottom',
        },
    });
}

var initEasymde = function (parent) {
    $('textarea.easymde', parent).each(function () {
        var easymde = new EasyMDE({
            element: this
        });
        easymde.render();
    });
}

exports.setImageValue = setImageValue;
exports.displayAlert = displayAlert;
exports.displayAlerts = displayAlerts;
exports.bootstrapAlerter = bootstrapAlerter;
exports.initSelect2 = initSelect2;
exports.initSelect2Ajax = initSelect2Ajax;

exports.initSelect2MorphToType = initSelect2MorphToType;
exports.initSelect2MorphToAjax = initSelect2MorphToAjax;
exports.initMatchHeight = initMatchHeight;
exports.initDataTable = initDataTable;
exports.initDatepicker = initDatepicker;
exports.initEasymde = initEasymde;