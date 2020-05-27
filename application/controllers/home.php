<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		// $this->load->library('productList');
		$this->load->model('crud_mdl');
	}

	public function index()
	{
		$this->page();
	}

	private function load_header_data(){
		$this->load->library('headerData');
		$this->load->model('crud_mdl');

		$data = new HeaderData();
		$data->category_rows = $this->crud_mdl->fetch_all('category');
		return $data;
	}

	public function latest_product(){
		$data = array(
           'title' => 'Ultimos productos',
           'products' => $this->crud_mdl->fetch_all('product'),
           'pb28' => 'pb-28',
           'icon' => 'fa fa-book',
           'label' => null
        ); 
		return $data;
	}

	public function new_articles(){
		$data = array(
           'title' => 'Nuevos artículos',
           'products' => $this->crud_mdl->fetch_all('product'),
           'pb28' => 'pb-28',
           'icon' => 'fa fa-bookmark',
           'link_page' => '#',
           'label' => 'new'
        ); 
		return $data;
	}

	/**
	 * Animes en estreno
	 * @return [type] [description]
	 */
	public function premiere_anime(){
		$data = array(
           'title' => 'Animes en estreno',
           'products' => $this->crud_mdl->fetch_all('product'),
           'pb28' => 'pb-28',
           'icon' => 'fa fa-flash',
           'link_page' => '#'
        ); 
		return $data;
	}

	/**
	 * Doremas en estreno
	 * @return [type] [description]
	 */
	public function premiere_drama(){
		$data = array(
           'title' => 'Dramas en estreno',
           'products' => $this->crud_mdl->fetch_all('product'),
           'pb28' => 'pb-28',
           'icon' => 'fa fa-bookmark'
        ); 
		return $data;
	}

	
	public function page($page = 'home'){
		$categoryClass = 'hm-1';
		$brandClass = 'pt-28 pb-30';
		$feature_product = array();
		$latest_product = array();
		$premiere_anime = array();
		$premiere_drama = array();
		$new_articles = array();

		switch ($page) {
			case 'home':
				$categoryClass = 'hm-1';
				$brandClass = 'pt-28 pb-30';
				$feature_product = $this->latest_product();
				$latest_product = $this->latest_product();
				$premiere_anime = $this->premiere_anime();
				$premiere_drama = $this->premiere_drama();
				$new_articles = $this->new_articles();
				break;		 	
			case 'product_details':
				$categoryClass = 'category-style-2';
				$brandClass = 'pt-28 pb-30 pt-md-14 pt-sm-14';
				break;		 	
		}

		// Header data
		$header_data = $this->load_header_data();

		// Footer data
		$this->load->library('footerData');
		$footer_data = new FooterData();

		// Brand images
		$brand_images = array('br1.png', 'br2.png', 'br3.png', 'br4.png', 'br5.png', 'br6.png');

		$data = array(
			'page' => $page,
			'categoryClass' => $categoryClass,
			'brandClass' => $brandClass,
			'header_data' => $header_data,
			'brand_images' => $brand_images,
			'footer_data' => $footer_data,
			'pb36' => 'pb-36',
			'feature_product' => $feature_product,
			'latest_product' => $latest_product,
			'premiere_anime' => $premiere_anime,
			'premiere_drama' => $premiere_drama,
			'new_articles' => $new_articles
		);

		$this->load->view('index', $data);
	}

}
