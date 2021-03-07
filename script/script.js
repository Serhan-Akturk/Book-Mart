jQuery(document).ready(function(){
    // VARIABLES
    

    // hiding on load
    $('#signUp-Form').hide();
    $('#fg-pass').hide();
   
    // Dashboard items
    $('#search-item').hide();
    $('#req-bk').hide();
    $('#order-book').hide();
    $('#myBooks').hide();
    $('#find-tutor').hide();
    $('#update-account').hide();

    // hides the account div until button is clicked
    $('#hide-div').hide();

    // alternate html file
    $('#lg-btn').on('click',function(){
        $('#signUp-Form').hide();
        $('#fg-pass').hide();

        // for alternate html
        $('#lg-form').show();
        $('#lg-cont').show();

    });

    $('#signUp-btn').on('click',function(){
        $('#signUp-Form').show();

        // for alternate html
        $('#lg-form').hide();
        $('#lg-cont').hide();
        $('#fg-pass').hide();

    });
    $('#fgPassword-btn').on('click',function(){
        $('#fg-pass').show();

        $('#lg-form').hide();
        $('#lg-cont').hide();
        $('#signUp-Form').hide();

    })




    // dashboard items
    $('#item1').on('click',function(){
        $('#welcomeNote').hide();
        $('#order-book').hide();
        $('#req-bk').hide();
        $('#myBooks').hide();
        $('#find-tutor').hide();
        $('#update-account').hide();


        $('#search-item').show();

    });
    $('#item2').on('click',function(){
        $('#welcomeNote').hide();
        $('#search-item').hide();
        $('#order-book').hide();
        $('#myBooks').hide();
        $('#find-tutor').hide();
        $('#update-account').hide();


        $('#req-bk').show();
    });

    $('#item3').on('click',function(){
        $('#welcomeNote').hide();
        $('#search-item').hide();
        $('#req-bk').hide();
        $('#myBooks').hide();
        $('#find-tutor').hide();
        $('#update-account').hide();


        $('#order-book').show();
    });

    $('#item4').on('click',function(){
        $('#welcomeNote').hide();
        $('#search-item').hide();
        $('#req-bk').hide();
        $('#order-book').hide();
        $('#find-tutor').hide();
        $('#update-account').hide();


        $('#myBooks').show();
    });

    $('#item5').on('click',function(){
        $('#welcomeNote').hide();
        $('#search-item').hide();
        $('#req-bk').hide();
        $('#order-book').hide();
        $('#myBooks').hide();
        $('#update-account').hide();

        
        $('#find-tutor').show();
    });
    $('#item6').on('click',function(){
        $('#welcomeNote').hide();
        $('#search-item').hide();
        $('#req-bk').hide();
        $('#order-book').hide();
        $('#myBooks').hide();
        $('#find-tutor').hide();

        $('#update-account').show();

    });


    // to show the div after acoount update is clicked
    $('#updateAcct').on('click',function(){
        $('#hide-div').show();

    });


    // const hambuger =document.querySelector(".hamburger");
    // const navLinks =document.querySelector(".my-ul");
    // const links =document.querySelector(".my-ul li");
    // const bdy = document.querySelector("body");

    // hambuger.addEventListener('click', ()=> {
    //     navLinks.classList.toggle("open");
        
    // });
    // var zero=0;
    // $(window).on('scroll',function(){
    //     $('.nav-links').toggleClass('hide',$(window).scrollTop() > zero);
    //     zero = $(window).scrollTop();
    // });

});