<?php
/**
 * Insert on Header & Footer Admin Panel
 * @since 1.0.0
 */

if ( ! defined( 'ABS_PATH' ) ) {
	exit;
}
?>
<h2 class="render-title">
	<?php _e( 'Insert on Header & Footer', 'insert_on_header_footer' ); ?>
</h2>

<form id="insert_on_header_footer-form" action="<?php echo osc_admin_render_plugin_url( 'insert_on_header_footer/admin.php' ); ?>" method="post">

    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label">
                    <h3><?php _e( 'Header Code', 'insert_on_header_footer' ); ?></h3>
                </div>
                <div class="form-controls iohf-code-editor">
					<div id="iohf-textarea-header"></div>
                    <textarea id="header-code" name="header_code"><?php echo osc_get_preference( 'header_code', 'plugin-insert_on_header_footer' ); ?></textarea>
                    <p class="iohf-helpinfo"><?php _e( 'Note: The above code will be inserted inside `&lt;head&gt;` tag.', 'insert_on_header_footer' ); ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">
                    <h3><?php _e( 'Footer Code', 'insert_on_header_footer' ); ?></h3>
                </div>
                <div class="form-controls iohf-code-editor">
					<div id="iohf-textarea-footer"></div>
                    <textarea id="footer-code" name="footer_code"><?php echo osc_get_preference( 'footer_code', 'plugin-insert_on_header_footer' ); ?></textarea>
                    <p class="iohf-helpinfo"><?php _e( 'Note: The above code will be inserted before closing `&lt;/body&gt;` tag.', 'insert_on_header_footer' ); ?></p>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" value="<?php _e( 'Save', 'insert_on_header_footer' ); ?>" id="iohf-save-button" class="btn btn-submit" />
            </div>
        </div>
    </fieldset>

	<input type="hidden" name="option" value="settings_saved" />
</form>
