BOOTSTRAP = ./css/bootstrap.css
BOOTSTRAP_LESS = ./less/bootstrap.less
BOOTSTRAP_RESPONSIVE = .css/bootstrap-responsive.css
BOOTSTRAP_RESPONSIVE_LESS = ./less/responsive.less
LESS_COMPRESSOR ?= `which lessc`
WATCHR ?= `which watchr`

docs:
	mkdir -p img
	mkdir -p css
	mkdir -p js
	lessc ${BOOTSTRAP_LESS} > css/bootstrap.css
	lessc --compress ${BOOTSTRAP_LESS} > css/bootstrap.min.css
	lessc ${BOOTSTRAP_RESPONSIVE_LESS} > css/bootstrap-responsive.css
	lessc --compress ${BOOTSTRAP_RESPONSIVE_LESS} > css/bootstrap-responsive.min.css
	cat js/bootstrap-transition.js js/bootstrap-alert.js js/bootstrap-button.js js/bootstrap-carousel.js js/bootstrap-collapse.js js/bootstrap-dropdown.js js/bootstrap-modal.js js/bootstrap-tooltip.js js/bootstrap-popover.js js/bootstrap-scrollspy.js js/bootstrap-tab.js js/bootstrap-typeahead.js > js/bootstrap.js
	/Users/Noel/node_modules/uglify-js/bin/uglifyjs -nc js/bootstrap.js > js/bootstrap.min.js

watch:
	echo "Watching less files..."; \
	/Users/Noel/node_modules/watchr/bin/watchr  -e "watch('less/.*\.less') { system 'make' }"


.PHONY: dist docs watch gh-pages
