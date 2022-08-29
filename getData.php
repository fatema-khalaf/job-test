<?php
$result_url = file_get_contents("https://b24-kejfq7.bitrix24.com/rest/1/jt5285xhp3zdbe05/crm.lead.list.json");
$data = json_decode($result_url);

function getDetails($id)
{
    $result_url = file_get_contents("https://b24-kejfq7.bitrix24.com/rest/1/jt5285xhp3zdbe05/crm.lead.get.json?ID=" . $id);
    $data = json_decode($result_url);

    return [
        "JENDER" => $data->result->UF_CRM_1661669651915,
        "EDUCATION" => $data->result->UF_CRM_1661669458993,
        "EMAIL" => $data->result->EMAIL[0]->VALUE,
        "PHONE" => $data->result->PHONE[0]->VALUE
    ];
}

function getEnum($value,  $id)
{
    $result_url = file_get_contents("https://b24-kejfq7.bitrix24.com/rest/1/jt5285xhp3zdbe05/crm.lead.fields.json");
    $data = json_decode($result_url);
    foreach ($data->result->$value->items as $i) {
        if ($i->ID === $id) {
            return $i->VALUE;
        };
    }
}

foreach ($data->result as $item) {
    $details = getDetails($item->ID);
    $item->Email = $details['EMAIL'];
    $item->PHONE = $details['PHONE'];
    $item->EDUCATION = $details['EDUCATION'];
    $item->JENDER = $details['JENDER'];
}
// var_dump($data->result);
echo (json_encode($data->result));