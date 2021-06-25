<?php

namespace App\Http\Controllers;

use \RouterOS\Client;
use \RouterOS\Query;
use Illuminate\Http\Request;
use App\Models\ApManagement;


class CommandController extends Controller
{
    //
    public function getAllIpAdress($id)
    {
        $ap = ApManagement::find($id);

        $client = new Client([
            'host' => $ap->ap_ip_address,
            'user' => $ap->ap_username,
            'pass' => $ap->ap_password
        ]);

        $query = new Query('/ip/address/print');

        $response = $client->query($query)->read();

        return json_encode($response);
    }

    public function getInterfacePrint($id)
    {
        $ap = ApManagement::find($id);

        $client = new Client([
            'host' => $ap->ap_ip_address,
            'user' => $ap->ap_username,
            'pass' => $ap->ap_password
        ]);

        $query = new Query('/interface/getall');

        $response = $client->query($query)->read();

        return json_encode($response);
    }

    public function getMonitoring($id)
    {
        $ap = ApManagement::find($id);

        $client = new Client([
            'host' => $ap->ap_ip_address,
            'user' => $ap->ap_username,
            'pass' => $ap->ap_password
        ]);

        $query = (new Query('/interface/monitor-traffic'))
            ->equal('interface', 'ether1')
            ->equal('once');

        $response = $client->query($query)->read();

        return json_encode($response);
    }

    {

        return json_encode($response);
    }

}
