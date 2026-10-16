// KANBOARD PLUGIN ASSET FILE
// Interactive behaviour is covered by tests/PresentationCompatibilityTest.php.

(function ($) {
    'use strict';

    // Toggle data-sensitive text visibility for screenshots and expose the state to assistive technology.
    $(document).on('click', '.data-btn', function () {
        var button = $(this);
        var dataIsHidden = button.attr('aria-pressed') !== 'true';

        $('.privacy').toggleClass('privacy-data', dataIsHidden);
        $('.privacy-delete').toggleClass('privacy-none', dataIsHidden);
        button.attr('aria-pressed', dataIsHidden ? 'true' : 'false');
        button.find('.data-btn-label').text(
            dataIsHidden ? button.data('show-label') : button.data('hide-label')
        );
    });

    // Destructive log deletion receives a final confirmation without changing the POST and CSRF boundary.
    $(document).on('submit', 'form[data-confirm-message]', function (event) {
        if (!window.confirm($(this).data('confirm-message'))) {
            event.preventDefault();
        }
    });
}(jQuery));
