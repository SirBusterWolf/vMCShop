<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

/**
 * Created with ♥ by Verlikylos on 10.08.2017 23:57.
 * Visit www.verlikylos.pro for more.
 * Copyright © vMCShop 2017
*/

class Purchases extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {

        if (!$this->session->userdata('logged')) redirect(base_url());

        /**  Head Section  */

        $header_data['page_title'] = $this->config->item('page_title') . " | Newsy";

        $this->load->view('panel/components/Header', $header_data);


        /**  Body Section  */

        $this->load->model('PurchasesModel');
        $this->load->model('ServersModel');
        $this->load->model('ServicesModel');
        $this->load->helper('date_helper');

        $purchases = $this->PurchasesModel->getAll();
        $servers = $this->ServersModel->getAll();
        $services = $this->ServicesModel->getAll();
        $purchases2 = array();
        $bodyData['purchases'] = array();

        foreach ($servers as $server) {

            foreach ($purchases as $purchase) {
                if ($purchase['server'] == $server['id']) {
                    $purchase['server'] = $server['name'];
                    if (strpos($purchase['info'], 'code:') !== false) $purchase['info'] = str_replace("code:", "Kod z SMS: ", $purchase['info']);
                    if (strpos($purchase['info'], 'voucher:') !== false) $purchase['info'] = str_replace("voucher:", "Kod vouchera: ", $purchase['info']);
                    if ($purchase['method'] == "SMS") $purchase['method'] = "<span class='label label-warning'>SMS Premium</span>";
                    if ($purchase['method'] == "PayPal") $purchase['method'] = "<span class='label label-info'>PayPal</span>";
                    if ($purchase['method'] == "Voucher") $purchase['method'] = "<span class='label label-danger'>Voucher</span>";
                    array_push($purchases2, $purchase);
                }
            }

        }

        foreach ($services as $service) {

            foreach ($purchases2 as $purchase) {
                if ($purchase['service'] == $service['id']) {
                    $purchase['service'] = $service['name'];
                    array_push($bodyData['purchases'], $purchase);
                }
            }

        }



        $this->load->view('panel/Purchases', $bodyData);


        /**  Footer Section  */

        $this->load->view('panel/components/Footer');

    }
}