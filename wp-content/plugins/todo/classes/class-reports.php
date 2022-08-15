<?php
    if (!defined('ABSPATH')) die("No cheating!");

        class Todo_main
        {

    
      
            public function __construct() {
              // add admin menu
              add_action( 'admin_menu', array( $this, 'todo_menu' ) );
              add_action( 'activated_plugin', array( $this, 'todo_posts' ) );
              // add scripts and style on the backend
              add_action( 'admin_enqueue_scripts', array( $this,'todo_admin_scripts') );  
              add_action( 'wp_ajax_get_job_applications', array( $this, 'get_job_applications') );
              add_action('init', function() {
                register_post_type('todo', [
                  'label' => __('Todos', 'txtdomain'),
                  'public' => true,
                  'menu_position' => 5,
                  'menu_icon' => 'dashicons-editor-ol',
                  'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
                  'show_in_rest' => true,
                  'rewrite' => ['slug' => 'todo'],
                  'labels' => [
                      'singular_name' => __('Todo', 'txtdomain'),
                      'add_new_item' => __('Add new todo', 'txtdomain'),
                      'new_item' => __('New todo', 'txtdomain'),
                      'view_item' => __('View todo', 'txtdomain'),
                      'not_found' => __('No todos found', 'txtdomain'),
                      'not_found_in_trash' => __('No todos found in trash', 'txtdomain'),
                      'all_items' => __('All todos', 'txtdomain'),
                      'insert_into_item' => __('Insert into todo', 'txtdomain')
                  ],		
                 ]);
         
           
               });

          
            }
  
            public function todo_posts(){
              
             for($i=0;$i<count($this->make_api_request());$i++){

                if(post_exists($this->make_api_request()[$i]->title)===0){
                  wp_insert_post(array (
                    'post_type' => 'todo',
                    'post_title' => $this->make_api_request()[$i]->title,
                    'post_content' => 'content',
                    'post_status' => 'publish',
                 )) ;
                }else{
                  return false;
                }
             
             
            }

            }

            /**
             * add todo menu
             */
            public function todo_menu() {

            

              add_menu_page(__('TODOS','todo-menu'), __('TODOS','todo-menu'), 'edit_others_posts', 'todo-menu', array( $this, 'reports_section') );        
              add_submenu_page(
                'todo-menu',              
                'Settings',          
                'Settings',                    
                'manage_options',                  
                'todo-settings',             
                array( $this, 'settings_section') 
                 );
            }

            private function make_api_request() {
 
                $response = wp_remote_get('https://jsonplaceholder.typicode.com/todos');
                try {
             
                   
                    $json = json_decode( wp_remote_retrieve_body( $response ) );
                 
             
                } catch ( Exception $ex ) {
                    $json = null;
                }

              return $json;
             
               
             
            }

    
            public function todo_admin_scripts() 
            {
             
             
            
            
                wp_enqueue_script( 'custom-script', plugins_url( '/js/script.js' , __FILE__ ) );
                wp_localize_script( 'rml-script', 'readmelater_ajax', array( 'ajax_url' => admin_url('admin-ajax.php')) );
              
            }
        
        
            public function settings_section()
            {
            
            
              ?>
          
          
              <div class="wrap">
             
                  <div>
                    <p>posts per page</p>
                      <table id="report_criteria" class="form-table">   
                      <tr>
                          <td style="padding-left:0px;">
                           <input type="text">
                          </td>
                        </tr>  
                        <tr>
                          <td style="padding-left:0px;">
                            <button class="btn-add button-primary" id="save" name="save"><?php echo __('save','Todo_main') ?></button>
                          </td>
                        </tr>                 
                      </table>
                    </div>
              </div> 
        
              <?php
            }
            public function reports_section()
            {
              
                ?>
            
            
                <div class="wrap">
               
                    <div>
               
                        <table id="report_criteria" class="form-table">   
                          <tr>
                            <td style="padding-left:0px;">
                              <button class="btn-add button-primary" id="generate" name="generate"><?php echo __('Get todo manually','Todo_main') ?></button>
                            </td>
                          </tr>                 
                        </table>
                      </div>
                </div> 
          
                <?php
            }
        
        
      

        } 
      
   
        // if( is_admin() ) {
           $new_todo = new Todo_main();
        // }