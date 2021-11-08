<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CronTest extends CI_Controller
{

    public function index()
    {
        $test = $this->db->get('cron_test')->result_array();

        foreach ($test as $t) {
            if ($t['date'] < date('Y-m-d')) {
                $test = [
                    'date' => date('Y-m-d')
                ];

                $this->db->insert('cron_test', $test);
            }
        }
    }
}
