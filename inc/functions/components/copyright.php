<?php //The copyright information

if (!function_exists('copyright')){
	function copyright(){
		
		$html = '<div class="copyright-wrapper">';
		$html .= '<p class="site-copyright">Copyright &copy;' .date('Y'). '. All Rights Reserved ' . get_bloginfo('title'). '</p>';
		$html .= '<p class="site-copyright">Designed and developed by ';
		$html .= jwd_get_link('http://www.dolcemedia.ca/', 'Dolce Media Group');
		$html .= '</p>';
		$html .= '</div>';
		echo $html;
			
	}
}