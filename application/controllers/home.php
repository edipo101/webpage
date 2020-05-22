<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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

	public function page($page = 'home'){
		switch ($page) {
			case 'home':
				$categoryClass = 'hm-1';
				$brandClass = 'pt-28 pb-30';
				break;		 	
			case 'product_details':
				$categoryClass = 'category-style-2';
				$brandClass = 'pt-28 pb-30 pt-md-14 pt-sm-14';
				break;		 	
			default:
				$categoryClass = 'hm-1';
				$brandClass = 'pt-28 pb-30';
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
			'footer_data' => $footer_data
		);

		$this->load->view('index', $data);
	}

}
