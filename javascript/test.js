jQuery.entwine('ss', function ($) {
    $('.robbie').entwine({
        getDialogWrapper: function() {
            return $('#insert-link__dialog-wrapper--internal');
        },

        onmatch: function() {
            var dialog = this.getDialogWrapper();

            if (!dialog.length) {
                dialog = $('<div id="insert-link__dialog-wrapper--internal" />');
                $('body').append(dialog);
                console.log('appended');
            }
            dialog.addClass('insert-link__dialog-wrapper');
        },

        onclick: function() {
            console.log('clicked');
            this.getDialogWrapper()
                .addClass('insert-link__dialog-wrapper--no-tinymce')
                .renderModal(true);

            // Remove class again to prevent conflicts with TinyMCE use in the same page
            this.getDialogWrapper()
                .removeClass('insert-link__dialog-wrapper--no-tinymce');
        }
    });

    $('#insert-link__dialog-wrapper--internal').entwine({
        getOriginalAttributes: function () {
            if (this.hasClass('insert-link__dialog-wrapper--no-tinymce')) {
                // no op
                console.log('no');
                return {};
            }
            console.log('yes');
            // return this._super();
        }
    });
});
