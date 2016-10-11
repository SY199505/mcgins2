<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this -> load -> model('admin_model');
        $this -> load -> model('index_model');
        $this -> load -> model('intro_model');
		$this -> load -> model('course_model');
        $this -> load -> model('team_model');
        $this -> load -> model('job_model');
        $this -> load -> model('faq_model');
        $this -> load -> model('contact_model');
        $this -> load -> model('activity_model');
        $this -> load -> model('bargin_model');
        $this -> load -> model('nav_model');
        $this -> load -> model('i18n_model');
        $this -> load -> model('carousel_model');
        $this->load->model('dame_model');
    }

	public function pre($data)
	{
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}

    /**
    *   @login
    *   @跳转登录页面
    *   @isliuwei
    *   @16/08/23
    */

	public function login()
	{
		$this -> load -> view('admin/login');
	}

    /**
    *   @admin_index
    *   @跳转登录页面
    *   @isliuwei
    *   @16/08/23
    */

    public function admin_index()
    {
        $this -> load -> view('admin/admin-index');
    }

    /**
    *   @check_login
    *   @检查登录
    *   @isliuwei
    *   @16/08/23
    */

    public function check_login()
    {
        /*接收数据*/
        $username = $this -> input -> post('admin_username',true);
        $password = $this -> input -> post('admin_password',true);

        /*连接数据库*/
        $this -> load -> model('admin_model');

        /*调用数据库方法*/
        $result = $this -> admin_model -> get_by_username_password($username,$password);

        /*跳转页面 传递数据*/
        if($result)
        {
            /*将数据库返回的结果 转化成php数组*/
            $data = array(
                'adminInfo' => $result
            );

            /*将admin信息存入session 记录当然admin的登录状态 跳转至admin-index页面*/
            $this -> session -> set_userdata($data);
            //$this -> load -> view('admin/admin-index');
            redirect('admin/admin_index');

        }else{
            //$this -> load -> view('admin/login');
            redirect('admin/login');
        }
    }

    /**
    *   @logout
    *   @登出页面
    *   @isliuwei
    *   @16/08/23
    */

	public function logout()
	{
        /*将当前admin用户信息从session里面删除 删除当前用户的会话 实现登出功能*/
		$this -> session -> unset_userdata('adminInfo');
        /*跳转至登录页面*/
      	redirect('admin/login');
	}

    /**
    *   @admin_setting
    *   @admin用户信息设置页面
    *   @isliuwei
    *   @16/08/23
    */

    public function admin_setting()
    {
        /*获取admin_id数据*/
        $admin_id = $this -> input -> get('admin_id');

        /*连接数据库 根据admin_id查出当前admin用户信息*/
        $this -> load -> model('admin_model');
        $result = $this -> admin_model -> get_by_id($admin_id);

        /*跳转页面 传递数据*/
        if($result)
        {
            /*将数据库返回的结果 转化成php数组*/
            $data = array(
                'admin' => $result
            );

            /*将admin用户的信息 传递给设置页面*/
            $this -> load -> view('admin/admin-profile',$data);

        }
    }

    /**
    *   @admin_mgr
    *   @admin用户列表页面
    *   @isliuwei
    *   @16/08/23
    */

    public function admin_mgr()
    {
        /*连接数据库 获取当前所有admin用户信息*/
        $this -> load -> model('admin_model');
        $result = $this -> admin_model -> get_all();

        if($result)
        {
            $data = array(
              'admins' => $result
            );
            $this -> load -> view('admin/admin-mgr',$data);
        }

    }
    public function save_admin()
    {
        $admin_username = $this -> input -> post('admin_username');
        $admin_password = $this -> input -> post('admin_password');


        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        //图片上传操作
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('admin_photo');
        $upload_data = $this -> upload -> data();

        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $photo_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $photo_url = 'img/avatar.png';
        }

        $rows = $this -> admin_model -> save_admin_by_name_pwd_photo($admin_username,$admin_password, $photo_url);
        if($rows > 0)
        {
            $data = array(
            'info'=>'注册成功',
            'url' => 'admin/admin_mgr'
        );
        $this -> load -> view('redirect-null',$data);
        }
        else
        {

        }


    }
    public function index_mgr(){
        $result4 = $this -> dame_model -> get_all();
        $this -> load -> model('index_model');
        $result = $this -> index_model -> get_all();
        if($result){
            $data = array(
                'dame' => $result4,
                'indexInfo' => $result
            );
            $this -> load -> view('admin/index-mgr', $data);
        }
    }
    public function index_update(){
        $chinese = $this -> input -> post('chinese');
        $english = $this -> input -> post('english');
        $this -> load -> model('dame_model');
        $result = $this -> dame_model -> update_chinese($chinese);
        $result1 = $this -> dame_model -> update_english($english);
        if($result){
            redirect('admin/index_mgr');
        }else{
            echo "修改失败";
        }
        if($result1){
            redirect('admin/index_mgr');
        }else{
            echo "修改失败";
        }
    }

    public function intro_mgr(){
        $this -> load -> model('dame_model');
        $result2 = $this -> dame_model -> get_all();
        $this -> load -> model('intro_model');
        $result = $this -> intro_model -> get_all();
        $this -> load -> model('carousel_model');
        $result1 = $this -> carousel_model -> get_all();
        if($result){
            $data = array(
                'introInfo' => $result,
                'carouselInfo' => $result1,
                'dame' => $result2
            );
            $this -> load -> view('admin/intro-mgr', $data);
        }
    }

    public function course_mgr()
    {
        $result4 = $this -> dame_model -> get_all();
        $this -> load -> model('course_model');
        $result = $this -> course_model -> get_all();

        if($result)
        {
            $data = array(
              'courseInfo' => $result,
              'dame' => $result4
            );
            $this -> load -> view('admin/course-mgr',$data);
        }

    }
    public function course_update()
    {
        $chinese = $this -> input -> post('chinese');
        $english = $this -> input -> post('english');
        $title1 = $this -> input -> post('title1');
        $title2 = $this -> input -> post('title2');
        $title3 = $this -> input -> post('title3');
        $this -> load -> model('dame_model');
        $result = $this -> dame_model -> update_course_chinese($chinese);
        $result1 = $this -> dame_model -> update_course_english($english);
        $result2 = $this -> dame_model -> update_course_title1($title1);
        $result3 = $this -> dame_model -> update_course_title2($title2);
        $result4 = $this -> dame_model -> update_course_title3($title3);
        if($result||$result1||$result2||$result3||$result4){
            redirect('admin/course_mgr');
        }else{
            echo "修改失败";
        }
    }

    public function team_mgr()
    {
        $this -> load -> model('team_model');
        $result = $this -> team_model -> get_all();

        if($result)
        {
            $data = array(
              'team' => $result
            );
            $this -> load -> view('admin/team-mgr',$data);
        }

    }  

    public function job_mgr()
    {
        $this -> load -> model('job_model');
        $result = $this -> job_model -> get_all();

        if($result)
        {
            $data = array(
              'job' => $result
            );
            $this -> load -> view('admin/job-mgr',$data);
        }

    }

    public function question_mgr()
    {
        $this -> load -> model('faq_model');
        $result = $this -> faq_model -> get_all();

        if($result)
        {
            $data = array(
              'faqInfo' => $result
            );
            $this -> load -> view('admin/question-mgr',$data);
        }

    }

    public function contact_mgr()
    {
        $this -> load -> model('contact_model');
        $result = $this -> contact_model -> get_all();

        if($result)
        {
            $data = array(
              'contact' => $result
            );
            $this -> load -> view('admin/contact-mgr',$data);
        }

    }
    public function img_mgr()
    {
        $this -> load -> model('img_model');
        $result = $this -> img_model -> get_all();

        if($result)
        {
            $data = array(
                'imgs' => $result
            );
            $this -> load -> view('admin/img-mgr',$data);
        }

    }
    public function bargin_mgr()
    {
        $this -> load -> model('bargin_model');
        $result = $this -> bargin_model -> get_all();

        if($result)
        {
            $data = array(
                'barginInfo' => $result
            );
            $this -> load -> view('admin/bargin-mgr',$data);
        }

    }

    /**
    *   @admin_mgr
    *   @admin用户列表页面
    *   @isliuwei
    *   @16/08/23
    */
    public function add_admin()
    {
        $this -> load -> view('admin/admin-add');
    }
    public function check_username()
    {
        $admin_username = $this -> input -> get('admin_username');
        $this -> load -> model('admin_model');
        $result = $this -> admin_model -> get_by_username($admin_username);
        if($result)
        {
            echo 'success';
        }
        else
        {
            echo 'fail';
        }
    }

    public function update_admin()
    {
        $id = $this -> input -> post('admin_id',true);
        $username = $this -> input -> post('admin_username',true);
        $password = $this -> input -> post('admin_password',true);
        $photo_old_url = $this -> input -> post('photo_old_url');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        //图片上传操作
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('admin_photo');
        $upload_data = $this -> upload -> data();
        

        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $photo_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $photo_url = $photo_old_url;
        }

        $this -> load -> model('admin_model');

        $row = $this -> admin_model -> updata_by_all($id,$username,$password,$photo_url);
        
        if($row>0){
            redirect('admin/login');
        }else{
            echo "<script>alert('未修改！');</script>";
            //http://localhost/m/

            echo "<script>location.href='admin_setting?admin_id='+$id;</script>";
            //$this -> load -> view('admin/admin-profile',$data);
            //$this -> admin_index();
            //redirect('admin/admin_setting');
        }

    }

    /**
     *   @admin_mgr
     *   @admin
     *   课程列表页面
     *   @sy
     *   @16/08/23
     */
    public function edit_index($index_id)
    {
        $index = $this -> index_model -> get_by_id($index_id);
        $this -> load -> view('admin/index-edit', array('index' => $index));
    }

    public function update_index()
    {
        $features_id = $this -> input -> post('features_id');
        $features_title_chn = $this -> input -> post('features_title_chn');
        $features_chn  = $this -> input -> post('features_chn');
        $features_title_en = $this -> input -> post('features_title_en');
        $features_en = $this -> input -> post('features_en');
        $icon_old_url = $this -> input -> post('icon_old_url');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('icon');
        $upload_data = $this -> upload -> data();
        $icon_url = 'uploads/'.$upload_data['file_name'];
        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $icon_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $icon_url = $icon_old_url;
        }
        $row = $this -> index_model -> update_index($features_id, $features_title_chn, $features_chn, $features_title_en, $features_en, $icon_url);
        if($row > 0){
            redirect('admin/index_mgr');
        }else{
            echo "修改失败";
        }
    }

    public function delete_index($index_id)
    {
        $row = $this -> index_model -> delete_index($index_id);
        if($row > 0){
            redirect('admin/index_mgr');
        }
    }

    public function add_index()
    {
        $this -> load -> view('admin/index-add');
    }

    public function save_index()
    {
//        $features_id = $this -> input -> post('features_id');
        $features_title_chn = $this -> input -> post('features_title_chn');
        $features_chn  = $this -> input -> post('features_chn');
        $features_title_en = $this -> input -> post('features_title_en');
        $features_en = $this -> input -> post('features_en');
        $row = $this -> index_model -> save_index($features_title_chn, $features_chn, $features_title_en, $features_en);
        if($row > 0){
            redirect('admin/index_mgr');
        }
    }

    /**
     *   @admin_mgr
     *   @admin
     *   关于我们管理
     *   @sy199505
     *   @16/08/23
     */
    public function update_intro()
    {
        $aboutUs_chn = $this -> input -> post('aboutUs_chn');
        $aboutUs_en = $this -> input -> post('aboutUs_en');
        $row = $this -> intro_model -> update_intro($aboutUs_chn, $aboutUs_en);
        $eight = $this -> input -> post('eight');
        $row1 = $this -> dame_model ->update_eight($eight);
        $nine = $this -> input -> post('nine');
        $row2 = $this -> dame_model ->update_nine($nine);
        $ten = $this -> input -> post('ten');
        $row3 = $this -> dame_model ->update_ten($ten);
        $eleven = $this -> input -> post('eleven');
        $row4 = $this -> dame_model ->update_eleven($eleven);
        $twelve = $this -> input -> post('twelve');
        $row5 = $this -> dame_model ->update_twelve($twelve);
        $thirteen = $this -> input -> post('thirteen');
        $row6 = $this -> dame_model ->update_thirteen($thirteen);
        $forteen = $this -> input -> post('forteen');
        $row7 = $this -> dame_model ->update_forteen($forteen);
        $fifteen = $this -> input -> post('fifteen');
        $row8 = $this -> dame_model ->update_fifteen($fifteen);
        $sixteen = $this -> input -> post('sixteen');
        $row9 = $this -> dame_model ->update_sixteen($sixteen);
        $seventeen = $this -> input -> post('seventeen');
        $row10 = $this -> dame_model ->update_seventeen($seventeen);
        $eighteen = $this -> input -> post('eighteen');
        $row11 = $this -> dame_model ->update_eighteen($eighteen);
        $ninteen = $this -> input -> post('ninteen');
        $row12 = $this -> dame_model ->update_ninteen($ninteen);
        if($row > 0||$row1 > 0||$row1 > 0||$row2 > 0||$row3 > 0||$row4 > 0||$row5 > 0||$row6 > 0||$row7 > 0||$row8 > 0||$row9 > 0||$row10 > 0||$row11 > 0||$row12 > 0){
            redirect('admin/intro_mgr');
        }else{
            echo '修改信息失败!';
        }
    }
    public function edit_feature_bg()
    {
        $this -> load -> model('carousel_model');

        $result = $this -> carousel_model -> get_all();
        $result1 = $this -> intro_model -> get_all();

        if($result)
        {
            $data = array(
                'carouselInfo' => $result,
                'introInfo' => $result1
            );
            $this -> load -> view('admin/edit_feature_bg',$data);
        }
    }
    public function update_intro_bg()
    {
        $intro_bg_old_url = $this -> input -> post('intro_bg_old_url');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('new_intro_bg');
        $upload_data = $this -> upload -> data();
        $intro_bg_url = 'uploads/'.$upload_data['file_name'];
        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $feature_bg_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $feature_bg_url = $intro_bg_old_url;
        }

        $row = $this -> intro_model -> update_intro_bg($intro_bg_url);
        if($row > 0){
            redirect('admin/intro_mgr');
        }else{
            echo '未修改或修改失败！';
        }
    }
    public function update_feature_bg()
    {
        $feature_bg_old_url = $this -> input -> post('feature_bg_old_url');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('new_feature_bg');
        $upload_data = $this -> upload -> data();
        $feature_bg_url = 'uploads/'.$upload_data['file_name'];
        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $feature_bg_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $feature_bg_url = $feature_bg_old_url;
        }

        $row = $this -> carousel_model -> update_feature_bg($feature_bg_url);
        if($row > 0){
            redirect('admin/intro_mgr');
        }else{
            echo '未修改或修改失败！';
        }
    }
    public function edit_carousel()
    {
        $id = $this -> uri -> segment(3);
        $this -> load -> model('carousel_model');

        $result = $this -> carousel_model -> get_by_id($id);

        if($result)
        {
            $data = array(
                'carouselInfo' => $result
            );
            $this -> load -> view('admin/update-intro',$data);
        }

    }

    public function update_carousel()
    {
        $id = $this -> input -> post('carousel_id');
        $carousel_old_url = $this -> input -> post('carousel_old_url');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('new_carousel');
        $upload_data = $this -> upload -> data();
        $carousel_url = 'uploads/'.$upload_data['file_name'];
        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $carousel_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $carousel_url = $carousel_old_url;
        }

        $row = $this -> carousel_model -> update_carousel($id, $carousel_url);
        if($row > 0){
            redirect('admin/intro_mgr');
        }else{
            echo '未修改或修改失败！';
        }
    }
    public function add_carousel()
    {
        $this -> load -> view('admin/carousel-add');
    }
    public function save_carousel()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        //图片上传操作
        $this -> load -> library('upload', $config);
        /**
        $this -> upload -> do_upload('admin_photo');
         */

        $this -> upload -> do_upload('new_carousel');

        $upload_data = $this -> upload -> data();

        $new_carousel = 'uploads/'.$upload_data[file_name];
        $row = $this -> carousel_model -> save_carousel($new_carousel);
        if($row>0){
            redirect('admin/intro_mgr');
        }
    }
    public function delete_carousel($carousel_id)
    {
        $row = $this -> carousel_model -> delete_carousel($carousel_id);
        if($row > 0){
            redirect('admin/intro_mgr');
        }
    }
    /**
     *   @admin_mgr
     *   @admin
     *   课程列表页面
     *   @isliuwei
     *   @16/08/23
     */
    public function add_course()
    {
        $this -> load -> view('admin/course-add');
    }

    public function edit_course($course_id)
    {
        $course = $this -> course_model -> get_by_id($course_id);
        $this -> load -> view('admin/course-edit', array('course' => $course));
    }

    public function save_course()
    {
        $levels = $this -> input -> post('levels');
        $age = $this -> input -> post('age');
        $courses = $this -> input -> post('courses');
        $intro = $this -> input -> post('intro');
        $row = $this -> course_model -> save_course($levels, $age, $courses, $intro);
        if($row > 0){
            redirect('admin/course_mgr');
        }
    }

     public function update_course()
    {
        $course_id = $this -> input -> post('course_id');
        $levels = $this -> input -> post('levels');
        $age = $this -> input -> post('age');
        $courses = $this -> input -> post('courses');
        $intro = $this -> input -> post('intro');
        $row = $this -> course_model -> update_course($course_id, $levels, $age, $courses, $intro);
        if($row > 0){
            redirect('admin/course_mgr');
        }else{
            echo '修改课程信息失败!';
        }
    }

     public function delete_course($course_id)
    {
        $row = $this -> course_model -> delete_course($course_id);
        if($row > 0){
            redirect('admin/course_mgr');
        }
    }


    /**
    *   @admin_mgr
    *   @admin团队列表页面
    *   @isliuwei
    *   @16/08/23
    */
    public function add_team()
    {
        $this -> load -> view('admin/team-add');
    }

    public function edit_team()
    {
        $id = $this -> input -> get('team_id');
        $this -> load -> model('team_model');

        $result = $this -> team_model -> get_by_id($id);
        //var_dump($result);
        //die();

        if($result)
        {
            $data = array(
              'team' => $result
            );
            $this -> load -> view('admin/update-team',$data);
        }

    }

    public function save_team()
    {
        $type = $this -> input -> post('team_type');
        $name = $this -> input -> post('team_name');
        $desc = $this -> input -> post('team_desc');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        //图片上传操作
        $this -> load -> library('upload', $config);
        /**
        $this -> upload -> do_upload('admin_photo');
        */

        $this -> upload -> do_upload('team_photo');
       
        $upload_data = $this -> upload -> data();

        $photo_url = 'uploads/'.$upload_data[file_name];



        $row = $this -> team_model -> save_team($type, $name, $photo_url, $desc);
        if($row > 0){
            redirect('admin/team_mgr');
        }
    }

    public function update_team()
    {
        $id = $this->input -> post('team_id');
        $name = $this->input -> post('team_name');
        $type = $this -> input -> post('team_type');
        $desc = $this->input -> post('team_desc');
        $photo_old_url = $this->input -> post('photo_old_url');



        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        //图片上传操作
        $this -> load -> library('upload', $config);
        /**
        $this -> upload -> do_upload('admin_photo');
        */

        $this -> upload -> do_upload('team_photo');
       
        $upload_data = $this -> upload -> data();

        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $photo_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $photo_url = $photo_old_url;
        }

        // echo $photo_url;
        // die();

        $this -> load -> model('team_model');

        $row = $this -> team_model -> updata_by_all($id,$name,$type,$desc,$photo_url);
        
        if($row>0){
            redirect('admin/team_mgr');
        }else{
            echo "<script>alert('未修改！');</script>";
            //http://localhost/m/

            echo "<script>location.href='team_update?team_id='+$id;</script>";
            //$this -> load -> view('admin/admin-profile',$data);
            //$this -> admin_index();
            //redirect('admin/admin_setting');
        }
    }

    public function delete_team()
    {
        $id = $this -> input -> get('team_id');
        $row = $this -> team_model -> delete_team($id);
        if($row > 0){
            redirect('admin/team_mgr');
        }
    }

   
    /**
    *   @admin_mgr
    *   @admin招聘列表页面
    *   @isliuwei
    *   @16/08/23
    */
    public function add_job()
    {
        $this -> load -> view('admin/job-add');
    }
    public function edit_job($job_id){
        
        $job = $this -> job_model -> get_by_id($job_id);
        $this -> load -> view('admin/job-edit', array('job' => $job));
    }

    public function save_job()
    {
        $title = $this -> input -> post('title');
        $content = $this -> input -> post('content');
        $row = $this -> job_model -> save_job($title, $content);
        if($row > 0){
            redirect('admin/job_mgr');
        }
    }
    public function update_job()
    {
        $id = $this -> input -> post('id');
        $title = $this -> input -> post('title');
        $content = $this -> input -> post('content');
        $this -> load -> model('job_model');
        $row = $this -> job_model -> update_job($id,$title,$content);
        if($row > 0){
            redirect('admin/job_mgr');
        }else{
            echo '修改问题信息失败!';
        }

    }

    public function delete_job($id)
    {
        $row = $this -> job_model -> delete_job($id);
        if($row > 0){
            redirect('admin/job_mgr');
        }
    }

    /**
    *   @admin_mgr
    *   @admin问题列表页面
    *   @isliuwei
    *   @16/08/23
    */
    public function add_question()
    {
        $this -> load -> view('admin/question-add');
    }

    public function edit_question($FAQ_id)
    {
        $question = $this -> faq_model -> get_by_id($FAQ_id);
        $this -> load -> view('admin/question-edit', array('faq' => $question));
    }

    public function save_question()
    {
        $FAQ_title = $this -> input -> post('FAQ_title');
        $FAQ_content = $this -> input -> post('FAQ_content');
        $row = $this -> faq_model -> save_question($FAQ_title, $FAQ_content);

        if($row > 0){
            redirect('admin/question_mgr');
        }
    }

    public function update_question()
    {
        $FAQ_id = $this -> input -> post('FAQ_id');
        $FAQ_title = $this -> input -> post('FAQ_title');
        $FAQ_content = $this -> input -> post('FAQ_content');
        $row = $this -> faq_model -> update_question($FAQ_id, $FAQ_title, $FAQ_content);
        if($row > 0){
            redirect('admin/question_mgr');
        }else{
            echo '修改问题信息失败!';
        }
    }

    public function delete_question($FAQ_id)
    {
        $row = $this -> faq_model -> delete_question($FAQ_id);
        if($row > 0){
            redirect('admin/question_mgr');
        }
    }
    /**
    *   @admin_mgr
    *   @admin联系列表页面
    *   @isliuwei
    *   @16/08/23
    */

    public function update_contact()
    {
        $id = $this -> input -> post('id');
        $tel = $this -> input -> post('tel');
        $mail = $this -> input -> post('mail');
        $website = $this -> input -> post('website');
        $phone = $this -> input -> post('phone');
        $wechat = $this -> input -> post('wechat');
        $addr = $this -> input -> post('addr');
        $longitude = $this -> input -> post('longitude');
        $latitude = $this -> input -> post('latitude');
        $QR_old_url = $this -> input -> post('QR_old_url');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('new_QR');
        $upload_data = $this -> upload -> data();
        $QR_url = 'uploads/'.$upload_data['file_name'];

        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $QR_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $QR_url = $QR_old_url;
        }

        $row = $this -> contact_model -> update_contact($id, $tel, $mail, $website, $phone, $wechat, $addr, $QR_url, $longitude, $latitude);

        if($row > 0){
            redirect('admin/contact_mgr');
        }else{
            echo '未修改或修改失败！';
        }   
    }

    public function news_mgr()
    {
        
        
        $news_count = $this -> activity_model -> get_news_count();
        $offset = $this -> uri -> segment(3)==NULL?0 : $this -> uri -> segment(3);

        //分页
        $this->load->library('pagination');
        $config['base_url'] = 'admin/news_mgr';
        $config['total_rows'] = $news_count;
        $config['per_page'] = 5; 

        $config['last_link'] = FALSE;
        $config['prev_link'] = '«';//上一页
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';//下一页
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';//每个数字页
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="am-active"><a href="'.$config['base_url'].'">';//当前页
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config); 

        $result = $this -> activity_model -> get_news_by_page($config['per_page'],$offset);

        if($result)
        {
            $data = array(
              'activityInfo' => $result
            );
            $this -> load -> view('admin/news-mgr',$data);
        }
    }

    public function add_news()
    {
        $this -> load -> view('admin/add-news');
    }

    public function save_news()
    {
        $title = $this -> input -> post('news_title');
        $content = $this -> input -> post('news_content');
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('news_photo');
        $upload_data = $this -> upload -> data();
        $photo_url = 'uploads/'.$upload_data['file_name'];

        $row = $this -> activity_model -> save_news_by_all($title,$content,$photo_url);
        if( $row > 0)
        {
            redirect('admin/news_mgr');
        }else{
            redirect('admin/save_news');
        }

    }

    public function delete_news()
    {
        $id = $this -> uri -> segment(3);
        $row = $this -> activity_model -> delete_by_id($id);
        if($row > 0)
        {
            redirect('admin/news_mgr');
        }
    }

    public function news_setting()
    {
        $id = $this -> input -> get('news_id');
        $row = $this -> activity_model -> get_by_id($id);

        if($row)
        {
            $data = array(
                'news' => $row
            );

            $this -> load -> view('admin/news-update',$data);
        }
    }

    public function update_news()
    {
        $id = $this -> input -> post('news_id');
        $title = $this -> input -> post('news_title');
        $content = $this -> input -> post('news_content');
        $photo_old_url = $this -> input -> post('photo_old_url');
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('news_photo');
        $upload_data = $this -> upload -> data();
        $photo_url = 'uploads/'.$upload_data['file_name'];

        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $photo_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $photo_url = $photo_old_url;
        }

        $row = $this -> activity_model -> update_news_by_all($id,$title,$content,$photo_url);
        if( $row > 0)
        {
            redirect('admin/news_mgr');
        }else{
            echo "<script>location.href='news_setting?news_id='+$id;</script>";
        }

    }
