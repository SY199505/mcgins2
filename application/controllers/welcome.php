<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('index_model');
		$this->load->model('carousel_model');
		$this->load->model('img_model');
		$this->load->model('intro_model');
		$this->load->model('course_model');
		$this->load->model('team_model');
		$this->load->model('job_model');
		$this->load->model('faq_model');
		$this->load->model('contact_model');
		$this->load->model('activity_model');
		$this->load->model('bargin_model');
		$this->load->model('footer_model');
		$this->load->model('i18n_model');
		$this->i18n();
		$this->load->model('nav_model');
		$this->load->model('dame_model');
	}

	public function pre($data)
	{
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}


	public function i18n()
	{

		$featuresInfo = $this -> i18n_model -> get_all_features();
		$aboutUsInfo = $this -> i18n_model -> get_aboutUs();
		$navInfoEn = $this -> i18n_model -> get_Info_isShow_en();
		$navInfoChn = $this -> i18n_model -> get_Info_isShow_ch();
		// $this -> pre($navInfoEn);
		// $this -> pre($navInfoChn);
		// die();

		//$contactInfo = $this -> i18n_model -> get_all();


		$data = array(
			'features' => $featuresInfo,
			'aboutUs' => $aboutUsInfo,
			'enNavs' => $navInfoEn,
			'chnNavs' => $navInfoChn

		);
		$this -> load -> view('i18n',$data);

	}


	public function index()
	{
		//$this -> i18n();
		$result4 = $this -> dame_model -> get_all();
		$result3 = $this -> img_model -> get_all();
		$result2 = $this -> carousel_model -> get_all();
    	$result1 = $this -> footer_model -> get_all();
		$result = $this -> index_model -> get_all();
		$data = array(
			//尾部
			'dame' => $result4,
			'imgs' => $result3,
			'carouselInfo' => $result2,
			'footerInfo' => $result1,				
			'indexInfo' => $result
		);	 
		$this -> load -> view('index',$data);

	}

	public function intro()
	{
		$result4 = $this -> dame_model -> get_all();
		$result2 = $this -> img_model -> get_all();
		$result1 = $this -> footer_model -> get_all();
    	$data = array(
			//尾部
				'imgs' => $result2,
				'footerInfo' => $result1,
				'dame' => $result4,
		);
		$this -> load -> view('intro', $data);

	}

	public function course()
	{
		$result4 = $this -> dame_model -> get_all();
		$result1 = $this -> footer_model -> get_all();
		$result = $this -> course_model -> get_all();
		$data = array(
			//尾部
			'footerInfo' => $result1,
			'courseInfo' => $result,
			'dame' => $result4,
		);

		$this -> load -> view('course',$data);

	}

	public function team()
	{
		$result2 = $this -> img_model -> get_all();
		$result1 = $this -> footer_model -> get_all();
    	$result = $this -> team_model -> get_all();
    	$data = array(
				'imgs' => $result2,

				'footerInfo' => $result1,
    		'member' => $result
		);

		$this -> load -> view('team',$data);

	}

	public function job()
	{
		$result3 = $this -> dame_model -> get_all();
		$result2 = $this -> img_model -> get_all();
		$result1 = $this -> footer_model -> get_all();
		$result = $this -> job_model -> get_all();
		$data = array(
			//尾部
			'dame' => $result3,
			'imgs' => $result2,
			'footerInfo' => $result1,
			'jobInfo' => $result
		);			
		$this -> load -> view('job', $data);

	}

	public function question()
	{
		$result2 = $this -> img_model -> get_all();
		$result1 = $this -> footer_model -> get_all();
		$result = $this -> faq_model -> get_all();
		$data = array(
				'imgs' => $result2,

				'footerInfo' => $result1,
			'faqInfo' => $result
		);     
		$this -> load -> view('question',$data);

	}

	public function contact()
	{
    	$result1 = $this -> footer_model -> get_all();
		$result = $this -> contact_model -> get_all();

		$data = array(
			//尾部
			'footerInfo' => $result1,	
			'contactInfo' => $result
		);
		$this -> load -> view('contact', $data);

	}

	public function news()
	{
		$result2 = $this -> img_model -> get_all();
		$result3 = $this -> bargin_model -> get_all();

		$news_count = $this -> activity_model -> get_news_count();
        $offset = $this -> uri -> segment(3)==NULL?0 : $this -> uri -> segment(3);
        $this->load->library('pagination');
        $config['base_url'] = 'welcome/news';
        $config['total_rows'] = $news_count;
        $config['per_page'] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
        $config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
        $config['prev_link'] = '«';//上一页
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';//下一页
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';//每个数字页
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="'.$config['base_url'].'">';//当前页
        $config['cur_tag_close'] = '</a></li>';

        $this -> pagination -> initialize($config);

		$result = $this -> activity_model -> get_news_by_page($config['per_page'],$offset);
     
		
    	$result1 = $this -> footer_model -> get_all(); 
		//$result = $this -> activity_model -> get_all();
		$data = array(
			'barginInfo' => $result3,

			'imgs' => $result2,

				'footerInfo' => $result1,
			'activityInfo' => $result,
			'news_total' => $news_count
		);
 
		$this -> load -> view('news',$data);
	}


	public function article($activity_id)
	{
		$result3 = $this -> bargin_model -> get_all();
		$result2 = $this -> nav_model -> get_all();
		$result1 = $this -> footer_model -> get_all();
		$result = $this -> activity_model -> get_by_id($activity_id);
		$data = array(
				'barginInfo' => $result3,
				'navInfo' => $result2,
				'footerInfo' => $result1,
				'activity' => $result
		);
		$this -> load -> view('article', $data);
		//$this -> input -> get('activity_id');
		//$row = $this -> activity_model -> get_by_id($activity_id);
		//$this -> load -> view('article',array('activity' => $row));

	}
	public function bargin($bargin_id)
	{
		$result1 = $this -> footer_model -> get_all();
		$result2 = $this -> nav_model -> get_all();
		$result3 = $this -> activity_model -> get_all();
		$result = $this -> bargin_model -> get_by_id($bargin_id);
		$data = array(
				'activityInfo' => $result3,
				'navInfo' => $result2,
				'footerInfo' => $result1,
				'bargin' => $result
		);
		$this -> load -> view('bargin', $data);
		//$this -> input -> get('activity_id');
		//$row = $this -> activity_model -> get_by_id($activity_id);
		//$this -> load -> view('article',array('activity' => $row));

	}
//	public function english()
//	{
//		$result2 = $this -> nav_model -> get_all();
//		$result1 = $this -> footer_model -> get_all();
//		$result = $this -> activity_model -> get_by_id($activity_id);
//		$data = array(
//				'navInfo' => $result2,
//				'footerInfo' => $result1,
//				'activity' => $result
//		);
//		$this -> load -> view('article', $data);
//		//$this -> input -> get('activity_id');
//		//$row = $this -> activity_model -> get_by_id($activity_id);
//		//$this -> load -> view('article',array('activity' => $row));
//
//	}

}
