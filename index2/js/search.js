/**
 * Created by yym on 2017/4/19.
 */
$(function () {

    var $placeholder = $('.wrapper input[placeholder]');

    if ($placeholder.length > 0) {

        var attrPh = $placeholder.attr('placeholder');

        $placeholder.attr('value', attrPh)
            .bind('focus', function () {

                var $this = $(this);

                if ($this.val() === attrPh)
                    $this.val('').css('color', '#171207');

            }).bind('blur', function () {

            var $this = $(this);

            if ($this.val() === '')
                $this.val(attrPh).css('color', '#333');

        });

    }

});