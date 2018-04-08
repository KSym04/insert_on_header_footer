// enhance our editor
var iohfEditor;
jQuery('.iohf-textarea').each(function( index ) {
	iohfEditor = ace.edit(this);
	iohfEditor.setTheme("ace/theme/twilight");
	iohfEditor.session.setMode("ace/mode/html");
	iohfEditor.setFontSize(14);
	iohfEditor.renderer.setScrollMargin(15, 20);
});
