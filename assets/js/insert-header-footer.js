// handles saving for header
var iohfEditorHeader = ace.edit('iohf-textarea-header');
iohfEditorHeader.setTheme("ace/theme/twilight");
iohfEditorHeader.session.setMode("ace/mode/html");
iohfEditorHeader.setFontSize(14);
iohfEditorHeader.renderer.setScrollMargin(15, 20);

var textareaHeader = jQuery('#header-code').hide();
iohfEditorHeader.getSession().setValue(textareaHeader.val());
iohfEditorHeader.getSession().on('change', function(){
	textareaHeader.val(iohfEditorHeader.getSession().getValue());
});

// handles saving for footer
var iohfEditorFooter = ace.edit('iohf-textarea-footer');
iohfEditorFooter.setTheme("ace/theme/twilight");
iohfEditorFooter.session.setMode("ace/mode/html");
iohfEditorFooter.setFontSize(14);
iohfEditorFooter.renderer.setScrollMargin(15, 20);

var textareaFooter = jQuery('#footer-code').hide();
iohfEditorFooter.getSession().setValue(textareaFooter.val());
iohfEditorFooter.getSession().on('change', function(){
  textareaFooter.val(iohfEditorFooter.getSession().getValue());
});
