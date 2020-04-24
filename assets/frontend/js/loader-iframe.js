var zgfm_Loader = function () {};
zgfm_Loader.prototype = {
	require: function (scripts, callback) {
		this.loadCount = 0;
		this.totalRequired = scripts.length;
		this.callback = callback;

		for (var i = 0; i < scripts.length; i++) {
			this.writeScript(scripts[i]);
		}
	},
	loaded: function (evt) {
		this.loadCount++;

		if (this.loadCount == this.totalRequired && typeof this.callback == 'function') this.callback.call();
	},
	writeScript: function (src) {
		var self = this;
		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.async = true;
		s.src = src;
		s.addEventListener(
			'load',
			function (e) {
				self.loaded(e);
			},
			false
		);
		var head = document.getElementsByTagName('head')[0];
		head.appendChild(s);
	}
};
var zgfm_load_iframe = new zgfm_Loader();
zgfm_load_iframe.require([UIFORM_SRC + 'assets/frontend/js/iframe/4.1.1/iframeResizer.min.js'], function () {
	for (var i in _uifmvar.fm_ids) {
		document.getElementById('zgfm-iframe-' + _uifmvar.fm_ids[i]).onload = function () {
			iFrameResize(
				{
					log: false,
					autoResize: true,
					sizeWidth: true,
					warningTimeout: 0,
					onScroll: function (coords) {}
				},
				'#zgfm-iframe-' + _uifmvar.fm_ids[i]
			);
		};
	}
});
