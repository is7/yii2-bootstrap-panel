let panelToggleMinimize = function() {
    let panel = $(this).parents('.panel');
    let minimized = panel.data('minimized');
    let minWidth = panel.find('.panel-buttons').width() + parseInt(panel.find('.panel-heading').css('padding-left')) + parseInt(panel.find('.panel-heading').css('padding-right')) + 2;

    if(minimized) {
        panel.animate({width: panel.data('width')}, 200);
        panel.find('.panel-body').show();
        panel.find('.panel-title > a').show();
        panel.find('.panel-title > span').show();
        panel.find('.panel-title').css('min-height', '');
        panel.data('minimized', false);
        $(this).find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
    else {
        panel.find('.panel-title').css('min-height', panel.find('.panel-title').height());
        panel.find('.panel-title > a').hide();
        panel.find('.panel-title > span').hide();
        panel.find('.panel-body').hide();
        panel.data('width', panel.width());
        panel.animate({width: minWidth}, 200);
        panel.data('minimized', true);
        $(this).find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    }
};