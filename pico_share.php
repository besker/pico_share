<?php
/**
 * Pico_share
 *
 * Adds a share button to your posts
 *
 * @author Bjoern Esker
 * @link https://github.com/besker/pico_share
 * @license http://opensource.org/licenses/MIT
 */
class Pico_share {

	private $is_homepage;
	private $url;
	private $prefix;

	public function config_loaded(&$settings) {
		$this->prefix = $settings['base_url'].'/plugins/pico_share/';
	}

	public function request_url(&$url) {
		$this->url = $url;
		$this->is_homepage = ($url == '') ? true : false;
	}

	public function before_render(&$twig_vars, &$twig, &$template) {
		if($this->is_homepage) {
		}
		else {
			$pre = '<script type="text/javascript" src="'.$this->prefix.'share.min.js"></script>';
			$post = '<script type="text/javascript">$(function(){ $(".share_button").share(); });</script>';

			$twig_vars["share_button"] = $pre.'<div class="share_button"></div>'.$post;
		}
	}
}
?>