//    -------------------------------------------------
//    public function bargin_mgr()
//    {


//        $bargin_count = $this -> bargin_model -> get_bargin_count();
//        $offset = $this -> uri -> segment(3)==NULL?0 : $this -> uri -> segment(3);

        //分页
//        $this->load->library('pagination');
//        $config['base_url'] = 'admin/bargin_mgr';
//        $config['total_rows'] = $bargin_count;
//        $config['per_page'] = 5;
//
//        $config['last_link'] = FALSE;
//        $config['prev_link'] = '«';//上一页
//        $config['prev_tag_open'] = '<li>';
//        $config['prev_tag_close'] = '</li>';
//        $config['next_link'] = '»';//下一页
//        $config['next_tag_open'] = '<li>';
//        $config['next_tag_close'] = '</li>';
//        $config['num_tag_open'] = '<li>';//每个数字页
//        $config['num_tag_close'] = '</li>';
//        $config['cur_tag_open'] = '<li class="am-active"><a href="'.$config['base_url'].'">';//当前页
//        $config['cur_tag_close'] = '</a></li>';
//
//
//        $this->pagination->initialize($config);
//
//        $result = $this -> activity_model -> get_bargin_by_page($config['per_page'],$offset);
//        $result = $this -> bargin_model -> get($config['per_page'],$offset);
//        if($result)
//        {
//            $data = array(
//                'barginInfo' => $result
//            );
//            $this -> load -> view('admin/bargin-mgr',$data);
//        }
//    }

    public function add_bargin()
    {
        $this -> load -> view('admin/add-bargin');
    }

    public function save_bargin()
    {
        $title = $this -> input -> post('bargin_title');
        $content = $this -> input -> post('bargin_content');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('bargin_photo');
        $upload_data = $this -> upload -> data();
        $photo_url = 'uploads/'.$upload_data['file_name'];

        $row = $this -> bargin_model -> save_bargin_by_all($title,$content,$photo_url);
        if( $row > 0)
        {
            redirect('admin/bargin_mgr');
        }else{
            redirect('admin/save_bargin');
        }

    }

    public function delete_bargin()
    {
        $id = $this -> uri -> segment(3);
        $row = $this -> bargin_model -> delete_by_id($id);
        if($row > 0)
        {
            redirect('admin/bargin_mgr');
        }
    }

    public function bargin_setting()
    {
        $id = $this -> input -> get('bargin_id');
        $row = $this -> bargin_model -> get_by_id($id);

        if($row)
        {
            $data = array(
                'bargin' => $row
            );

            $this -> load -> view('admin/bargin-update',$data);
        }
    }

    public function update_bargin()
    {
        $id = $this -> input -> post('bargin_id');
        $title = $this -> input -> post('bargin_title');
        $content = $this -> input -> post('bargin_content');
        $photo_old_url = $this -> input -> post('photo_old_url');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('bargin_photo');
        $upload_data = $this -> upload -> data();
        $photo_url = 'uploads/'.$upload_data['file_name'];

        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $photo_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $photo_url = $photo_old_url;
        }

        $row = $this -> bargin_model -> update_bargin_by_all($id,$title,$content,$photo_url);
        if( $row > 0)
        {
            redirect('admin/bargin_mgr');
        }else{
            echo "<script>location.href='bargin_setting?bargin_id='+$id;</script>";
        }

    }
    public function edit_img($img_id)
    {
        $this -> load -> model('img_model');

        $result = $this -> img_model -> get_by_id($img_id);
        //var_dump($result);
        //die();

        if($result)
        {
            $data = array(
                'img' => $result
            );
            $this -> load -> view('admin/img-edit',$data);
        }

    }
    public function update_img()
    {
        $id = $this -> input -> post('img_id',true);
        $title = $this -> input -> post('img_title',true);
        $desc = $this -> input -> post('img_desc',true);
        $photo_old_url = $this -> input -> post('photo_old_url');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        //图片上传操作
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('img_photo');
        $upload_data = $this -> upload -> data();


        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $photo_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $photo_url = $photo_old_url;
        }

        $this -> load -> model('img_model');

        $row = $this -> img_model -> updata_by_all($id,$title,$desc,$photo_url);

        if($row>0){
            redirect('admin/img_mgr');
        }else{
            echo "<script>alert('未修改！');</script>";
            //http://localhost/m/

            echo "<script>location.href='img_setting?img_id='+$id;</script>";
        }

    }

    public function nav_mgr()
    {
        $result = $this -> nav_model -> get_all();
        $data = array(
            'navs' => $result
        );

        if($data)
        {
            $this -> load -> view('admin/nav-mgr',$data);
        }

    }

    public function change_nav()
    {
        $id = $this -> input -> get('id');
        $isShow = $this -> input -> get('isShow');
        $row = $this -> nav_model -> update_show($id,$isShow);
        if($row>0)
        {
            echo "success";
        }else{
            echo "fail";
        }
    }

    public function get_chn_nav()
    {

        $navInfoChn = $this -> i18n_model -> get_Info_isShow_ch();

        if($navInfoChn){
            $data = array(
                'chnNavs' => $navInfoChn
            );
            echo json_encode($data);
        }
        
        
    }

    public function get_en_nav()
    {
        $navInfoEn = $this -> i18n_model -> get_Info_isShow_en();

        if($navInfoEn){
            $data = array(
                'enNavs' => $navInfoEn
            );
            echo json_encode($data);
        }

    }
}