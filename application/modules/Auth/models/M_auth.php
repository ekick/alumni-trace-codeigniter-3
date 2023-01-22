<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends MY_Controller
{
    public function cek_user($nis, $password)
    {
        $role = $this->db->query("SELECT id_role  FROM user WHERE kd = md5('". $nis ."')")->row_array();
        $valid_pass = $this->db->query("SELECT IF((katasandi = '". $password ."'),'TRUE','FALSE') AS pass FROM user WHERE kd = md5('". $nis ."')")->row_array();
        

        switch ($role['id_role']) {
            case 1:
                if ($valid_pass['pass'] == 'TRUE') {
                    $user = $this->db->query("SELECT o.nama FROM t_operator o LEFT JOIN user u ON o.kd = u.kd WHERE u.kd = md5('". $nis ."') ")->row_array();
                    $user['role_id'] = $role['id_role'];
                    return $user;
                } else {
                    $error['pass'] = 'FALSE';
                    return $error;
                }
                break;

            case 2:
                if ($valid_pass['pass'] == 'TRUE') {
                    $user = $this->db->query("SELECT * FROM t_siswa WHERE md5(nis) = md5('". $nis ."') ")->row_array();
                    $user['role_id'] = $role['id_role'];
                    return $user;
                } else {
                    $error['pass'] = 'FALSE';
                    return $error;
                }
                break;
            
            default:
                $error['nis'] = 'FALSE';
                return $error;
                break;
        }

        // return $this->db->query("SELECT kd, id_role,email FROM v_user WHERE email = '". $email ."' AND password = md5('". $password ."') ")->row();
    }

}