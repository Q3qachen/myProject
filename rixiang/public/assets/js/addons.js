define([], function () {
    require.config({
    paths: {
        'jquery-colorpicker': '../addons/cms/js/jquery.colorpicker.min',
        'jquery-autocomplete': '../addons/cms/js/jquery.autocomplete',
        'jquery-tagsinput': '../addons/cms/js/jquery.tagsinput',
        'clipboard': '../addons/cms/js/clipboard.min',
    },
    shim: {
        'jquery-colorpicker': {
            deps: ['jquery'],
            exports: '$.fn.extend'
        },
        'jquery-autocomplete': {
            deps: ['jquery'],
            exports: '$.fn.extend'
        },
        'jquery-tagsinput': {
            deps: ['jquery', 'jquery-autocomplete', 'css!../addons/cms/css/jquery.tagsinput.min.css'],
            exports: '$.fn.extend'
        }
    }
});
if (Config.modulename === 'admin') {
    require(['table'], function (Table) {
        Fast.api.getCustomFields = function (fields, table) {
            var result = [];
            $.each(fields, function (i, j) {
                if (j.type === 'editor') {
                    return true;
                }
                var param = {field: j.field, title: j.title, table: table, operate: (j.type === 'number' ? '=' : 'like'), formatter: Table.api.formatter.content, class: 'autocontent'};
                //如果是图片,加上formatter
                if (j.type === 'image' || j.type === 'images') {
                    param.events = Table.api.events.image;
                    param.formatter = Table.api.formatter.images;
                } else if (j.type === 'file' || j.type === 'files') {
                    param.formatter = Table.api.formatter.files;
                } else if (j.type === 'radio' || j.type === 'checkbox' || j.type === 'select' || j.type === 'selects') {
                    param.formatter = Table.api.formatter.label;
                    param.extend = j.content;
                    param.searchList = j.content;
                } else {
                    param.formatter = Table.api.formatter.content;
                    param.classname = 'autocontent';
                }
                result.push(param);
            });
            return result;
        };
    });
}
require.config({
    paths: {
        'summernote': '../addons/summernote/lang/summernote-zh-CN.min'
    },
    shim: {
        'summernote': ['../addons/summernote/js/summernote.min', 'css!../addons/summernote/css/summernote.min.css'],
    }
});
require(['form', 'upload'], function (Form, Upload) {
    var _bindevent = Form.events.bindevent;
    Form.events.bindevent = function (form) {
        _bindevent.apply(this, [form]);
        try {
            //绑定summernote事件
            if ($(Config.summernote.classname || '.editor', form).length > 0) {
                var selectUrl = typeof Config !== 'undefined' && Config.modulename === 'index' ? 'user/attachment' : 'general/attachment/select';
                require(['summernote'], function () {
                    var imageButton = function (context) {
                        var ui = $.summernote.ui;
                        var button = ui.button({
                            contents: '<i class="fa fa-file-image-o"/>',
                            tooltip: __('Choose'),
                            click: function () {
                                parent.Fast.api.open(selectUrl + "?element_id=&multiple=true&mimetype=image/", __('Choose'), {
                                    callback: function (data) {
                                        var urlArr = data.url.split(/\,/);
                                        $.each(urlArr, function () {
                                            var url = Fast.api.cdnurl(this, true);
                                            context.invoke('editor.insertImage', url);
                                        });
                                    }
                                });
                                return false;
                            }
                        });
                        return button.render();
                    };
                    var attachmentButton = function (context) {
                        var ui = $.summernote.ui;
                        var button = ui.button({
                            contents: '<i class="fa fa-file"/>',
                            tooltip: __('Choose'),
                            click: function () {
                                parent.Fast.api.open(selectUrl + "?element_id=&multiple=true&mimetype=*", __('Choose'), {
                                    callback: function (data) {
                                        var urlArr = data.url.split(/\,/);
                                        $.each(urlArr, function () {
                                            var url = Fast.api.cdnurl(this, true);
                                            var node = $("<a href='" + url + "'>" + url + "</a>");
                                            context.invoke('insertNode', node[0]);
                                        });
                                    }
                                });
                                return false;
                            }
                        });
                        return button.render();
                    };

                    $(Config.summernote.classname || '.editor', form).each(function () {
                        $(this).summernote($.extend(true, {}, {
                            height: isNaN(Config.summernote.height) ? null : parseInt(Config.summernote.height),
                            minHeight: parseInt(Config.summernote.minHeight || 250),
                            toolbar: Config.summernote.toolbar,
                            followingToolbar: parseInt(Config.summernote.followingToolbar),
                            placeholder: Config.summernote.placeholder || '',
                            airMode: parseInt(Config.summernote.airMode) || false,
                            lang: 'zh-CN',
                            fontNames: [
                                'Arial', 'Arial Black', 'Serif', 'Sans', 'Courier',
                                'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande',
                                "Open Sans", "Hiragino Sans GB", "Microsoft YaHei",
                                '微软雅黑', '宋体', '黑体', '仿宋', '楷体', '幼圆',
                            ],
                            fontNamesIgnoreCheck: [
                                "Open Sans", "Microsoft YaHei",
                                '微软雅黑', '宋体', '黑体', '仿宋', '楷体', '幼圆'
                            ],
                            buttons: {
                                image: imageButton,
                                attachment: attachmentButton,
                            },
                            dialogsInBody: true,
                            callbacks: {
                                onChange: function (contents) {
                                    $(this).val(contents);
                                    $(this).trigger('change');
                                },
                                onInit: function () {
                                },
                                onImageUpload: function (files) {
                                    var that = this;
                                    //依次上传图片
                                    for (var i = 0; i < files.length; i++) {
                                        Upload.api.send(files[i], function (data) {
                                            var url = Fast.api.cdnurl(data.url, true);
                                            $(that).summernote("insertImage", url, 'filename');
                                        });
                                    }
                                }
                            }
                        }, $(this).data("summernote-options") || {}));
                    });
                });
            }
        } catch (e) {

        }

    };
});

});