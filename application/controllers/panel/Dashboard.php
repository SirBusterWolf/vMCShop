<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

/**
 * Created with ♥ by Verlikylos on 25.06.2017 13:43.
 * Visit www.verlikylos.pro for more.
 * Copyright © vMCShop 2017
*/

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {

        if (!$this->session->userdata('logged')) redirect(base_url());

        /**  Head Section  */

        $header_data['page_title'] = $this->config->item('page_title') . " | Dashboard";

        $this->load->view('panel/components/Header', $header_data);


        /**  Body Section  */

        $this->load->model('ServersModel');
        $this->load->model('ServicesModel');
        $this->load->model('PurchasesModel');
        $this->load->model('User');
        $this->load->helper('date');

        $purchases = $this->PurchasesModel->getAll();
        $profit = 0;

        $todayTimestamp = time();
        $today = getOnlyDate($todayTimestamp);

        $yesterdayTimestamp = $todayTimestamp - 86400;
        $yesterday = getOnlyDate($yesterdayTimestamp);

        $twoDaysAgoTimestamp = $yesterdayTimestamp - 86400;
        $twoDaysAgo = getOnlyDate($twoDaysAgoTimestamp);

        $threeDaysAgoTimestamp = $twoDaysAgoTimestamp - 86400;
        $threeDaysAgo = getOnlyDate($threeDaysAgoTimestamp);

        $fourDaysAgoTimestamp = $threeDaysAgoTimestamp - 86400;
        $fourDaysAgo = getOnlyDate($fourDaysAgoTimestamp);

        $fiveDaysAgoTimestamp = $fourDaysAgoTimestamp - 86400;
        $fiveDaysAgo = getOnlyDate($fiveDaysAgoTimestamp);

        $sixDaysAgoTimestamp = $fiveDaysAgoTimestamp - 86400;
        $sixDaysAgo = getOnlyDate($sixDaysAgoTimestamp);

        $todayPurchases = array();
        $yesterdayPurchases = array();
        $twoDaysAgoPurchases = array();
        $threeDaysAgoPurchases = array();
        $fourDaysAgoPurchases = array();
        $fiveDaysAgoPurchases = array();
        $sixDaysAgoPurchases = array();

        foreach ($purchases as $purchase) {
            $profit += $purchase['profit'];

            if (getOnlyDate($purchase['date']) == $today) array_push($todayPurchases, $purchase);
            if (getOnlyDate($purchase['date']) == $yesterday) array_push($yesterdayPurchases, $purchase);
            if (getOnlyDate($purchase['date']) == $twoDaysAgo) array_push($twoDaysAgoPurchases, $purchase);
            if (getOnlyDate($purchase['date']) == $threeDaysAgo) array_push($threeDaysAgoPurchases, $purchase);
            if (getOnlyDate($purchase['date']) == $fourDaysAgo) array_push($fourDaysAgoPurchases, $purchase);
            if (getOnlyDate($purchase['date']) == $fiveDaysAgo) array_push($fiveDaysAgoPurchases, $purchase);
            if (getOnlyDate($purchase['date']) == $sixDaysAgo) array_push($sixDaysAgoPurchases, $purchase);
        }

        if (getDayNumber($todayTimestamp) == 7) {
            $footerData['chartValues'] = count($sixDaysAgoPurchases) . ", " . count($fiveDaysAgoPurchases) . ", " . count($fourDaysAgoPurchases) . ", " . count($threeDaysAgoPurchases) . ", " . count($twoDaysAgoPurchases) . ", " . count($yesterdayPurchases) . ", " . count($todayPurchases);
            $higest = max(count($todayPurchases), count($yesterdayPurchases), count($twoDaysAgoPurchases), count($threeDaysAgoPurchases), count($fourDaysAgoPurchases), count($fiveDaysAgoPurchases), count($sixDaysAgoPurchases));
        }
        if (getDayNumber($todayTimestamp) == 6) {
            $footerData['chartValues'] = count($fiveDaysAgoPurchases) . ", " . count($fourDaysAgoPurchases) . ", " . count($threeDaysAgoPurchases) . ", " . count($twoDaysAgoPurchases) . ", " . count($yesterdayPurchases) . ", " . count($todayPurchases);
            $higest = max(count($todayPurchases), count($yesterdayPurchases), count($twoDaysAgoPurchases), count($threeDaysAgoPurchases), count($fourDaysAgoPurchases), count($fiveDaysAgoPurchases));
        }
        if (getDayNumber($todayTimestamp) == 5) {
            $footerData['chartValues'] = count($fourDaysAgoPurchases) . ", " . count($threeDaysAgoPurchases) . ", " . count($twoDaysAgoPurchases) . ", " . count($yesterdayPurchases) . ", " . count($todayPurchases);
            $higest = max(count($todayPurchases), count($yesterdayPurchases), count($twoDaysAgoPurchases), count($threeDaysAgoPurchases), count($fourDaysAgoPurchases));
        }
        if (getDayNumber($todayTimestamp) == 4) {
            $footerData['chartValues'] = count($threeDaysAgoPurchases) . ", " . count($twoDaysAgoPurchases) . ", " . count($yesterdayPurchases) . ", " . count($todayPurchases);
            $higest = max(count($todayPurchases), count($yesterdayPurchases), count($twoDaysAgoPurchases), count($threeDaysAgoPurchases));
        }
        if (getDayNumber($todayTimestamp) == 3) {
            $footerData['chartValues'] = count($twoDaysAgoPurchases) . ", " . count($yesterdayPurchases) . ", " . count($todayPurchases);
            $higest = max(count($todayPurchases), count($yesterdayPurchases), count($twoDaysAgoPurchases));
        }
        if (getDayNumber($todayTimestamp) == 2) {
            $footerData['chartValues'] = count($yesterdayPurchases) . ", " . count($todayPurchases);
            $higest = max(count($todayPurchases), count($yesterdayPurchases));
        }
        if (getDayNumber($todayTimestamp) == 1) {
            $footerData['chartValues'] = count($todayPurchases);
            $higest = count($todayPurchases);
        }

        if (in_array($higest, array(0, 1, 2, 3, 4))) {
            $footerData['chartHigest'] = 5;
        } else {
            $footerData['chartHigest'] = round(($higest * 1.3), 2);
        }

        $yesterdayTransactions = count($yesterdayPurchases);
        $todayTransactions = count($todayPurchases);

        if (($todayTransactions == 0) && ($yesterdayTransactions == 0)) {
            $bodyData['percentTransactions'] = 0;
        } else if ($todayTransactions == 0) {
            $bodyData['percentTransactions'] = -100;
        } else if ($yesterdayTransactions == 0) {
            $bodyData['percentTransactions'] = 100;
        } else {
            $bodyData['percentTransactions'] = round((($todayTransactions * 100) / $yesterdayTransactions) - 100, 0);
        }

        $bodyData['profit'] = number_format(round($profit, 2), 2, ',', ' ');

        $bodyData['serversCount'] = $this->ServersModel->count();
        $bodyData['purchasesCount'] = $this->PurchasesModel->count();
        $bodyData['usersCount'] = $this->User->count();

        $this->load->library('Minecraftquery');

        $servers = $this->ServersModel->getAll();
        $bodyData['servers'] = array();
        $bodyData['purchases'] = array();

        foreach ($servers as $server) {
            $q = new minecraftQuery();

            try {
                $q->connect($server['ip'], $server['query_port'], 3);

                if ($q->isOnline()) {
                    $server['status'] = $q->getInfo();
                }

            } catch (minecraftQueryException $e) {
                // echo $e->getMessage();
            }

            array_push($bodyData['servers'], $server);

            $serverPurchases = $this->PurchasesModel->getForServerLimit($server['id'], 5);

            foreach ($serverPurchases as $purch) {
                array_push($bodyData['purchases'], $purch);
            }

            $bodyData['services'] = $this->ServicesModel->getAll();
        }

        $this->load->view('panel/Dashboard', $bodyData);


        /**  Footer Section  */

        $this->load->view('panel/components/Footer', $footerData);
        
    }
}