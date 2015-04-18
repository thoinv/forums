
/**
 * @category    XenGallery
 * @package     sonnb - XenGallery
 * @version     2.1.3
 * @copyright:  sonnb
 * @link        www.sonnb.com
 * @version     One license is valid for only one nominated domain.
 * @license     You might not copy or redistribute this addon. Any action to public or redistribute must be authorized from author
 */
var XenGallery = {},
    userAgent = navigator.userAgent;

$.extend(XenGallery,
{
    os: {},
    browser: {},
    webkit: userAgent.match(/Web[kK]it[\/]{0,1}([\d.]+)/),
    android: userAgent.match(/(Android);?[\s\/]+([\d.]+)?/),
    ipad: userAgent.match(/(iPad).*OS\s([\d_]+)/),
    ipod: userAgent.match(/(iPod)(.*OS\s([\d_]+))?/),
    iphone: !this.ipad && userAgent.match(/(iPhone\sOS)\s([\d_]+)/),
    webos: userAgent.match(/(webOS|hpwOS)[\s\/]([\d.]+)/),
    touchpad: this.webos && userAgent.match(/TouchPad/),
    kindle: userAgent.match(/Kindle\/([\d.]+)/),
    silk: userAgent.match(/Silk\/([\d._]+)/),
    blackberry: userAgent.match(/(BlackBerry).*Version\/([\d.]+)/),
    bb10: userAgent.match(/(BB10).*Version\/([\d.]+)/),
    rimtabletos: userAgent.match(/(RIM\sTablet\sOS)\s([\d.]+)/),
    playbook: userAgent.match(/PlayBook/),
    chrome: userAgent.match(/Chrome\/([\d.]+)/) || userAgent.match(/CriOS\/([\d.]+)/),
    firefox: userAgent.match(/Firefox\/([\d.]+)/),
    safari: this.webkit && userAgent.match(/Mobile\//) && !this.chrome,
    webview: userAgent.match(/(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/) && !this.chrome,
    ie: userAgent.match(/MSIE\s([\d.]+)/),

    init: function()
    {
        if (this.browser.webkit = !!this.webkit)
        {
            this.browser.version = this.webkit[1]
        }

        if (this.android)
        {
            this.os.android = true;
            this.os.version = this.android[2];
        }
        if (this.iphone && !this.ipod)
        {
            this.os.ios = this.os.iphone = true;
            this.os.version = this.iphone[2].replace(/_/g, '.');
        }
        if (this.ipad)
        {
            this.os.ios = this.os.ipad = true;
            this.os.version = this.ipad[2].replace(/_/g, '.')
        }
        if (this.ipod)
        {
            this.os.ios = this.os.ipod = true;
            this.os.version = this.ipod[3] ? this.ipod[3].replace(/_/g, '.') : null;
        }
        if (this.webos)
        {
            this.os.webos = true;
            this.os.version = this.webos[2];
        }
        if (this.touchpad)
        {
            this.os.touchpad = true;
        }
        if (this.blackberry)
        {
            this.os.blackberry = true;
            this.os.version = this.blackberry[2];
        }
        if (this.bb10)
        {
            this.os.bb10 = true;
            this.os.version = this.bb10[2];
        }
        if (this.rimtabletos)
        {
            this.os.rimtabletos = true;
            this.os.version = this.rimtabletos[2];
        }
        if (this.playbook)
        {
            this.browser.playbook = true;
        }
        if (this.kindle)
        {
            this.os.kindle = true;
            this.os.version = this.kindle[1];
        }
        if (this.silk)
        {
            this.browser.silk = true;
            this.browser.version = this.silk[1];
        }
        if (!this.silk && this.os.android && userAgent.match(/Kindle Fire/))
        {
            this.browser.silk = true;
        }
        if (this.chrome)
        {
            this.browser.chrome = true;
            this.browser.version = this.chrome[1];
        }
        if (this.firefox)
        {
            this.browser.firefox = true;
            this.browser.version = this.firefox[1];
        }
        if (this.ie)
        {
            this.browser.ie = true;
            this.browser.version = this.ie[1];
        }
        if (this.safari && (userAgent.match(/Safari/) || !!this.os.ios))
        {
            this.browser.safari = true;
        }
        if (this.webview)
        {
            this.browser.webview = true;
        }
        if (this.ie)
        {
            this.browser.ie = true;
            this.browser.version = this.ie[1];
        }

        this.os.tablet = !!(this.ipad || this.playbook || (this.android && !userAgent.match(/Mobile/)) ||
            (this.firefox && userAgent.match(/Tablet/)) || (this.ie && !userAgent.match(/Phone/) && userAgent.match(/Touch/)))
        this.os.phone  = !!(!this.os.tablet && (this.os.ipod || this.android || this.iphone || this.webos || this.blackberry || this.bb10 ||
            (this.chrome && userAgent.match(/Android/)) || (this.chrome && userAgent.match(/CriOS\/([\d.]+)/)) ||
            (this.firefox && userAgent.match(/Mobile/)) || (this.ie && userAgent.match(/Touch/))))

        if (this.os.tablet)
        {
            $('html').addClass('tablet');
        }
        else if (this.os.phone)
        {
            $('html').addClass('phone');
        }
        else
        {
            $('html').addClass('desktop');
        }
    }
});

XenGallery.init();