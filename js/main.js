$(document).ready(function (){
	$('#left_tab_schema').click(function () {
		$('#tab_schema').removeClass('hidden');  $('#left_tab_schema').addClass('active');
        $('#tab_links').addClass('hidden');if($("#left_tab_links").hasClass("active")) $('#left_tab_links').removeClass('active');
        $('#tab_langs').addClass('hidden');if($("#left_tab_langs").hasClass("active")) $('#left_tab_langs').removeClass('active');
        $('#tab_mvc_m').addClass('hidden');if($("#left_tab_mvc_m").hasClass("active")) $('#left_tab_mvc_m').removeClass('active');
        $('#tab_mvc_v').addClass('hidden');if($("#left_tab_mvc_v").hasClass("active")) $('#left_tab_mvc_v').removeClass('active');
        $('#tab_mvc_c').addClass('hidden');if($("#left_tab_mvc_c").hasClass("active")) $('#left_tab_mvc_c').removeClass('active');
        $('#tab_seeds').addClass('hidden');if($("#left_tab_seeds").hasClass("active")) $('#left_tab_seeds').removeClass('active');
        $('#tab_info').addClass('hidden');if($("#left_tab_info").hasClass("active")) $('#left_tab_info').removeClass('active');
        //
        
    });

    $('#left_tab_links').click(function () {
        $('#tab_schema').addClass('hidden');if($("#left_tab_schema").hasClass("active")) $('#left_tab_schema').removeClass('active');
        $('#tab_links').removeClass('hidden'); $('#left_tab_links').addClass('active');
        $('#tab_langs').addClass('hidden');if($("#left_tab_langs").hasClass("active")) $('#left_tab_langs').removeClass('active');
        $('#tab_mvc_m').addClass('hidden');if($("#left_tab_mvc_m").hasClass("active")) $('#left_tab_mvc_m').removeClass('active');
        $('#tab_mvc_v').addClass('hidden');if($("#left_tab_mvc_v").hasClass("active")) $('#left_tab_mvc_v').removeClass('active');
        $('#tab_mvc_c').addClass('hidden');if($("#left_tab_mvc_c").hasClass("active")) $('#left_tab_mvc_c').removeClass('active');
        $('#tab_seeds').addClass('hidden');if($("#left_tab_seeds").hasClass("active")) $('#left_tab_seeds').removeClass('active');
        $('#tab_info').addClass('hidden');if($("#left_tab_info").hasClass("active")) $('#left_tab_info').removeClass('active');
        
    });

    $('#left_tab_langs').click(function () {
        $('#tab_schema').addClass('hidden');if($("#left_tab_schema").hasClass("active")) $('#left_tab_schema').removeClass('active');
        $('#tab_links').addClass('hidden');if($("#left_tab_links").hasClass("active")) $('#left_tab_links').removeClass('active');
        $('#tab_langs').removeClass('hidden');$('#left_tab_langs').addClass('active');
        $('#tab_mvc_m').addClass('hidden');if($("#left_tab_mvc_m").hasClass("active")) $('#left_tab_mvc_m').removeClass('active');
        $('#tab_mvc_v').addClass('hidden');if($("#left_tab_mvc_v").hasClass("active")) $('#left_tab_mvc_v').removeClass('active');
        $('#tab_mvc_c').addClass('hidden');if($("#left_tab_mvc_c").hasClass("active")) $('#left_tab_mvc_c').removeClass('active');
        $('#tab_seeds').addClass('hidden');if($("#left_tab_seeds").hasClass("active")) $('#left_tab_seeds').removeClass('active');
        $('#tab_info').addClass('hidden');if($("#left_tab_info").hasClass("active")) $('#left_tab_info').removeClass('active');
        
    });

    $('#left_tab_mvc_m').click(function () {
        $('#tab_schema').addClass('hidden');if($("#left_tab_schema").hasClass("active")) $('#left_tab_schema').removeClass('active');
        $('#tab_links').addClass('hidden');if($("#left_tab_links").hasClass("active")) $('#left_tab_links').removeClass('active');
        $('#tab_langs').addClass('hidden');if($("#left_tab_langs").hasClass("active")) $('#left_tab_langs').removeClass('active');
        $('#tab_mvc_m').removeClass('hidden');$('#left_tab_mvc_m').addClass('active');
        $('#tab_mvc_v').addClass('hidden');if($("#left_tab_mvc_v").hasClass("active")) $('#left_tab_mvc_v').removeClass('active');
        $('#tab_mvc_c').addClass('hidden');if($("#left_tab_mvc_c").hasClass("active")) $('#left_tab_mvc_c').removeClass('active');
        $('#tab_seeds').addClass('hidden');if($("#left_tab_seeds").hasClass("active")) $('#left_tab_seeds').removeClass('active');
        $('#tab_info').addClass('hidden');if($("#left_tab_info").hasClass("active")) $('#left_tab_info').removeClass('active');
        
    });

    $('#left_tab_mvc_v').click(function () {
        $('#tab_schema').addClass('hidden');if($("#left_tab_schema").hasClass("active")) $('#left_tab_schema').removeClass('active');
        $('#tab_links').addClass('hidden');if($("#left_tab_links").hasClass("active")) $('#left_tab_links').removeClass('active');
        $('#tab_langs').addClass('hidden');if($("#left_tab_langs").hasClass("active")) $('#left_tab_langs').removeClass('active');
        $('#tab_mvc_m').addClass('hidden');if($("#left_tab_mvc_m").hasClass("active")) $('#left_tab_mvc_m').removeClass('active');
        $('#tab_mvc_v').removeClass('hidden');$('#left_tab_mvc_v').addClass('active');
        $('#tab_mvc_c').addClass('hidden');if($("#left_tab_mvc_c").hasClass("active")) $('#left_tab_mvc_c').removeClass('active');
        $('#tab_seeds').addClass('hidden');if($("#left_tab_seeds").hasClass("active")) $('#left_tab_seeds').removeClass('active');
        $('#tab_info').addClass('hidden');if($("#left_tab_info").hasClass("active")) $('#left_tab_info').removeClass('active');
        
    });

    $('#left_tab_mvc_c').click(function () {
        $('#tab_schema').addClass('hidden');if($("#left_tab_schema").hasClass("active")) $('#left_tab_schema').removeClass('active');
        $('#tab_links').addClass('hidden');if($("#left_tab_links").hasClass("active")) $('#left_tab_links').removeClass('active');
        $('#tab_langs').addClass('hidden');if($("#left_tab_langs").hasClass("active")) $('#left_tab_langs').removeClass('active');
        $('#tab_mvc_m').addClass('hidden');if($("#left_tab_mvc_m").hasClass("active")) $('#left_tab_mvc_m').removeClass('active');
        $('#tab_mvc_v').addClass('hidden');if($("#left_tab_mvc_v").hasClass("active")) $('#left_tab_mvc_v').removeClass('active');
        $('#tab_mvc_c').removeClass('hidden');$('#left_tab_mvc_c').addClass('active');
        $('#tab_seeds').addClass('hidden');if($("#left_tab_seeds").hasClass("active")) $('#left_tab_seeds').removeClass('active');
        $('#tab_info').addClass('hidden');if($("#left_tab_info").hasClass("active")) $('#left_tab_info').removeClass('active');
        
        
    });

    $('#left_tab_seeds').click(function () {
        $('#tab_schema').addClass('hidden');if($("#left_tab_schema").hasClass("active")) $('#left_tab_schema').removeClass('active');
        $('#tab_links').addClass('hidden');if($("#left_tab_links").hasClass("active")) $('#left_tab_links').removeClass('active');
        $('#tab_langs').addClass('hidden');if($("#left_tab_langs").hasClass("active")) $('#left_tab_langs').removeClass('active');
        $('#tab_mvc_m').addClass('hidden');if($("#left_tab_mvc_m").hasClass("active")) $('#left_tab_mvc_m').removeClass('active');
        $('#tab_mvc_v').addClass('hidden');if($("#left_tab_mvc_v").hasClass("active")) $('#left_tab_mvc_v').removeClass('active');
        $('#tab_mvc_c').addClass('hidden');if($("#left_tab_mvc_c").hasClass("active")) $('#left_tab_mvc_c').removeClass('active');
        $('#tab_seeds').removeClass('hidden');$('#left_tab_seeds').addClass('active');
        $('#tab_info').addClass('hidden');if($("#left_tab_info").hasClass("active")) $('#left_tab_info').removeClass('active');
        
    });

    $('#left_tab_info').click(function () {
        $('#tab_schema').addClass('hidden');if($("#left_tab_schema").hasClass("active")) $('#left_tab_schema').removeClass('active');
        $('#tab_links').addClass('hidden');if($("#left_tab_links").hasClass("active")) $('#left_tab_links').removeClass('active');
        $('#tab_langs').addClass('hidden');if($("#left_tab_langs").hasClass("active")) $('#left_tab_langs').removeClass('active');
        $('#tab_mvc_m').addClass('hidden');if($("#left_tab_mvc_m").hasClass("active")) $('#left_tab_mvc_m').removeClass('active');
        $('#tab_mvc_v').addClass('hidden');if($("#left_tab_mvc_v").hasClass("active")) $('#left_tab_mvc_v').removeClass('active');
        $('#tab_mvc_c').addClass('hidden');if($("#left_tab_mvc_c").hasClass("active")) $('#left_tab_mvc_c').removeClass('active');
        $('#tab_seeds').addClass('hidden');if($("#left_tab_seeds").hasClass("active")) $('#left_tab_seeds').removeClass('active');
        $('#tab_info').removeClass('hidden');$('#left_tab_info').addClass('active');
        
    });

    $('#menu_icon').click(function () {
    	if($( "#side_bar" ).hasClass( "side_bar_full" ))
    	{
    		$('#menu_icon').removeClass("menu_icon_holded");
    		$('#side_bar').removeClass("side_bar_full");
    		$('#tab_schema').removeClass("main_panel_mini");
    		$('#tab_links').removeClass("main_panel_mini");
    		$('#tab_langs').removeClass("main_panel_mini");
    		$('#tab_mvc_m').removeClass("main_panel_mini");
    		$('#tab_mvc_v').removeClass("main_panel_mini");
    		$('#tab_mvc_c').removeClass("main_panel_mini");
    		$('#tab_seeds').removeClass("main_panel_mini");
    		$('#tab_info').removeClass("main_panel_mini");
    	}
        else
        {
        	$('#menu_icon').addClass("menu_icon_holded");
        	$('#side_bar').addClass("side_bar_full");
        	$('#tab_schema').addClass("main_panel_mini");
        	$('#tab_links').addClass("main_panel_mini");
        	$('#tab_langs').addClass("main_panel_mini");
        	$('#tab_mvc_m').addClass("main_panel_mini");
			$('#tab_mvc_v').addClass("main_panel_mini");
			$('#tab_mvc_c').addClass("main_panel_mini");
        	$('#tab_seeds').addClass("main_panel_mini");
        	$('#tab_info').addClass("main_panel_mini");
        }
    });


});