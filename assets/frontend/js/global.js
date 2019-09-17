;(function( $ ){
     var 
	rCRLF = /\r?\n/g,
	rsubmitterTypes = /^(?:submit|button|image|reset|file)$/i,
	rsubmittable = /^(?:input|select|textarea|keygen)/i;
        var rcheckableType = (/^(?:checkbox|radio)$/i);
        
        $.fn.getZgfmEvents = function() {
            if (typeof($._data) == 'function') {
                return $._data(this.get(0), 'events') || {};
            } else if (typeof(this.data) == 'function') { // jQuery version < 1.7.?
                return this.data('events') || {};
            }
            return {};
        };
        
        $.fn.removeCss = function() {
        var removedCss = $.makeArray(arguments);
        return this.each(function() {
            var e$ = $(this);
            var style = e$.attr('style');
            if (typeof style !== 'string') return;
            style = $.trim(style);
            var styles = style.split(/;+/);
            var sl = styles.length;
            for (var l = removedCss.length, i = 0; i < l; i++) {
            var r = removedCss[i];
            if (!r) continue;
            for (var j = 0; j < sl;) {
                var sp = $.trim(styles[j]);
                if (!sp || (sp.indexOf(r) === 0 && $.trim(sp.substring(r.length)).indexOf(':') === 0)) {
                styles.splice(j, 1);
                sl--;
                } else {
                j++;
                }
            }
            }
            if (styles.length === 0) {
            e$.removeAttr('style');
            } else {
            e$.attr('style', styles.join(';'));
            }
        });
        };
        $.fn.extend({
	uifm_serialize: function() {
		return $.param( this.uifm_serializeArray() );
	},
	uifm_serializeArray: function() {
		return this.map(function() {
			// Can add propHook for "elements" to filter or add form elements
			var elements = $.prop( this, "elements" );
                        var exclude_array=[];
                        var exclude_fields = $(this).closest('.rockfm-form').find('.rockfm-conditional-hidden :input,.rockfm-conditional-hidden select');
                        exclude_array = $.map(exclude_fields, function( n, i ) {
                            return $(n).attr('name');
                        });
                        var new_elements=[];
                        $.each(elements, function(i, val ) {
                            if(parseInt($.inArray($(val).attr('name'),exclude_array))<0){
                                new_elements.push(val);
                            }
                        });
			return new_elements ? $.makeArray( new_elements ) : this;
		})
		.filter(function() {
			var type = this.type;
			// Use .is(":disabled") so that fieldset[disabled] works
			return this.name && !$( this ).is( ":disabled" ) &&
				rsubmittable.test( this.nodeName ) && !rsubmitterTypes.test( type ) &&
				( this.checked || !rcheckableType.test( type ) );
		})
		.map(function( i, elem ) {
			var val = $( this ).val();
			return val == null ?
				null :
				$.isArray( val ) ?
					$.map( val, function( val ) {
						return { name: elem.name, value: val.replace( rCRLF, "\r\n" ) };
					}) :
					{ name: elem.name, value: val.replace( rCRLF, "\r\n" ) };
		}).get();
	}
        });
    
        
    
	/*rocketfm();
        rocketfm.initialize();
        rocketfm.setExternalVars();
        rocketfm.loadform_init();*/
        
        /*on close modal*/
        $('.uiform_modal_general').on('hidden.bs.modal', function () {
            rocketfm.modal_onclose();
        });
        
        $('.uiform_modal_general').on('shown.bs.modal', function () {
            rocketfm.modal_resizeWhenIframe();
            
        });
        
    
        
})( $uifm );

//recaptcha
var zgfm_recaptcha_elems={};
var zgfm_recaptcha_onloadCallback = function() {
 
var tmp_sitekey;
var tmp_form_id;

$uifm('.g-recaptcha').each(function (i) {

tmp_sitekey = $uifm(this).attr('data-sitekey');
tmp_form_id=$uifm(this).closest('.rockfm-form').find('._rockfm_form_id').val();

    zgfm_recaptcha_elems['recaptcha_'+tmp_form_id]= grecaptcha.render('zgfm_recaptcha_obj_'+tmp_form_id, {
        'sitekey' : tmp_sitekey
    });
 });
             
};