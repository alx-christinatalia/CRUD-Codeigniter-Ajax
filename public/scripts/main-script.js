
$(document).ready(function() {

    window.window.path;
    window.url = $('.brand:first > a').attr('href');

     $.main = function main() {
        var $branch = $('#def_branch').text();
        $.ajax({
            url : window.path,
            method: 'post',
            data : {'id_branch' : $branch},
            cache : false,
            success : function(data){
                $('#main').html(data);
            }
        });
    }


    $('.menu').click(function(e) {
        window.path = $(this).attr('href');
        $.main();
        e.preventDefault();
    });

    $('#main').on('click', '.details, #add', function(e) {
        window.path = $(this).attr('href');
        $.main();
        e.preventDefault();
    });

    $('#login').on('click', function() {
        $('#charms').addClass('in');
        $('#charms').toggleClass('cls');
    });

    $('#btn_login').on('click', function() {
        $.ajax({
            url: 'index/dologin',
            method: 'POST',
            data: $('#form_login').serialize(),
            cache: 'false',
            statusCode: {
                500 : function(){
                    alert('invalid username or password!');
                },
                200 : function(){
                    location.reload();
                }
            }
        });
        return false;
    });
    
    $('#change_pass').on('click', function(e){
        $.ajax({
            url : 'index/newpassword',
            method: 'POST',
            data : $(this).parents('form').serializeArray(),
            success : function(data){
                alert(data);
                $('#newpass').val('');
            }
        });
        return false;
    });

    $('#btn_logout').on('click', function() {
        logout();
        return false;
    });
    
    $(document).on('click', '.branchchanger', function(e){   
        e.preventDefault();
         var uri = $('#uri').val();
         var $branch = $(this).text();
         $.ajax({
                url:  uri + '/index',
                method: 'POST',
                cache: 'false',
                data : {'id_branch' : $branch},
                success: function(data) {
                    $('#main').html(data);
                }
            });     
        $('#def_branch').text($(this).text());
        $('#def_branch').next().text($(this).next().val());
        $('#branch_value').val($(this).text());
        $('#branch_name').val($(this).next().val());
        e.preventDefault();
    });
    
    setInterval(function(){
        $('.currency').not('.formatted').each(function(){
            var ori = $(this).text().toString();
                
                if(parseInt(ori)){
                    var after = [];
                    var wil = ori.split('').reverse();
                    $.each(wil, function(k, v){
                        if((k+1) % 3 === 0){
							if((k+1) === wil.length){
								after.push(v);
							} else {
								after.push(v);
								after.push(',')
							}
                        } else {
                            after.push(v);
                        }
                    });
                    var afterjoin = after.reverse().join('');
                    $(this).text(afterjoin);
                    $(this).addClass('formatted');
                }
        })
    }, 3000);
	
	function branchchanger(id_branch){
	$.ajax({
				url: 'index/changebranch',
				method: 'POST',
				data: {
					id_branch: id_branch
				},
				success: function(data){
				}
			});
	}
    
    function logout() {
        $.ajax({
            url: 'index/dologout',
            method: 'POST',
            cache: 'false',
            success: function(data) {
                location.reload();
            }
        });
    }

});