$(document).ready(function() {

    var $add = $('#add'),
            $send = $('#save'),
            $form = $('#form_header'),
            $lbl = $('#main').find('.lbl'),
            $edt = $('#main').find('.edt'),
            $edtgroup = $('#main').find('.edtgroup'),
            $val = $('#main').find('.val'),
            $zero = $('#main').find('.zero_result'),
            $title = $('.table_title:first').val(),
            $assetdetails = $('#assetdetails'),
            $approve = $('.approve'),
            $reject = $('.reject');

    $('#nav-2').show();
    $('#legendhead').hide();
    $('#legend').show();
    $('#newadd').click(function(e) {
        $('#nav-2').toggle('slow');
        $('#legend').toggle();
        $('#legendhead').toggle();
        e.preventDefault();
    });

    $edt.hide();
    $edtgroup.hide();
    addstrip();

    $('#main').on('click', '.searchasset', function(e) {
        e.stopPropagation();
        var source = $(this).attr('data-src')
        var modal = $(this).attr('data-target');
        var tr = $(this).closest('tr');
        $.ajax({
            url: source + '/listmodal/' + $('#branch_value').val(),
            method: 'GET',
            cache: 'false',
            success: function(data) {
                $(modal).find('.modal-body').html(data);
                $(modal).modal('show');
                moveDetailsMutation(tr, modal)
            }
        });
        return false;
    });

    $('#main').on('click', '.delete', function(e) {
        e.stopPropagation();
        e.preventDefault();
        if (confirm('Are you sure to delete this data ?')) {
            $.ajax({
                url: $title + '/delete',
                type: 'POST',
                data: {
                    header: $form.serializeArray(),
                    id: this.id
                },
                success: function(data) {
                    $.tabledetails();
                }
            });
        }
    });

    $('#main').on('click', '.edit', function(e) {
        e.stopPropagation();
        e.preventDefault();
        var tr = $(this).closest('tr');
        tr.addClass('update');
        $.color(tr);
        $.lblclick(tr);
        $.edtchange(tr);
        hide_save();
    });
    
    $approve.click(function(){
        $.ajax({
            url : $title + '/approve',
            type : 'POST',
            data: {
                header : $form.serializeArray()
            },
            success : function(data){
               main();
               hide_apprej(true); 
            }
        });
    });
    
    $reject.click(function(){
        $.ajax({
            url : $title + '/reject',
            type : 'POST',
            data: {
                header : $form.serializeArray()
            },
            success : function(data){
               main();
               hide_apprej(true); 
            }
        });
    });

    $add.click(function(e) {
        e.stopPropagation();
        if ($.header_valid())
            $.newline();
        return false;
    });

    $send.click(function(e) {
        $(this).hide();
        e.stopPropagation();
        if ($.header_valid()) {
            $.ajax({
                url: $title + '/insert',
                type: 'POST',
                data: {
                    new : $.newdetails(),
                    update: $.upddetails(),
                    header: $form.serializeArray(),
                },
                success: function(data) {
//                    $('#h_trans_no').val(data);
//                    $.tabledetails();
//                    hide_apprej();
                    window.path = $title + '/translist/' + data;
                    main();
                }
            });
        } else {
            alert('Important header values are missing !');
        }
        e.preventDefault();
    });

    $.tabledetails = function() {
        $.ajax({
            url: $title + '/table/' + $('#h_trans_no').val(),
            type: 'GET',
            cache: false,
            success: function(data) {
                $('#tableholder').html(data);
                $.hideeditor();
                addstrip();
            }
        });
    }

    $.newline = function() {
        var tr_check = $('#tableholder').find('tr').length;
        $.ajax({
            url: $title + '/newline/' + tr_check,
            type: 'GET',
            cache: false,
            success: function(data) {
                if (tr_check <= 1) {
                    $('#tableholder').html(data);
                    var $current = $('tr.new:last').find('.lbl:first');
                } else {
                    $('#table_result').find('tbody').append(data);
                    var $current = $('tr.new:last').find('.lbl:first');
                }
                $.hideeditor();
                $.delete();
                $.color($('tr.new'));
                $.lblclick($('tr.new'));
                $.edtchange($('tr.new'));
                    $current.trigger('click');
                    hide_save();
            }
        });
    }

    $.hideeditor = function() {
        $('.edtgroup').hide();
        $('.edt').hide();
    }

    $.delete = function() {
        $('#tableholder').on('click', '.remove', function(e) {
            e.stopPropagation();
            $(this).closest('tr').remove();
            var tr_check = $('#tableholder').find('tr').length;
            if (tr_check <= 1) {
                $.emptylist();
            }
            hide_save();
            e.preventDefault();
        });
    }

    $.emptylist = function() {
        $.ajax({
            url: $title + '/zerolist',
            type: 'GET',
            cache: false,
            success: function(data) {
                $('#tableholder').html(data);
            }
        });
    }

    $.lblclick = function(tr) {
        $(tr).on('click', '.lbl', function(e) {
            e.stopPropagation();
            if ($(this).hasClass('static'))
                return false;
            if ($(this).next().find('.edt').hasClass('asset_no'))
                $(this).addClass('lookup');
            if ($(this).next().hasClass('edt')) {
                $(this).hide().next().show().focus();
            } else {
                $(this).hide().next().show().find('.edt').show().focus();
            }
        });
    }

    $.edtchange = function(tr) {
        $(tr).on('blur', '.edt', function(e) {
            e.stopPropagation();
            var value = $(this).val();
            var text = $(this).find(':selected').text();

            if (value !== '' && value !== '0') {
                $(this).closest('td').find('.val').val(value);
                ($(this)[0].tagName === 'INPUT' || $(this)[0].tagName === 'TEXTAREA') ? $(this).closest('td').find('.lbl').text(value) : $(this).closest('td').find('.lbl').text(text);
            }

            if ($(this).parents('.edtgroup').prev().hasClass('lookup'))
                return false;

            if ($(this).closest('.edtgroup').length === 0) {
                $(this).hide().prev().show();
            } else {
                $(this).closest('.edtgroup').hide().prev().show();
            }
        });

        $('.edt').on('keydown', function(e) {
            switch (e.which) {
                case 9 :
                    $(this).trigger('blur');
                    var $next = $(this).parents('td').next().find('.lbl');
                    if ($next.length > 0) {
                            $next.trigger('click');
                    } else {
                        var $tr = $(this).parents('tr').next();
                        if($tr.length > 0){
                            $tr.find('.lbl:first').trigger('click');
                        } else {
                            $add.trigger('click');                 
                        }

                    }
                    e.preventDefault();
                    break;
            }
        });
    }

    $.newdetails = function() {
        var valtr = {},
                branket = [];
        $('tr.new').each(function(i, j) {
            valtr = {};
            $(this).find('.val').each(function() {
                valtr[this.id] = $(this).val();
            });
            branket.push(valtr);
        });
        console.log(branket);
        return branket;
    }

    $.upddetails = function() {
        var valtr = {},
                branket = [];
        $('tr.update').each(function(i, j) {
            valtr = {};
            $(this).find('.val').each(function() {
                valtr[this.id] = $(this).val();
            });
            branket.push(valtr);
        });
        return branket;
    }

    function addstrip() {
        $('#tableholder').find('.lbl').each(function() {
            if ($(this).text() === '' || $(this).text() === '0')
                $(this).text('-');
        });
    }

    $.header_valid = function() {
        var msg = [];
        if ($('#h_date').find('input').val() === '')
            msg.push('Date must filled!');
//            return false;
        if ($('#branch_value').val() === '')
            msg.push('Branch must filled!');
//            return false;
        if ($('#vendor_value').val() === '' || $('#branch_value2').val() === '')
            msg.push('Vendor or to Branch must filled!');
//            return false;
            if(msg.length > 0){ alert(msg.join('\n')); return false };
        return true;
    }

    $.color = function(tr) {
        tr.find('.lbl').not('.static').each(function() {
            $(this).css('color', 'blue');
        });
    }

    function moveDetailsMutation(tr, modal) {
        $('.catchable').click(function(e) {
            tr.find('.asset_no').val($(this).html());
            $(this).closest('tr').find('.moveable').each(function() {
                if ($(this).text() !== '') {
                    tr.find('td#' + this.id).text($(this).text());
                } else {
                    tr.find('td#' + this.id).text('-');
                }
                ;
            });
            $(modal).modal('hide');
            tr.find('.lbl').removeClass('lookup');
            tr.find('.asset_no:eq(0)').trigger('blur');
            e.preventDefault();
        });
    }
    
    function hide_save() {
        var class_new = $('#table_result').find('.new').length;
        var class_update = $('#table_result').find('.update').length;

        if (class_new > 0 || class_update > 0) {
            $('#save').show();
        } else {
            $('#save').hide();
        }
    }
    
    function hide_apprej(toggle){
        var $approve = $('.approve');
        var $reject = $('.reject');
        
        if($('#h_trans_no').val() === '' || toggle === true){
            $reject.hide();
            $approve.hide();
        } else {
            $approve.show();
            $reject.show();
        }
        
    }
    
    function main() {
        $.ajax({
            url : window.path,
            cache : false,
            success : function(data){
                $('#main').html(data);
            }
        });
    }
    
    hide_save();
    hide_apprej(false);

});