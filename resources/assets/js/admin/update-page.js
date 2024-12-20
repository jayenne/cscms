window.addEventListener('DOMContentLoaded', function() {
    function convertToSlug(str) {
        return str.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g,
            '');
    }
    $(document).ready(function() {
        
        var $delay_success = parseInt($(
            'meta[name="notify-delay-success"]').attr(
            'content'));
        var $delay_failure = parseInt($(
            'meta[name="notify-delay-failure"]').attr(
            'content'));
        // MODAL TOOLTIPS
        $('[rel="tooltip"]').tooltip({trigger: "hover"});
        
        // SLUG MANAGEMENT
        $title = $('#title');
        $slug = $('#slug');
        $slugUpdatable = false;
        $title.keyup(function() {
            $tval = $title.val();
            $sval = $slug.val();
            $dval = $slug.data('slug');
            if ($sval == '' || $sval == '' ||
                $slugUpdatable == true) {
                $slugUpdatable = true;
                $val = $(this).val();
                $val = convertToSlug($val);
                $slug.val($val);
            }
        });
        // TAG MANAGER
        //Single instance of tag inputs - can be initiated with simply using data-role="tagsinput" attribute in any input field
        if ($('.custom-tag-input').length > 0) {
            $('.custom-tag-input').tagsinput();
        };
        // BS POPOVERS   
        $('[data-rel=popover]').popover({
            html: true,
            trigger: "hover"
        });
        // BLOCK SORTABLES
        $(function() {
            $("#gridContainer.sortable").sortable({
                placeholder: "sortable-placeholder",
                forcePlaceholderSize: true,
                start: function(e, ui) {
                    ui.placeholder.height(
                        ui.item.height()
                    );
                },
                update: function(event, ui) {
                    $this = $(ui.item);
                    var index = ui.item.index();
                    var items = $this.parent(
                        'ul').children();
                    $(items).each(function(
                        i, el) {
                        $order = $(
                                el)
                            .find(
                                'input[name*="block_order"]'
                            );
                        $old =
                            $order.val();
                        $order.val(
                            i);
                        if ($old !=
                            i) {
                            $(el).find(
                                '.updated.block-moved'
                            ).show(
                                250
                            );
                        }
                    });
                }
            });
        });
        
        // MODAL SUBMIT
        $('[data-form]').click(function(e) {
            $this = $(this);
            var $id = '#' + $this.attr('data-form');
            var $action = $this.attr('href');
            var $header = $this.attr(
                'data-modal-header');
            var $body = $this.attr('data-modal-body');
            var $modal = $($this.attr('data-target'));
            // CONFIG MODAL
            $modal.find('.modal-header').text($header);
            $modal.find('.modal-body').text($body);
            // CONFIG FORM
            $($id).attr('action', $action);
        });
        
        // SUBMIT BY MODAL ACCEPTANCE
        $('.modal #submit').click(function() {
            $this = $(this);
            $('#form_delete').submit();
        });
        
        // DELETE BLOCK ITEM
        $(document).on("click", ".delete-block-item", function(e) {
            e.preventDefault();
            $item = $(this).closest('[data-uid]');
            $item.slideUp('slow', function() {
                $target = $item.data('uid');
                $item.remove();
                $el = $('#editpage').find(
                    '[data-uid="' + $target +
                    '"]');
                $el.remove();
                isUpdated(true);
            });
        })
        
        // ADD NEW BLOCK
        function format(option) {
            var $icon = $(option.element).attr('icon');
            return '<img class="col-6 mr-1" src="' + $icon +
                '" />' + option.text;
        };
        
        $("#block_create_ids").select2({
            placeholder: 'Add a block',
            allowClear: true,
            templateResult: format,
            templateSelection: function(option) {
                return option.text;
            },
            escapeMarkup: function(m) {
                return m;
            }
        });
        
        // REVERT BLOCK
        $(document).on("click", ".revert-block", function(e) { //user click on remove text
            e.preventDefault();
            $this = $(this);
            $block = $this.closest('[data-block-id]');
            $id = $block.data('block-id');
            $form = $($block).closest('form');
            $status = $block.find('.block-status');
            $ctext = $status.text();
            $ttext = $status.attr('data-toggletext');
            if ($status.hasClass('badge-danger')) {
                $this.find('.fa-redo').removeClass(
                    'fa-redo').addClass('fa-undo');
                $status.removeClass(
                    'badge-danger text-white').text(
                    $ttext).attr('data-toggletext',
                    $ctext);
                $form.find(
                    'input[name="block_revert_ids[]"][value="' +
                    $id + '"]').remove();
            } else {
                $this.find('.fa-undo').removeClass(
                    'fa-undo').addClass('fa-redo');
                $status.addClass(
                    'badge-danger text-white').text(
                    $ttext).attr('data-toggletext',
                    $ctext);
                $form.append(
                    '<input type="hidden" name="block_revert_ids[]" value="' +
                    $id + '">');
            }
            isUpdated(true);
        })
        
        // DELETE BLOCK
        $(document).on("click", ".delete-block", function(e) { //user click on remove text
            e.preventDefault();
            $block = $(this).closest('[data-block-id]');
            $block_grid = $block.closest(
                '[data-grid-item]');
            $id = $block.data('block-id');
            $form = $($block).closest('form');
            $block.slideUp('slow', function() {
                $form.append(
                    '<input type="hidden" name="block_delete_ids[]" value="' +
                    $id + '">');
                $block.remove();
                isUpdated(true);
            });
        })
        
        // CREATE BLOCK
        $(function() {
            $('#block_create_ids').on("select2:select",
                function(e) {
                    e.preventDefault(e);
                    var $data = {};
                    $data['page_id'] = $(this).data(
                        'page-id');
                    $data['block_lid'] = $(this).val();
                    $target = $(this).data(
                        'target-form');
                    $form = $($target);
                    $url = '/api-getblocktemplate';
                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $(
                                'meta[name="csrf-token"]'
                            ).attr(
                                'content'
                            )
                        },
                        url: $url,
                        data: $data,
                        dataType: 'json',
                        success: function(
                            data) {
                            $delay =
                                $delay_success;
                            $msg = data
                                .status;
                            $.notify({
                                icon: 'fas fa-thumbs-up',
                                title: 'Update status: ',
                                message: $msg
                            }, {
                                placement: {
                                    from: 'top',
                                    align: 'center'
                                },
                                delay: $delay,
                                allow_dismiss: true,
                                type: 'success'
                            });
                            if (data.html) {
                                $el = $(
                                    JSON
                                    .parse(
                                        data
                                        .html
                                    )
                                );
                                // append to form
                                $form.find(
                                    '#gridContainer'
                                ).append(
                                    $el
                                );
                                $litems
                                    =
                                    $form
                                    .find(
                                        'input[name*=block-order]'
                                    );
                                $litems
                                    .each(
                                        function(
                                            index
                                        ) {
                                            $this
                                                =
                                                $(
                                                    this
                                                );
                                            $this
                                                .val(
                                                    index
                                                );
                                        }
                                    );
                                isUpdated
                                    (
                                        true
                                    );
                            }
                        },
                        error: function(xhr,
                            status,
                            error) {
                            err = JSON.parse(
                                xhr
                                .responseText
                            );
                            $delay =
                                parseInt(
                                    $(
                                        'meta[name="notification_duration_error"]'
                                    ).attr(
                                        'content'
                                    ));
                            $.notify({
                                icon: 'fas fa-exclamation-triangle',
                                title: 'ERROR: (' +
                                    xhr
                                    .status +
                                    ')',
                                message: '<br/><br/>' +
                                    err
                                    .message +
                                    '<br/><br/>Please email this error message to your webmaster.'
                            }, {
                                placement: {
                                    from: 'top',
                                    align: 'center'
                                },
                                delay: 0,
                                allow_dismiss: true,
                                type: 'danger'
                            });
                        }
                    });
                    // clear "add block" selector
                    $('#block_create_ids').val(null)
                        .trigger('change');
                });
        });
        
        // UPDATE BLOCK
        $(function() {
            $('#blockModal').on('show.bs.modal',
                function(e) {
                    console.log('here');
                    var $button = $(e.relatedTarget)
                    var $modal = $(this)
                    var $contentid = $button.data(
                        'modal-contents')
                    var $contents = $($contentid).html()
                    var $attributesid = $button.data(
                        'modal-attributes')
                    var $attributes = $(
                        $attributesid).html()
                    var $layoutid = $button.data(
                        'modal-layout')
                    var $layout = $($layoutid).html()
                    var $publishingid = $button.data(
                        'modal-publishing')
                    var $publishing = $(
                        $publishingid).html()
                    var $blockid = $button.data(
                        'modal-block-id')
                    $modal.attr('data-block-id',
                        $blockid)
                    $t = $modal.find('.modal-title')
                        .text($button.data(
                            'modal-title'))
                    $i = $modal.find(
                        '.bg-block-icon').css({
                        'background-image': 'url("' +
                            $button.data(
                                'modal-icon'
                            ) + '")'
                    })
                    $n = $modal.find('.block-name')
                        .text($button.data(
                            'modal-block-name'))
                    $c = $modal.find(
                        '#tabBlockContents').html(
                        $contents)
                    $a = $modal.find(
                        '#tabBlockAttributes').html(
                        $attributes)
                    $l = $modal.find(
                        '#tabBlockLayout').html(
                        $layout)
                    $p = $modal.find(
                        '#tabBlockPublishing').html(
                        $publishing)
                    // BIND PUBLISH BUTTON
                    $plp = $modal.find(
                        '#pushlive-proxy');
                    $($plp).change(function(e) {
                        $plpv = $plp.prop(
                            'checked');
                        $pl = $modal.find(
                            '#pushlive'
                        );
                        $pl.prop('checked',
                            $plpv);
                    });
                    //$($obj).attr('checked', $this.prop('checked') );
                    // MODAL BLOCK ITEMS SORTABLE
                    $('#tabBlockContents .sortable')
                        .sortable({
                            placeholder: "sortable-placeholder",
                            forcePlaceholderSize: true,
                            start: function(e,
                                ui) {
                                ui.placeholder
                                    .height(
                                        ui.item
                                        .height()
                                    );
                            },
                            update: function(
                                event, ui) {
                                $this = $(
                                    ui.item
                                );
                                var $parent =
                                    $this.parent(
                                        'ul'
                                    );
                                var $items =
                                    $parent
                                    .children();
                                $($items).each(
                                    function(
                                        i,
                                        el
                                    ) {
                                        $mitem
                                            =
                                            $(
                                                this
                                            )
                                            .attr(
                                                'data-uid'
                                            );
                                        $pitem
                                            =
                                            $(
                                                '#gridContainer'
                                            )
                                            .find(
                                                'li[data-uid="' +
                                                $mitem +
                                                '"]'
                                            );
                                        $pitem
                                            .parent()
                                            .append(
                                                $pitem
                                            );
                                    });
                                isUpdated(
                                    true
                                );
                            }
                        });
                    // DETECT CHANGES WITHIN MODAL AND COPY TO BLOCK
                    $('.modal :input').not(
                        '#pushliveproxy').change(
                        function(e) {
                            $this = $(this);
                            $id = $this.attr(
                                'name')
                            $val = $this.val()
                            $obj = $(
                                '.grid-item [name="' +
                                $id + '"]')
                            // REFLECT CHANGES TO BLOCK
                            $attr = $id.replace(
                                    /\[|\]/g,
                                    ' ').replace(
                                    /\s\s+/g,
                                    ' ').trim()
                                .split(' ').pop();
                            $block = $(
                                '[data-grid-item="' +
                                $blockid +
                                '"]');
                            switch ($attr) {
                                case "columns":
                                    $block.attr(
                                        'class',
                                        'grid-item col-' +
                                        $val
                                    );
                                    $blockbadge
                                        = $(
                                            '.grid-item'
                                        ).find(
                                            '[data-block-id="' +
                                            $blockid +
                                            '"] .block-resized.badge'
                                        )
                                    $blockbadge
                                        .fadeIn(
                                            500
                                        )
                                    break;
                                default:
                                    $blockbadge
                                        = $(
                                            '.grid-item'
                                        ).find(
                                            '[data-block-id="' +
                                            $blockid +
                                            '"] .block-edited.badge'
                                        )
                                    $blockbadge
                                        .fadeIn(
                                            500
                                        )
                            }
                            // GET FIELD TYPE
                            if ($this.is(
                                    ':checkbox'
                                )) {
                                $type =
                                    "checkbox";
                            } else if ($this.is(
                                    "input")) {
                                $type = "input";
                            } else if ($this.is(
                                    "select")) {
                                $type =
                                    "select";
                            } else if ($this.is(
                                    "textarea")) {
                                $type =
                                    "textarea";
                            } else if ($this.is(
                                    "hidden")) {
                                $type = "input";
                            } else {
                                $type =
                                    "unknown";
                            }
                            switch ($type) {
                                case "input":
                                    $($obj).val(
                                        $val
                                    );
                                    break;
                                case "select":
                                    $($obj).val(
                                        $val
                                    );
                                    break
                                case "textarea":
                                    $($obj).text(
                                        $val
                                    );
                                    break;
                                case "checkbox":
                                    $($obj).attr(
                                        'checked',
                                        $this
                                        .prop(
                                            'checked'
                                        ));
                                    $this.attr(
                                        'checked',
                                        $this
                                        .prop(
                                            'checked'
                                        ));
                                    $this.val(
                                        $this
                                        .prop(
                                            'checked'
                                        ) ?
                                        1 :
                                        0);
                                    break;
                                default:
                                    ;
                            }
                            // SET BLOCK AS EDITED								
                            $block.find(
                                '[name*="block_published"]'
                            ).val(0);
                            // ADD EDITED TO BLOCK TITLE								
                            isUpdated(true);
                        });
                })
            $('#blockModal').on('hide.bs.modal',
                function(e) {
                    var $modal = $(this)
                    //clear modal
                    $modal.find('#tabBlockContents')
                        .empty();
                    $modal.find(
                        '#tabBlockAttributes').empty();
                })
            // SUBMIT UPDATES
            $('button.ajaxsubmit').on('click', function(
                e) {
                $target = $(this).data(
                    'targetform');
                $form = $($target);
                $url = $form.attr('action');
                $.ajax({
                    type: "POST",
                    url: $url,
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function(
                        data) {
                        $delay =
                            $delay_success;
                        $msg = data
                            .status;
                        $id = data.id;
                        $view =
                            data.view;
                        //prevent default editability of slug
                        $slugUpdatable
                            = false;
                        // CREATED NEW PAGE
                        if (typeof(
                                data
                                .view
                            ) !==
                            'undefined' &&
                            data.view !==
                            null) {
                            window.location
                                .replace(
                                    data
                                    .view
                                );
                        }
                        $.notify({
                            icon: 'fas fa-thumbs-up',
                            title: 'Update status: ',
                            message: $msg
                        }, {
                            placement: {
                                from: 'top',
                                align: 'center'
                            },
                            delay: $delay,
                            allow_dismiss: true,
                            type: 'success'
                        });
                    },
                    error: function(xhr,
                        status,
                        error) {
                        err = JSON.parse(
                            xhr
                            .responseText
                        );
                        $delay =
                            $delay_success;
                        $.notify({
                            icon: 'fas fa-exclamation-triangle',
                            title: 'ERROR: (' +
                                xhr
                                .status +
                                ')',
                            message: '<br/><br/>' +
                                err
                                .message +
                                '<br/><br/>Please email this error message to your webmaster.'
                        }, {
                            placement: {
                                from: 'top',
                                align: 'center'
                            },
                            delay: $delay,
                            allow_dismiss: true,
                            type: 'danger'
                        });
                    }
                });
                isUpdated(false);
            });
        });
        // PUBLISHED AT DATETIME PICKER
        $('[date-datepicker]').datetimepicker({
            allowInputToggle: true,
            showClear: true,
            format: 'DD/MM/YY HH:mm'
        });
    });
});