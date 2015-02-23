(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.ContentBlocksButton = function (dom, data) {
        var input = {};
        
        input.init = function() {
            // console.log(dom);
            ContentBlocks.initializeLinkField(dom.find('input[id].linkfield'), data);
        }

        input.getData = function () {
            var $link = $(dom.find('input[id].linkfield'));
            var $label = $(dom.find('.contentblocks-field-text-input input'));
            return {
                link: $link.val(),
                linkType: ContentBlocks.getLinkFieldDataType($link.val()),
                label: $label.val()
            };
        };

        return input;
    }
})(vcJquery, ContentBlocks);
