<div class="contentblocks-field contentblocks-field-link">
    <div class="contentblocks-field-actions"></div>

    <label for="{%=o.generated_id%}_link">{%=o.name%}</label>
    <label for="{%=o.generated_id%}_link">Target</label>
    <div class="contentblocks-field-text contentblocks-field-link-input">
        <input type="text" id="{%=o.generated_id%}_linkfield" class="linkfield" value="{%#o.link%}" data-link-type="{%=o.linkType%}">
    </div>
</div>
<div class="contentblocks-field contentblocks-field-text">
    <div class="contentblocks-field-actions"></div>

    <label for="{%=o.generated_id%}_textfield">Label</label>
    <div class="contentblocks-field-text contentblocks-field-text-input">
        <input type="text" id="{%=o.generated_id%}_textfield" value="{%=o.label%}">
    </div>
</div>