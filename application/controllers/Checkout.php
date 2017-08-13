<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

/**
 * Created with ♥ by Verlikylos on 13.08.2017 22:50.
 * Visit www.verlikylos.pro for more.
 * Copyright © vMCShop 2017
*/

class Checkout extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function testrcon() {
        $this->load->helper('rcon_helper');

        rconCommand(array("broadcast chuj", "broadcast siema {PLAYER}"), "Verlikylos", "localhost", "25575", "darek124");

    }
    
    public function sms() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('smscode', 'smscode', 'required|trim');
        $this->form_validation->set_rules('serviceid', 'serviceid', 'required|trim');
        $this->form_validation->set_rules('servername', 'servername', 'required|trim');

        if ($this->form_validation->run() === TRUE) {
            $userName = $this->input->post('username');
            $smsCode = $this->input->post('smscode');
            $serviceId = $this->input->post('serviceid');
            $serverName = $this->input->post('servername');

            $this->load->model('ServicesModel');

            if (!$service = $this->ServicesModel->getByID($serviceId)) {
                $_SESSION['messageDanger'] = "Wystąpił błąd, spróbuj jeszcze raz!";
                redirect(base_url('shop?server=' . $serverName));
            }

            $this->load->model('ServersModel');

            if (!$server = $this->ServersModel->getByName($serverName)) {
                $_SESSION['messageDanger'] = "Wystąpił błąd, spróbuj jeszcze raz!";
                redirect(base_url('shop?server=' . $serverName));
            }

            $this->load->library('Minecraftquery');

            $q = new minecraftQuery();

            try {
                $q->connect($server['ip'], $server['query_port'], 3);
            } catch (minecraftQueryException $e) {
                $_SESSION['messageDanger'] = "Serwer, na którym próbujesz zakupić usługę jest aktualnie wyłączony. Zapraszamy później!";
                redirect(base_url('shop?server=' . $serverName));
            }

            $this->config->load('settings');

            $allow = false;

             if ($this->config->item('sms_operator') == "MicroSMS") {
                 $this->load->helper('payments/sms/microsms_helper');

                 $response = check($this->config->item('microsms_userid'), $service['sms_channel_id'], $service['sms_number'], $smsCode);

                 if (!$response['value']) {
                     $_SESSION['messageDanger'] = $response['message'];
                 } else {
                     $this->load->helper('smsnumbers_helper');

                     $allow = true;
                     $data['method'] = "SMS";
                     $data['info'] = "code:".$smsCode;
                     $data['profit'] = 0.45 * getPriceNetto($service['sms_number']);
                 }
             }

             if (!$allow) {
                 redirect(base_url('shop?server=' . $serverName));
             }

             $data['buyer'] = $userName;
             $data['service'] = $service['id'];
             $data['server'] = $server['id'];
             $data['date'] = time();

             $this->load->model('PurchasesModel');

             $this->PurchasesModel->add($data);

            $commands = explode(";", $service['commands']);

            $this->load->helper('rcon_helper');

            $rconResponse = rconCommand($commands, $userName, $server['ip'], $server['rcon_port'], $server['rcon_pass']);

            if ($rconResponse['value']) {
                $_SESSION['messageSuccess'] = "Usługa <strong>" . $service['name'] . "</strong> została pomyślnie zrealizowana!";
            } else {
                $_SESSION['messageDanger'] = 'Wystąpił błąd podczas łączenia się z serwerem. Zachowaj kod SMS i zgłoś się do Administratora!';
            }

            redirect(base_url('shop?server=' . $serverName));
        } else {
            if ($serverName = $this->input->post('servername')) {
                redirect(base_url('shop?server=' . $serverName));
            } else {
                redirect(base_url());
            }
        }
        
    }
}