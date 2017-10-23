$(document).ready(function () { 

    var valid_form = false;

    $('[id="menu-toggle"]').click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('[id="page-toggle"]').click(function(e) {
        e.preventDefault();
        $(".slide-page").toggleClass("slide");
    });

    /**
     * progress bar
     */

     $(function (){
        function timer(n) {
            $("#progress_bar_dep").css("width", n + "%");
            $("#progress_bar_dep").html( n + "%");
            if(n < 100) {
                setTimeout(function() {
                    timer(n + 1);
                }, 100);
            } else {
                $('#alert_dep').fadeToggle();
            }
        }
    
        timer(0);
    });



    /**
     * form validate
     */

    $('input:text,input:password').mouseenter(
        function () { 
            var input = $(this);

            var helpMsg = input.attr('aria-describedby');

            var message = $('small[id="' + helpMsg + '"]');

            if (input.attr('required') === 'required' && input.val() === '') {
                valid_form = false;
                input.addClass('is-invalid');
                message.addClass('form-text text-danger').html('Ce champ est obligatoire');

            } else {
                valid_form = true;
                input.removeClass('is-invalid').addClass('is-valid');
                message.addClass('form-text text-success').html('Ce champ n\'est pas vide');
            }
        }
    )

    $('input:text,input:password').mouseleave(function () { 
        var input = $(this);
        var helpMsg = input.attr('aria-describedby');
        var message = $('small[id="' + helpMsg + '"]');
        if (input.attr('required') === 'required' && input.val() !== '') {
            input.removeClass('is-invalid').addClass('is-valid');
            message.removeClass('text-danger').addClass('text-success').html('Ce champ n\'est pas vide');
        } else {
            input.addClass('is-invalid');
            message.addClass('form-text text-danger').html('Ce champ est obligatoire');
        }
     })

    
    $('[id="btn-next"]').on('click', function (e) { 
        e.preventDefault();

        $(this).parent().slideUp();
        
        next($(this).parent().attr('id'));
        
    });

    $('[id="btn-prev"]').on('click', function (e) { 
        e.preventDefault();

        $(this).parent().slideUp();

        prev($(this).parent().attr('id'));
        
    });

    function next(param) { 
         //alert(param)
        if (param === 'form_1') {
            
            $('[id="form_2"]').slideDown();

        } else if(param === 'form_2'){

            $('[id="form_3"]').slideDown();

        } else if(param === 'form_3'){

            $('[id="form_4"]').slideDown();

        } else if(param === 'form_4'){

            $('[id="form_5"]').slideDown();
            
        }
    };

    function prev(param) { 
        if (param === 'form_2') {
            
            $('[id="form_1"]').slideDown();

        } else if(param === 'form_3'){

            $('[id="form_2"]').slideDown();

        } else if(param === 'form_4'){

            $('[id="form_3"]').slideDown();

        } else if(param === 'form_5'){

            $('[id="form_4"]').slideDown();
            
        }
    };


    //progress deploiement


    $('[id="btn-intall"]').on('click', function (e) { 
        e.preventDefault();
        var element = $(this);
        var url = element.attr('href');
        //console.log(url);
        var level = element.attr('level');

        element.parent().fadeOut(function () { 
            $('.content-' + level).html('<img src="load.gif" class="load">');
            $.ajax({
                method: 'GET',
                url: url,
                data: {id: '0', level: level},
                dataType: 'JSON'
            }).done(function (data) { 
                $('.load').fadeOut(function () { 
                    swal(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                      )
                    $('.content-' + level).html('<div class="terminal"><pre>' + data + '</pre></div>')
                });
            }).fail(function (data) { 
                $('.load').fadeOut(function () {
                    
                    swal(
                        'Oops...',
                        'Une erreur s\'est produite pendant l\'instalation de DOCKER!',
                        'error'
                    )
                    $('.content-' + level).html('<div class="terminal"><pre>' + data + '</pre></div>')
                });
            })
        });

     });


    function checkForm(idForm) { 

        var textInputs = $( idForm + ' input:text');

        var passwordInputs = $(idForm + 'input:password');

        textInputs.array.forEach(function(element) {
            
        }, this);

    }


});