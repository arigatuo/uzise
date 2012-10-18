/*
*base javascript helper
 */
if (!Array.prototype.indexOf) Array.prototype.indexOf = function(item, i) {
    i || (i = 0);
    var length = this.length;
    if (i < 0) i = length + i;
    for (; i < length; i++)
        if (this[i] === item) return i;
    return -1;
};

String.prototype.Trim = function() {
    var m = this.match(/^\s*(\S+(\s+\S+)*)\s*$/);
    return (m == null) ? "" : m[1];
}

String.prototype.isEmail = function(){
    return this.Trim().length > 6 && /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/.test(this.Trim());
}

String.prototype.isMobile = function() {
    return (/^(?:13\d|15\d|18\d)-?\d{5}(\d{3}|\*{3})$/.test(this.Trim()));
}

String.prototype.isTel = function() {
    return (/^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/.test(this.Trim()));
}

String.prototype.isChinese = function(){
    var pattern = /[^\u4E00-\u9FA5]/;
    return !pattern.test(this) && (this.Trim().length > 0);
}
