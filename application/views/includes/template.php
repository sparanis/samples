<?php 
	$this->load->view('includes/header', @$data);
	$this->load->view(@$file);
	$this->load->view('includes/footer');
?>