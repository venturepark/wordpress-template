<?php
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$iee_options        = get_option( IEE_OPTIONS );
$eventbrite_options = isset( $iee_options ) ? $iee_options : array();
?>
<div class="iee_container">
	<div class="iee_row">
	
			<form method="post" id="iee_setting_form">                

			<h3 class="setting_bar"><?php esc_attr_e( 'Eventbrite Settings', 'import-eventbrite-events' ); ?></h3>
			<p><?php _e( 'You need a Eventbrite Private token to import your events from Eventbrite.', 'import-eventbrite-events' ); ?> </p>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<?php _e( 'Eventbrite Private token', 'import-eventbrite-events' ); ?> : 
						</th>
						<td>
							<input class="eventbrite_oauth_token" name="eventbrite[eventbrite_oauth_token]" type="text" value="<?php if ( isset( $eventbrite_options['eventbrite_oauth_token'] ) ) { echo $eventbrite_options['eventbrite_oauth_token']; } ?>" />
							<span class="xtei_small">
								<?php _e( 'Insert your eventbrite.com Private token you can get it from <a href="http://www.eventbrite.com/myaccount/apps/" target="_blank">here</a>.', 'import-eventbrite-events' ); ?>
							</span>
						</td>
					</tr>		
					<tr>
						<th scope="row">
							<?php _e( 'Display ticket option after event', 'import-eventbrite-events' ); ?> : 
						</th>
						<td>
							<?php
							$enable_ticket_sec = isset( $eventbrite_options['enable_ticket_sec'] ) ? $eventbrite_options['enable_ticket_sec'] : 'no';
							$ticket_model = isset( $eventbrite_options['ticket_model'] ) ? $eventbrite_options['ticket_model'] : '0';
							?>
							<input type="checkbox" class="enable_ticket_sec" name="eventbrite[enable_ticket_sec]" value="yes" <?php if ( $enable_ticket_sec == 'yes' ) { echo 'checked="checked"'; } ?> />
							<span class="xtei_small">
								<?php _e( 'Check to display ticket option after event.', 'import-eventbrite-events' ); ?>
							</span>
							<?php if(is_ssl()){ ?>
							<div class="iee_small checkout_model_option">
								<input type="radio" name="eventbrite[ticket_model]" value="0" <?php checked( $ticket_model, '0'); ?>>
									<?php _e( 'Non-Modal Checkout', 'import-eventbrite-events' ); ?><br/>
								<input type="radio" name="eventbrite[ticket_model]" value="1" <?php checked( $ticket_model, '1'); ?>>
									<?php _e( 'Popup Checkout Widget (Display your checkout as a modal popup)', 'import-eventbrite-events' ); ?><br/>
							</div>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<?php _e( 'Update existing events', 'import-eventbrite-events' ); ?> : 
						</th>
						<td>
							<?php
							$update_eventbrite_events = isset( $eventbrite_options['update_events'] ) ? $eventbrite_options['update_events'] : 'no';
							?>
							<input type="checkbox" name="eventbrite[update_events]" value="yes" <?php if ( $update_eventbrite_events == 'yes' ) { echo 'checked="checked"'; } ?> />
							<span class="xtei_small">
								<?php _e( 'Check to updates existing events.', 'import-eventbrite-events' ); ?>
							</span>
						</td>
					</tr>

					<tr>
						<th scope="row">
							<?php esc_attr_e( 'Accent Color', 'import-eventbrite-events' ); ?> :
						</th>
						<td>
						<?php
						$accent_color = isset( $eventbrite_options['accent_color'] ) ? $eventbrite_options['accent_color'] : '#039ED7';
						?>
						<input class="iee_color_field" type="text" name="eventbrite[accent_color]" value="<?php echo esc_attr( $accent_color ); ?>"/>
						<span class="iee_small">
							<?php esc_attr_e( 'Choose accent color for front-end event grid and event widget.', 'import-eventbrite-events' ); ?>
						</span>
						</td>
					</tr>

					<tr>
						<th scope="row">
							<?php _e( 'Direct link to Eventbrite', 'import-eventbrite-events' ); ?> : 
						</th>
						<td>
							<?php
							$direct_link = isset( $eventbrite_options['direct_link'] ) ? $eventbrite_options['direct_link'] : 'no';
							?>
							<input type="checkbox" name="eventbrite[direct_link]" value="yes" <?php if ( $direct_link == 'yes' ) { echo 'checked="checked"'; } if ( ! iee_is_pro() ) { echo 'disabled="disabled"'; } ?> />
							<span>
								<?php _e( 'Check to enable direct event link to eventbrite instead of event detail page.', 'import-eventbrite-events' ); ?>
							</span>
							<?php do_action( 'iee_render_pro_notice' ); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<?php _e( 'Advanced Synchronization', 'import-eventbrite-events' ); ?> : 
						</th>
						<td>
							<?php
							$advanced_sync = isset( $eventbrite_options['advanced_sync'] ) ? $eventbrite_options['advanced_sync'] : 'no';
							?>
							<input type="checkbox" name="eventbrite[advanced_sync]" value="yes" <?php if ( $advanced_sync == 'yes' ) { echo 'checked="checked"'; } if ( ! iee_is_pro() ) { echo 'disabled="disabled"'; } ?> />
							<span>
								<?php _e( 'Check to enable advanced synchronization, this will delete events which are removed from Eventbrite. Also, it deletes passed events.', 'import-eventbrite-events' ); ?>
							</span>
							<?php do_action( 'iee_render_pro_notice' ); ?>
						</td>
					</tr>

					<tr>
						<th scope="row">
							<?php _e( 'Import Private Events', 'import-eventbrite-events' ); ?> : 
						</th>
						<td>
							<?php
							$private_events = isset( $eventbrite_options['private_events'] ) ? $eventbrite_options['private_events'] : 'no';
							?>
							<input type="checkbox" name="eventbrite[private_events]" value="yes" <?php if ( $private_events == 'yes' ) { echo 'checked="checked"'; } if ( ! iee_is_pro() ) { echo 'disabled="disabled"'; } ?> />
							<span>
								<?php _e( 'Tick to import Private events, Untick to not import private event.', 'import-eventbrite-events' ); ?>
							</span>
							<?php do_action( 'iee_render_pro_notice' ); ?>
						</td>
					</tr>

					<tr>
                        <th scope="row">
                            <?php _e( "Don't Update these data.", "import-eventbrite-events" ); ?> : 
                        </th>
                        <td>
                            <?php
                            $eventbrite_options = isset($eventbrite_options['dont_update'])? $eventbrite_options['dont_update'] : array();
                            $sdontupdate = isset( $eventbrite_options['status'] ) ? $eventbrite_options['status'] : 'no';
                            $cdontupdate = isset( $eventbrite_options['category'] ) ? $eventbrite_options['category'] : 'no';
                            ?>
                            <input type="checkbox" name="eventbrite[dont_update][status]" value="yes" <?php checked( $sdontupdate, 'yes' ); disabled( iee_is_pro(), false );?> />
                            <span class="xtei_small">
                                <?php _e( 'Status ( Publish, Pending, Draft etc.. )', 'import-eventbrite-events' ); ?>
                            </span><br/>
                            <input type="checkbox" name="eventbrite[dont_update][category]" value="yes" <?php checked( $cdontupdate, 'yes' ); disabled( iee_is_pro(), false );?> />
                            <span class="xtei_small">
                                <?php _e( 'Event category', 'import-eventbrite-events' ); ?>
                            </span><br/>
                            <span class="iee_small">
                                <?php _e( "Select data which you don't want to update during existing events update. (This is applicable only if you have checked 'update existing events')", 'import-eventbrite-events' ); ?>
                            </span>
                            <?php do_action('iee_render_pro_notice'); ?>
                        </td>
                    </tr>

					<tr>
                        <th scope="row">
                            <?php _e('Event Slug', 'import-eventbrite-events'); ?> :
                        </th>
                        <td>
                            <?php
                            $event_slug = isset($eventbrite_options['event_slug']) ? $eventbrite_options['event_slug'] : 'eventbrite-event';
                            ?>
                            <input type="text" name="eventbrite[event_slug]" value="<?php if ( $event_slug ) { echo $event_slug; } ?>" <?php if (!iee_is_pro()) { echo 'disabled="disabled"'; } ?> />
                            <span class="iee_small">
                                <?php _e('Slug for the event.', 'import-eventbrite-events'); ?>
                            </span>
                            <?php do_action('iee_render_pro_notice'); ?>
                        </td>
                    </tr>

					<tr>
						<th scope="row">
							<?php esc_attr_e( 'Event Display Time Format', 'import-eventbrite-events' ); ?> :
						</th>
						<td>
						<?php
                        $time_format = isset( $eventbrite_options['time_format'] ) ? $eventbrite_options['time_format'] : '12hours';
						?>
                        <select name="eventbrite[time_format]">
							<option value="12hours" <?php selected('12hours', $time_format); ?>><?php esc_attr_e( '12 Hours', 'import-eventbrite-events' );  ?></option>
							<option value="24hours" <?php selected('24hours', $time_format); ?>><?php esc_attr_e( '24 Hours', 'import-eventbrite-events' ); ?></option>						
							<option value="wordpress_default" <?php selected('wordpress_default', $time_format); ?>><?php esc_attr_e( 'WordPress Default', 'import-eventbrite-events' ); ?></option>
                        </select>
						<span class="iee_small">
							<?php esc_attr_e( 'Choose event display time format for front-end.', 'import-eventbrite-events' ); ?>
						</span>
						</td>
					</tr>

					<?php do_action( 'iee_after_eventbrite_settings_section' ); ?> 

					<tr>
						<th scope="row">
							<?php _e( 'Disable Eventbrite Events', 'import-eventbrite-events' ); ?> : 
						</th>
						<td>
							<?php
							$deactive_ieevents = isset( $eventbrite_options['deactive_ieevents'] ) ? $eventbrite_options['deactive_ieevents'] : 'no';
							?>
							<input type="checkbox" name="eventbrite[deactive_ieevents]" value="yes" <?php if ( $deactive_ieevents == 'yes' ) {
								echo 'checked="checked"'; } ?> />
							<span>
								<?php _e( 'Check to disable inbuilt event management system.', 'import-eventbrite-events' ); ?>
							</span>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<?php _e( 'Delete Import Eventbrite Events data on Uninstall', 'import-eventbrite-events' ); ?> : 
						</th>
						<td>
							<?php
							$delete_ieedata = isset( $eventbrite_options['delete_ieedata'] ) ? $eventbrite_options['delete_ieedata'] : 'no';
							?>
							<input type="checkbox" name="eventbrite[delete_ieedata]" value="yes" <?php if ( $delete_ieedata == 'yes' ) { echo 'checked="checked"'; } ?> />
							<span>
								<?php _e( 'Delete Import Eventbrite Events data like settings, scheduled imports, import history on Uninstall', 'import-eventbrite-events' ); ?>
							</span>
						</td>
					</tr>
					<?php do_action( 'iee_after_settings_section' ); ?>
				</tbody>
			</table>
			<br/>

			<div class="iee_element">
				<input type="hidden" name="iee_action" value="iee_save_settings" />
				<?php wp_nonce_field( 'iee_setting_form_nonce_action', 'iee_setting_form_nonce' ); ?>
				<input type="submit" class="button-primary xtei_submit_button" style=""  value="<?php esc_attr_e( 'Save Settings', 'import-eventbrite-events' ); ?>" />
			</div>
			</form>
	</div>
</div>
