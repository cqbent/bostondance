jQuery('document').ready( function($) {

	//meanmenu
	$('.main-navigation').meanmenu();

    // for mobile device/screen only
    var my = $('#menu-item-77').html();
    $(my).prependTo('.mean-bar');

    // toggles search input field on header
    $('body').on( 'click', '#search-icon', function() {
        $("#searchform").toggleClass( 'hidden');
    });

    // submits month selection in auditions and jobs
    $('#frm_audition_archive select').on( 'change', function() {
        $('#frm_audition_archive').submit();

    });

    $('#datepicker').datepicker({
        inline : true,
        altField : '#ip_event_date',
        altFormat: "yymmdd",
        onSelect : function(){
            $('#frm_event_calendar').submit();
        }

    });

    $('#class_datepicker').datepicker({
        inline : true,
        altField : '#ip_class_date',
        altFormat: "yymmdd",
        onSelect : function(){
            $('#frm_class_calendar').submit();
        }

    });

    $('#workshop_datepicker').datepicker({
        inline : true,
        altField : '#ip_workshop_date',
        altFormat: "yymmdd",
        onSelect : function(){
            $('#frm_workshop_calendar').submit();
        }

    });


     //social sharings
     'use strict';

    // Share Icons
    $.fn.socShare = function(opts) {
    	var $this = this;
    	var $win = $(window);

    	opts = $.extend({
    		attr : 'href',
    		facebook : false,
    		google_plus : false,
    		twitter : false,
    		linked_in : false,
    		pinterest : false
    	}, opts);

    	for(var opt in opts) {

    		if(opts[opt] === false) {
    			continue;
    		}
    		switch (opt) {

    			case 'facebook':
    			var url = 'https://www.facebook.com/sharer/sharer.php?u=';
    			var name = 'Facebook';
    			_popup(url, name, opts[opt], 400, 640);
    			break;

    			case 'twitter':
    			var posttitle = $(".sbtwitter a").data("title");
    			var url = 'https://twitter.com/intent/tweet?text='+posttitle+'&url=';
    			var name = 'Twitter';
    			_popup(url, name, opts[opt], 440, 600);
    			break;

    			case 'google_plus':
    			var url = 'https://plus.google.com/share?url=';
    			var name = 'Google+';
    			_popup(url, name, opts[opt], 600, 600);
    			break;

    			case 'linked_in':
    			var url = 'https://www.linkedin.com/shareArticle?mini=true&url=';
    			var name = 'LinkedIn';
    			_popup(url, name, opts[opt], 570, 520);
    			break;

    			case 'pinterest':
    			var url = 'https://www.pinterest.com/pin/find/?url=';
    			var name = 'Pinterest';
    			_popup(url, name, opts[opt], 500, 800);
    			break;
    			default:
    			break;
    		}
    	}

    	function isUrl(data) {
    		var regexp = new RegExp( '(^(http[s]?:\\/\\/(www\\.)?|ftp:\\/\\/(www\\.)?|(www\\.)?))[\\w-]+(\\.[\\w-]+)+([\\w-.,@?^=%&:/~+#-]*[\\w@?^=%&;/~+#-])?', 'gim' );
    		return regexp.test(data);
    	}

    	function _popup(url, name, opt, height, width) {
    		if(opt !== false && $this.find(opt).length) {
    			$this.on('click', opt, function(e){
    				e.preventDefault();

    				var top = (screen.height/2) - height/2;
    				var left = (screen.width/2) - width/2;
    				var share_link = $(this).attr(opts.attr);

    				if(!isUrl(share_link)) {
    					share_link = window.location.href;
    				}

    				window.open(
    					url+encodeURIComponent(share_link),
    					name,
    					'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height='+height+',width='+width+',top='+top+',left='+left
    					);

    				return false;
    			});
    		}
    	}
    	return;
    };

    $('.sb_share').socShare({

        facebook : '.sbsoc-fb',
        twitter : '.sbsoc-tw',
        google_plus : '.sbsoc-gplus',
        linked_in : '.sbsoc-linked',
        pinterest : '.sbsoc-pinterest'

    });

    // math captcha validation =====================================================
        
    if ( typeof acf !== "undefined" ) {

        acf.add_filter('validation_complete', function( json, $form ){

            // if errors?
            // console.log(json);
            // console.log( json.errors.length );


            var x = parseInt( jQuery( '.bda_numeric_class_x input[type="text"]' ).val() );

            var y = parseInt( jQuery( '.bda_numeric_class_y input[type="text"]' ).val() );
            var op = jQuery( '#bda_numeric_operator' ).html();
            var z = parseInt( jQuery( '.bda_numeric_class_z input[type="text"]' ).val() );

            var operators = {
                '+': function(a, b) { return a + b },
                '-': function(a, b) { return a - b },
                '*': function(a, b) { return a * b },
                 // ...
            };

            //console.log(operators[op](x,y));

            if( operators[op]( x, y) != z ) {
                var newstr = '{ "input" : "acf[field_56f2790b9897d]", "message" : "Please input the right answer." }';
                json.valid = 0;
                json.errors = json.errors || [];
                // append
                json.errors = json.errors.concat( JSON.parse(newstr) );
                jQuery( '.bda_numeric_class_z input[type="text"]' ).prop('disabled', false);
            } else {
                jQuery( '.bda_numeric_class_z input[type="text"]' ).prop('disabled', true);
            }
            return json;
        });
    }

});



