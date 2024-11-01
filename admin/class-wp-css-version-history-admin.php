<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.briscoweb.com/
 * @since      1.0.0
 *
 * @package    Wp_Css_Version_History
 * @subpackage Wp_Css_Version_History/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Css_Version_History
 * @subpackage Wp_Css_Version_History/admin
 * @author     Brian Holzberger <bkeith@briscoweb.com>
 */
class Wp_Css_Version_History_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
    
    
/** Step 1. */
public function BW_my_plugin_menu() {
    global $submenu;
	//add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
$wpcssverhispageID = get_page_by_title( 'WP-CSS-Version-History' );
     $permalink = admin_url( 'edit.php' ).'?post_type=page&name=wp-css-version-history';
    if($wpcssverhispageID->ID)$permalink = admin_url( 'post.php' ).'?post='.$wpcssverhispageID->ID.'&action=edit';
    $submenu['themes.php'][] = array( 'WP CSS Version History', 'edit_theme_options', $permalink );

}

/** Step 3. */
public function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}
    
    /**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    Check Posts for CSS Edit.
	 */
    
    
    
  
function save_my_post_type($post_id){
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
//mail("bkeith@briscoweb.com","m97 Query post_name",$_POST['post_name']);
    #If this is your post type
    if('wp-css-version-history' === $_POST['post_name']){
        //Save any post meta here

        #We conditionally exit so we don't return the full wp-admin load if foo_doing_ajax is true
        if(isset($_POST['foo_doing_ajax']) && $_POST['foo_doing_ajax'] === true){
            header('Content-type: application/json');
            #Send a response
            echo json_encode(array('success' => true));
            exit;
            #You should keep this conditional to degrade gracefully for no JS
        }
    }
} 
    
    
    
    
    public function my_post_type_xhr(){
    global $post;
      
    if('wp-css-version-history' === $post->post_name){
        $post_url = admin_url('post.php'); #In case we're on post-new.php
       
       // for future use ajax save
        
        echo "
        <script>
       
       
            jQuery(document).ready(function($){
            
            
        //    console.log(wp.CodeMirror.doc.getCursor().line);
            
           //console.log(CodeMirror.getValue());
            
           $(function() {
	 console.log(codemirror.doc.getValue());
	  });
          
    // var editorxx = wp.CodeMirror.fromTextArea(document.getElementById('content')) ;   
     
     
  //   var editorxx = window.wp.codeEditor;
            
            
                //Click handler - you might have to bind this click event another way
                $('input#publish, input#save-post').click(function(){
                    //Post to post.php
                    var postURL = '$post_url';

                    //Collate all post form data
                    var data = $('form#post').serializeArray();
                    var datax = $('.wp-editor-area').text();
                // console.log($('.wp-editor-area').text());   
  //console.log(data);
   console.log(window.wp.codeEditor);
                    //Set a trigger for our save_post action
                   // data.push({foo_doing_ajax: true});
                    data.push({name: 'foo_doing_ajax',value:true});
                    
                    //var rrrrt =editor.getValue();
                    
 //data.push({name: 'content',value:rrrrt});


//var rrrrt =wp.codeEditor.activeEditor.getContent();



//console.log(editorxx);

//var rrrrt = wp.codeEditor.getContent('content');
                    //The XHR Goodness
                    $.post(postURL, data, function(response){
                      //  var obj = $.parseJSON(response);
                     // var obj = JSON.parse(response);
                      
                      var obj = response;
                      
                        
                        
                        
                      //  if(obj.success)
                          //  alert('Successfully saved post!');
                       // else
                           // alert('Something went wrong. ' + response);
                    });
                    return false;
                });
            });
        </script>";
    }
}

    
    
    
    public function BW_check_values($post_ID, $post_after, $post_before){
   
   
   global $post;
 
  
  $check_title = $post->post_name;
    
     if($check_title ==="wp-css-version-history" && get_current_screen()->id ==="page" ) {    
        
         $file = WP_PLUGIN_DIR.'/wp-css-version-history/public/css/wp-css-version-history-public.css';
         
    $string = $post_after->post_content;
    $content_without_line_breaks = preg_replace( '/(^|[^\n\r])[\r\n](?![\n\r])/', '$1 ', $string );
 $open = @fopen($file, "w"); 
 $write = @fputs($open, $content_without_line_breaks); 
 @fclose($open);
    
     }
   
}

    
    
    
    
    
    
   public function bw_code_editor(){
         global $post;
        if ( 'profile' !== get_current_screen()->id ) {
      //  return;
    }
    
   if(isset($post->post_name)){
    $check_title = $post->post_name;
  
    if($check_title ==="wp-css-version-history" && get_current_screen()->id ==="page" ) {
    add_filter( 'user_can_richedit' , '__return_false', 50 );
         remove_action( 'media_buttons', 'media_buttons' );
       // wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-css-version-history-admin.js', array( 'jquery' ), $this->version, false );
 wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-css-version-history-admin.css', array(), $this->version, 'all' );

        
    // Enqueue code editor and settings for manipulating HTML.
    $settings = wp_enqueue_code_editor( array( 'type' => 'text/css' ) );
        
   
    // Bail if user disabled CodeMirror.
    if ( false === $settings ) {
        return;
    }
 wp_enqueue_script( 'csslint' );
  //  wp_enqueue_script( 'htmlhint' );

//wp_enqueue_script( 'jshint' );
   

   
   
    wp_add_inline_script(
        'code-editor',
        sprintf(
            'jQuery( function() { wp.codeEditor.initialize( "content", %s ); } );',
            wp_json_encode( $settings )
        )
    );
       
        
        
  
        
        
        
        
        
       /* 
        
      wp_add_inline_script( 
    'wp-codemirror', 
    'window.codemirror = wp.CodeMirror;'
          
);  
      
        
  */      
        
        
    }
    }
    }
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Css_Version_History_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Css_Version_History_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-css-version-history-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Css_Version_History_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Css_Version_History_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-css-version-history-admin.js', array( 'jquery' ), $this->version, false );

	}

}
