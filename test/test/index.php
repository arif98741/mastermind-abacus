<?php
session_start();
function generateToken()
{
    $request_data = [
        'app_key' => app_key,
        'app_secret' => app_secret,
        'refresh_token' => 'eyJjdHkiOiJKV1QiLCJlbmMiOiJBMjU2R0NNIiwiYWxnIjoiUlNBLU9BRVAifQ.RtRjJByggc63om-1sb0x0jZF-mbNCXj1XihZgzY7QUaeuKg1L6oRGsjLt7y0WzfocohBhaunyH5VRgK4vGvngXmMMwsCR4mD8a5Yg17T_qztnhwOBdXqKhLrVjEXnVZPFSspUZ4btrsFZUam6cNymTLmL5RZ2tXDla3H0qvKTkqbeb8MU7l2uqSV-ZdOM8p4xnA7WmvwLxcqFrYfEURAbXqgeMHnWOKxd2nqsA4vw_z2CTNr2Y8Zyheb4C3Z7HopSCw4mnPCwe1f_R1YinoFCaXk_wlAXhZg8Y24N0rJanSxpXUyMeiW5Iqoj2KVIaVsYG530MyN6RU535y9lrj_GA.c1kPwGz3xxvItERP.Xua_pxrb82N2LGu18MuCN73o7Oh1EnyjUP0xtzEdclREZVEYnkIzl_BfOBopZo5_ziYUFVJ-L79lY94IyzJF6dLLdOrUjh8SkYau9OAvsec4-L_98WudAn4t2hoC3kxXyblrs91Myc5b9_dGcMJCWpXTmHdP-FYxC0BWXpP-xoX0PgJvUuHTlP8MLHgY7c-wzRmuoT6nvry3FYHHT00mM0FUoy-V9qc2iuovMW8zdz-Od-LGrUB7OaWQ_h7meuw4xc70wL2eo0SgrNYUwi7W8zsIZTliEJXK0KNWfGXK0RErsJH_5c5f9uA7wvcgN8I0l3TPoACtjdb1bslTv9RIkremrGbV2y45_EG4-F88TabnQp9SB09VEOR2blqgKTnAaV4FjyEv6jK087feNzniGU92wYi3qrQyQMfT0yx5mE7OpbGPVLgX4eLMK6kzIZbofjW6aEsXes4FVQjKdub0JvfswYQ5aWJBL3MWLLVUTCqk-vaVWZa7lZx1eDX1CHXPlT9vSXCANUDUPUXjpX8fj56Xlx4Pr-0Vhk8RqZ1Mcb1jb99ibNrojXhc9mu5_7W4vlDD1lcdITH0gKf58GSA_fagmuDfH2EmhNNKDgIOud4wXX9xif-bVXorpfL8xlHaGeEbTihvjsfvGtts_06n5tYcGTABoIFWUPhaUZLwR9QoVKA5WLt1ex9NZa4upNn4T017J5pocqfOKO3xq4PPw43HOhHJcDbIVR3PeJenlLdrxQ2xUAZLmwm2jxGxaeSuZXTrq_o2ej0ldz6Ebc4SQ-uoFeGeWvuT5kISzbP7pqvIx_D1qjhG5UOoocOAdjVm2wrMW3Z7IGDBBn_QkU1-1P0Tcx32nI-Schsx2obEY3YkiLnxKd7AGZtzHlupasRtz1o3YbMUDkMDooRqc1l2pmcUPf_ZdS1eVC21TjWWJ2y_JVOh2z5skTGJg8L3kvFEUZW-4XWFI4tpTA2NW7D_xjxiBkQ1ziSsuYQmlEzu8VCQW_bgkX_zBk_BVvkY9pZJngtGCrOd_5r7tJT5QJPxlvEefZN8hk2TPDPLZ2WtEfFWPiZvxag2OEbyF9VVRkZpCutvgo0Mq2c7gosU-Qv4dKnk2amqzzhsB-l23fFm-hkAJXlMKvYUIAnXfOgo8ANRobp0eOmRor3Ta4TS7ihIfONohHEPQ4YvmzUf9M_08UB27LxIykNiL6C3tBAwcfmonjuCB4DPzksOGWtO73Aad3cygbKUFg0EHuFUk8ZALeYAsIdyt07T6uw610g-fZmWb0TRcz9K3SIhgRxcdHP00fKvE0NhDPfct074L-s.kh2vxbY1dATXZ3_5C4LRGA',
    ];
    $url = curl_init('https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/token/grant');
    $request_data_json = json_encode($request_data);
    $header = array(
        'Content-Type:application/json',
        'Accept:application/json',
        'username:sandboxTestUser',
        'password:hWD@8vtzw0'
    );
    curl_setopt($url, CURLOPT_HTTPHEADER, $header);
    curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url, CURLOPT_POSTFIELDS, $request_data_json);
    curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    $response = curl_exec($url);
    curl_close($url);
    echo $response; exit;
    $resultObject = json_decode($response, true);
    return $resultObject['id_token'];
}
