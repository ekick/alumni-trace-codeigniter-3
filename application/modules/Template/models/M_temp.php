<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_temp extends MY_Controller
{
    private function get_role()
    {
        $user = $this->session->userdata('user');
        return $user['role_id'];
    }

    public function menu()
    {
        $role = $this->get_role();

        $query_menu =  "SELECT `user_menu`.`id_menu`, `nama`, `icon`
                        FROM `user_menu` JOIN `user_access_menu`
                        ON `user_menu`.`id_menu` = `user_access_menu`.`id_menu`
                        WHERE `user_access_menu`.`id_role` = '".$role."'
                        AND `user_menu`.`is_activated` = '1'
                        ORDER BY `user_access_menu`.`id_menu` ASC
                        ";
        return $menu = $this->db->query($query_menu)->result_array();
    }
}