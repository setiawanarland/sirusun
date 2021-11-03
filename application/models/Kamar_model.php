<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model {

	public function getKamar($rusun_id) {

		$rusun_id = $rusun_id;

		$queryKamar = "SELECT `lantai`.`id`, `lantai`.`nama_lantai`, `lantai`.`harga_lantai`,  `kamar`.* 
					   FROM `kamar`
					   JOIN `lantai`
					   ON `kamar`.`lantai_id` = `lantai`.`id` 
					   WHERE `kamar`.`rusun_id` = $rusun_id";
		$kamar = $this->db->query($queryKamar)->result_array();

		$queryTotalKamar = "SELECT COUNT(`kamar`.`rusun_id`) AS kamar, `rusun`.* 
						    FROM `rusun` 
				   	        INNER JOIN `kamar` 
						    ON `rusun`.`id` = `kamar`.`rusun_id`
						    WHERE `kamar`.`rusun_id` = $rusun_id";
		$totalKamar = $this->db->query($queryTotalKamar)->row_array();

		$data = '<div class="card-header">
                        <h4 class="card-title">Total Kamar : '. $totalKamar['kamar'] .' </h4>    
                    </div>

                    <div class="card-body">
                        <div class="row">
                        </div>

                    <div class="table-responsive mt-4">

		                <table class="table table-striped table-responsive-sm">
		                    <thead>
		                        <tr>
		                            <th>#</th>
		                            <th>No. Kamar</th>
		                            <th>Lantai</th>
		                            <th>Harga Kamar</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>
		                <tbody>';

        $i = 1;
        
        foreach ($kamar as $kmr) {

        	$data .= '<tr>
        				<th>'. $i .'</th>
                        <td>'. $kmr['no_kamar'] .'</td>
                        <td>'. $kmr['nama_lantai'] .'</td>
                        <td>'. rupiah($kmr['harga_lantai']) .'</td>
                        <td>
                        	<a href="'. base_url('admin/editkamar/'. $kmr['id']) .'" data-toggle="tooltip" class="btn btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                        	<a href="'. base_url('admin/deletekamar/'. $kmr['id']) .'" data-toggle="tooltip" class="btn btn-danger btn-del" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>';
        	$i++;

        }

        return $data;
	}

	public function getLantai($rusun_id) {

		$rusun_id = $rusun_id;

		$queryLantai = "SELECT * FROM `lantai` WHERE `rusun_id` = $rusun_id";
		$lantai = $this->db->query($queryLantai)->result_array();

		$queryTotalLantai = "SELECT COUNT(`lantai`.`rusun_id`) AS lantai, `rusun`.* 
						    FROM `rusun` 
				   	        INNER JOIN `lantai` 
						    ON `rusun`.`id` = `lantai`.`rusun_id`
						    WHERE `lantai`.`rusun_id` = $rusun_id";
		$totalLantai = $this->db->query($queryTotalLantai)->row_array();

		$data = '<div class="card-header">
                        <h4 class="card-title">Total Kamar : '. $totalLantai['lantai'] .' </h4>    
                    </div>

                    <div class="card-body">
                        <div class="row">
                        </div>

                    <div class="table-responsive mt-4">

		                <table class="table table-striped table-responsive-sm">
		                    <thead>
		                    	<tr>
		                            <th>#</th>
		                            <th>Lantai</th>
		                            <th>Harga Lantai</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>
		                <tbody>';

        $i = 1;
        
        foreach ($lantai as $lnt) {

        	$data .= '<tr>
        				<th>'. $i .'</th>
                        <td>'. $lnt['nama_lantai'] .'</td>
                        <td>'. rupiah($lnt['harga_lantai']) .'</td>
                        <td>
                        	<a href="'. base_url('admin/editlantai/'. $lnt['id']) .'" data-toggle="tooltip" class="btn btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                        	<a href="'. base_url('admin/deletelantai/'. $lnt['id']) .'" data-toggle="tooltip" class="btn btn-danger btn-del" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>';
        	$i++;

        }

        return $data;
	}


}