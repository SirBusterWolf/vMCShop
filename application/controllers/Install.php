<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

/**
 * Created with ♥ by Verlikylos on 14.08.2017 17:19.
 * Visit www.verlikylos.pro for more.
 * Copyright © vMCShop 2017
*/

class Install extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
		/*if (file_exists("application/install.txt")){
			redirect('/Home');
			return;
		}
		*/
        $this->benchmark->mark('code_start');
        $this->load->library('form_validation');
		
        /**  Head Section  */
        $header_data['page_title'] = $this->config->item('page_title') . " | Instalator";
        $this->load->view('components/Header', $header_data);
		
        /**  Body Section  */

        $this->load->view('Install');


        /**  Footer Section  */
        $this->benchmark->mark('code_end');
        $footer_data['benchmark'] = $this->benchmark->elapsed_time('code_start', 'code_end');
        $this->load->view('components/Footer', $footer_data);

    }
	
    public function step_mysql() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mysq_hostname', 'Hostname', 'required|trim');
        $this->form_validation->set_rules('mysq_username', 'Login', 'required|trim');
        $this->form_validation->set_rules('mysq_password', 'Hasło', 'required|trim');
		$this->form_validation->set_rules('mysq_database', 'Baza Danych', 'required|trim');
        if ($this->form_validation->run() === TRUE) {
			$hostname = $this->input->post('mysq_hostname');
            $database = $this->input->post('mysq_database');
            $login = $this->input->post('mysq_username');
            $pass = $this->input->post('mysq_password');
			$con = mysqli_connect($hostname,$login,$pass,$database);
			if (mysqli_connect_errno()){
			    $_SESSION['messageDanger'] = $hostname."/".$database."/".$login."/".$pass;
				redirect(base_url('install'));
			}else{
				require_once("application/install_addons/install_data.php");
				$dbc = array(
				'dsn'	=> '',
				'hostname' => $hostname,
				'username' => $login,
				'password' => $pass,
				'database' => $database,
				'dbdriver' => 'mysqli',
				'dbprefix' => '',
				'pconnect' => FALSE,
				'db_debug' => (ENVIRONMENT !== 'production'),
				'cache_on' => FALSE,
				'cachedir' => '',
				'char_set' => 'utf8',
				'dbcollat' => 'utf8_general_ci',
				'swap_pre' => '',
				'encrypt' => FALSE,
				'compress' => FALSE,
				'stricton' => FALSE,
				'failover' => array(),
				'save_queries' => TRUE);
				$db_config .= '$db[\'default\']='.var_export($dbc,true).';';
				
				$save_db = fopen("application/config/database.php", "w");
				fputs($save_db, $db_config);
				fclose($save_db);
				
				$save_autoload = fopen("application/config/autoload.php", "w");
				fputs($save_autoload, $db_autoload);
				fclose($save_autoload);
				
				$save_blockinstall = fopen("application/install.txt", "w");
				$time = date("Y.m.d g:i"); 
				fputs($save_blockinstall, $time);
				fclose($save_blockinstall);
				
				$templine = '';
				$lines = file("application/install_addons/database.sql");
				foreach ($lines as $line) {
					if (substr($line, 0, 2) == '--' || $line == '')
						continue;
					$templine .= $line;
					if (substr(trim($line), -1, 1) == ';') {
						mysqli_query($con,$templine);
						$templine = '';
					}
				}
				$_SESSION['step'] = "complete";
				redirect(base_url('install'));

			}
        } else {
            $_SESSION['messageDanger'] = "Proszę wypełnić wszystkie pola formularza logowania!";
            redirect(base_url('install'));
        }
		
    }
}