<?php 
/*
Plugin Name: Site at Glance
Plugin URI: http://wordpress.org/extend/plugins/site-at-glance/
Description: Show site basic stuff useful to take a glimpse of site in one go.
Author: 24x7 Security Advisors
Version: 1.0
Author URI: https://nate512.wixsite.com/wpfixxyz
*/





function wporg_add_dashboard_widgets() {
    wp_add_dashboard_widget(
        'wporg_dashboard_widget',                          // Widget slug.
        esc_html__( 'Site at Glance', 'wporg' ), // Title.
        'wporg_dashboard_widget_render'                    // Display function.
    ); 
}
add_action( 'wp_dashboard_setup', 'wporg_add_dashboard_widgets' );
 
/**
 * Create the function to output the content of our Dashboard Widget.
 */
function wporg_dashboard_widget_render() {
    // Display whatever you want to show.
   ?>
   		<table border="1">
   			<thead>
   			
   			</thead>
   			<tbody>
   				<?php $favicon = wp_get_attachment_image_src(get_option('site_icon')) ;

   						$favcon = get_option('site_icon') == '' ? '' :$favicon[0];
   				?>
   				<tr><td>Site Favicon</td> <td><img height="25" src="<?php echo  $favcon ;  ?>" /></td> </tr>

   				<tr><td>Site URL</td> <td><?php echo site_url(); ?></td> </tr>
   				<tr><td>Home URL</td> <td><?php echo home_url(); ?></td> </tr>
   				<tr><td>Active Stylesheet</td> <td><?php echo get_option('stylesheet'); ?></td> </tr>
   				<tr><td>Stylesheet Dir</td> <td><?php echo get_stylesheet_directory(); ?></td> </tr>
   				<tr><td>Stylesheet URI</td> <td><?php echo get_stylesheet_directory_uri(); ?></td> </tr>
   				

   				<tr><td>Active Template</td> <td><?php echo get_option('template'); ?></td> </tr>
   				<tr><td>Template Dir</td> <td><?php echo get_template_directory(); ?></td> </tr>
   				<tr><td>Active Template</td> <td><?php echo get_template_directory_uri(); ?></td> </tr>
   				



   				<tr><td>No of Active Plugins</td> <td><?php echo count(get_option('active_plugins')); ?></td> </tr>

   				<tr><td>No of Registered Users</td> <td><?php $usercount = count_users(); echo $usercount['total_users'];   ?></td> </tr>
   				<?php

   					$user  = wp_get_current_user();
 					$roles = ( array ) $user->roles;
 					$rolsstr= implode(',', $roles)
   				?>
   				
   				<tr><td>Uploads Directory</td> <td><?php  echo wp_upload_dir()['basedir'];   ?></td> </tr>
   				<tr><td>Current User Role</td> <td><?php  echo $rolsstr;   ?></td> </tr>
   				<tr><td>Admin Email</td> <td><?php echo get_option('admin_email') ;   ?></td> </tr>
   				
   				<tr><td>Site Name</td> <td><?php echo get_option('blogname');   ?></td> </tr>
   				<tr><td>Site description</td> <td><?php echo get_option('blogdescription');   ?></td> </tr>
   				<tr><td>Anyone can register</td> <td><?php echo $case =  get_option('users_can_register') == 0 ? 'No':'Yes' ;   ?></td> </tr>
   				<tr><td>Blog Charset</td><td><?php  echo get_option('blog_charset');?></td></tr>
   				
   				<tr><td>Date Format</td> <td><?php echo get_option('date_format') .' ->'.date(get_option('date_format')) ;   ?></td> </tr>
   				<tr><td>Time Format</td> <td><?php echo get_option('time_format') .' ->'.date(get_option('time_format')) ;   ?></td> </tr>
   				

   			  <tr><td>Database Name</td> <td><?php echo  DB_NAME ;  ?></td> </tr>
   				<tr><td>Database User</td> <td><?php echo  DB_USER ;  ?></td> </tr>
   				<tr><td>Database Pass</td> <td><?php echo  DB_PASSWORD ;  ?></td> </tr>
   				<tr><td>Database Host</td> <td><?php echo  DB_HOST ;  ?></td> </tr>
   				<tr><td>Table Prefix</td> <td><?php global $wpdb;  echo $wpdb->prefix ;  ?></td> </tr>

          <tr>
            <td>HTTP_CLIENT_IP</td> <td><?php echo getenv('HTTP_CLIENT_IP')  ?></td> 
          </tr>

          <tr>
            <td>HTTP_X_FORWARDED_FOR</td> <td><?php echo getenv('HTTP_X_FORWARDED_FOR')  ?></td> 
          </tr>
          <tr>
            <td> HTTP_X_FORWARDED</td> <td><?php echo getenv(' HTTP_X_FORWARDED')  ?></td> 
          </tr>

          <tr>
            <td> HTTP_FORWARDED_FOR</td> <td><?php echo getenv(' HTTP_FORWARDED_FOR')  ?></td> 
          </tr>
          <tr>
            <td> HTTP_FORWARDED</td> <td><?php echo getenv(' HTTP_FORWARDED')  ?></td> 
          </tr>

          <tr>
            <td>REMOTE_ADDR</td> <td><?php  echo getenv("REMOTE_ADDR") ;  ?></td> 
          </tr>

           <tr><td>SERVER_ADDR Public</td> <td><?php echo shell_exec( 'curl http://checkip.amazonaws.com' );  ?></td> </tr>

   			</tbody>

   		</table>

   <?php
}