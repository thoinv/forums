/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
    XenForo.SortableList = function($column)
    {
        $column.sortable({
            opacity: 0.6,
            connectWith: ".sortableList",
            cursor: "move",
            distance: 10,
            items: "li.item:not(.sortDisabled)",
            /*placeholder: "item-placeholder",*/
            revert: "true",
            tolerance: "pointer",
            update : function () {
                var itemCount = 1;
                $('input.order').each(function() {
                    $(this).val( itemCount );
                    itemCount++;
                });
            }
        });
        /*  TODO add auto save in update clause. */
        $column.disableSelection();
    };

    // *********************************************************************

    XenForo.register('.sortableList', 'XenForo.SortableList');
}
(jQuery, this, document);