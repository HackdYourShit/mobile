[![Build Status](https://scrutinizer-ci.com/g/gplcart/mobile/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gplcart/mobile/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gplcart/mobile/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gplcart/mobile/?branch=master)

Mobile is mobile-only HTML5 theme for [GPL Cart](https://github.com/gplcart/gplcart) store. Based on [Jquery Mobile](http://jquerymobile.com) library.

Note: this module doesn't detect mobile devices. You should install [Device](https://github.com/gplcart/device) module to automatically switch to a mobile theme.

**Dependencies:**

[Jquery Mobile module](https://github.com/gplcart/jquery_mobile)

**Installation**

1. Download and extract to `system/modules` manually or using composer `composer require gplcart/mobile`. IMPORTANT: If you downloaded the module manually, be sure that the name of extracted module folder doesn't contain a branch/version suffix, e.g `-master`. Rename if needed.
2. Go to `admin/module/list` end enable the module
3. Adjust settings at `admin/module/settings/mobile`
3. Test it! Enable "Mobile" theme for a desired store at `admin/settings/store`

