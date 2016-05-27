<?php 

Class Pagination {
	
	protected $app_url = '';
	
	protected $page = 1;
	
	protected $counts = 10;
	
	protected $total_counts;
	
	function Pagination(){
		
	}
	
	function initialization($data){
		
		foreach ($data as $key => $val)
		{
			if (property_exists($this, $key))
			{
				$this->$key = $val;
			}
		}
	}
	
	public function create_pagination($data){
		
		$this->initialization($data);
		
		if($this->total_counts == 0 || $this->total_counts == null){
			return '';
		}
		
		$this->page = (empty($this->page))?1:$this->page;
		$num_pages = (int) ceil($this->total_counts / $this->counts);
		$data_html = '<ul class="pagination">';
		
		if($this->page > 1){
			$data_html .= '<li><a href="'. $this->app_url .'/'.( $this->page - 1 ).'" data-value="'.( $this->page - 1 ).'"><i class="fa fa-angle-left"></i></a></li>';
		} else {
			$data_html .= '<li><a href="javascript:void(0)" class="inactive_pagi" data-value="0"><i class="fa fa-angle-left"></i></a></li>';
		}
		
		for($i = 1; $i <= $num_pages; $i++){
			$data_html .= '<li ';
			
			if( $this->page == '' && $i == 1) {
				$data_html .= 'class="active"';
			} else if( $this->page == $i ){
				$data_html .= 'class="active"';
			}
			
			$data_html .= '><a href="'. $this->app_url .'/'.$i.'" data-value="'. $i .'">'.$i.'</a></li>';
		}
		
		if($this->page < $num_pages){
			$data_html .= '<li><a href="'. $this->app_url .'/'.( $this->page + 1 ).'" data-value="'.( $this->page + 1 ).'"><i class="fa fa-angle-right"></i></a></li>';
		} else {
			$data_html .= '<li><a href="javascript:void(0)" class="inactive_pagi" data-value="0"><i class="fa fa-angle-right"></i></a></li>';
		}
		
		$data_html .= '</ul>';
		
		return $data_html; 
		
	}
	
	public function app_url($other = ''){
		
		if( $other != '' && $other != '/'){
			$url = 'http://'.HTTP_HOST.'/';
			
			if(INDEX_PAGE != ''){
				$url .= INDEX_PAGE.'/';
			}
			
			$url .= $other;
			
		} else {
			$url = 'http://'.HTTP_HOST;
			
			if(INDEX_PAGE != ''){
				$url .= '/'.INDEX_PAGE;
			}
		}
		
		return $url;
	}
	
}
?>