 <?php
   class Posts extends CI_Controller{
   	  public function index($offset = 0){
         //Pagination

         $config['base_url'] = base_url().'posts/index/';
         $config['total_rows'] = $this->db->count_all('posts');
         $config['per_page'] = 3;
         $config['uri_segment'] = 3;
         
         //Init Pagination
         $this->pagination->initialize($config);


   	    $data['title'] = 'Latest Posts';
         
          $data['posts'] = $this->Post_model->get_posts(FALSE, $config['per_page'], $offset);

   	    $this->load->view('templates/header');
   	    $this->load->view('posts/index',$data);
   	    $this->load->view('templates/footer');
   	    
   }
         public function view($slug = NULL){
            $data['post'] = $this->Post_model->get_posts($slug);
            $post_id = $data['post']['id'];
            $data['comments'] = $this->comment_model->get_comments($post_id);

            if(empty($data['post'])){
               show_404();
            }
              
              $data['title'] = $data['post']['title'];
          $this->load->view('templates/header');
          $this->load->view('posts/view',$data);
          $this->load->view('templates/footer');
         }

         public function create(){
             //Check Login
           if(!$this->session->userdata('logged_in')){
              redirect('users/login');
           }


          $data['title'] = 'Create Post';

          $data['categories'] = $this->Post_model->get_categories();

          $this->form_validation->set_rules('title','Title','required');
          $this->form_validation->set_rules('body','Body','required');

          if($this->form_validation->run() === FALSE){

             $this->load->view('templates/header');
             $this->load->view('posts/create', $data);
             $this->load->view('templates/footer');

          } else{
                  $this->Post_model->create_post();
                  //set message
                  $this->session->set_flashdata('post_created','Your post has been created');

           redirect('posts');

          }
       }

       public function delete($id){

          //Check Login
           if(!$this->session->userdata('logged_in')){
              redirect('users/login');
          }

         $this->Post_model->delete_post($id);

         //set message
                  $this->session->set_flashdata('post_deleted','Your post has been deleted');
          redirect('posts');

       }

       public function edit($slug){
          //Check Login
           if(!$this->session->userdata('logged_in')){
              redirect('users/login');
               }

            $data['post'] = $this->Post_model->get_posts($slug);

            //Check User id
            if($this->session->userdata('user_id') != $this->Post_model->get_posts($slug)['user_id']){
                 redirect('posts');
            }
            $data['categories'] = $this->Post_model->get_categories();

            if(empty($data['post'])){
               show_404();
            }
              
              $data['title'] = 'Edit Post';
          $this->load->view('templates/header');
          $this->load->view('posts/edit', $data);
          $this->load->view('templates/footer');


       }

       public function update(){

        if(!$this->session->userdata('logged_in')){
              redirect('users/login');
               }
               
             $this->Post_model->update_post();

             //set message
                  $this->session->set_flashdata('post_updated','Your post has been updated');
             redirect('posts');
       }
}