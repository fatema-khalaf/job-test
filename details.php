<?php
$ID = $_REQUEST["ID"];
$result_url = file_get_contents("https://b24-kejfq7.bitrix24.com/rest/1/jt5285xhp3zdbe05/crm.lead.get.json?ID=" . $ID);
$data = json_decode($result_url);

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

echo (" <div><h4> TITLE:</h4><p>" . $data->result->TITLE . "</p><hr></div>");
echo (" <div><h4> Full Name:</h4><p>" . $data->result->NAME . ' ' . $data->result->SECOND_NAME . ' ' . $data->result->LAST_NAME . "</p><hr></div>");
echo (" <div><h4> HONORIFIC:</h4><p>" . $data->result->HONORIFIC . "</p><hr></div>");
echo (" <div><h4> COMPANY TITLE:</h4><p>" . $data->result->COMPANY_TITLE . "</p><hr></div>");
echo (" <div><h4> EDUCATION :</h4><p>" . getEnum('UF_CRM_1661669458993', $data->result->UF_CRM_1661669458993) . "</p><hr></div>");
echo (" <div><h4> JENDER:</h4><p>" . getEnum('UF_CRM_1661669651915',  $data->result->UF_CRM_1661669651915) . "</p><hr></div>");
echo (" <div><h4> COMPANY ID:</h4><p>" . $data->result->COMPANY_ID . "</p><hr></div>");
echo (" <div><h4> CONTACT ID:</h4><p>" . $data->result->CONTACT_ID . "</p><hr></div>");
echo (" <div><h4> IS RETURN CUSTOMER:</h4><p>" . $data->result->IS_RETURN_CUSTOMER . "</p><hr></div>");
echo (" <div><h4> BIRTHDATE:</h4><p>" . $data->result->BIRTHDATE . "</p><hr></div>");
echo (" <div><h4> SOURCE ID:</h4><p>" . $data->result->SOURCE_ID . "</p><hr></div>");
echo (" <div><h4> SOURCE DESCRIPTION:</h4><p>" . $data->result->SOURCE_DESCRIPTION . "</p><hr></div>");
echo (" <div><h4> STATUS ID:</h4><p>" . $data->result->STATUS_ID . "</p><hr></div>");
echo (" <div><h4> POSITION:</h4><p>" . $data->result->POST . "</p><hr></div>");
echo (" <div><h4> STATUS DESCRIPTION:</h4><p>" . $data->result->STATUS_DESCRIPTION . "</p><hr></div>");
echo (" <div><h4> COMMENTS:</h4><p>" . $data->result->COMMENTS . "</p><hr></div>");
echo (" <div><h4> CURRENCY ID:</h4><p>" . $data->result->CURRENCY_ID . "</p><hr></div>");
echo (" <div><h4> OPPORTUNITY:</h4><p>" . $data->result->OPPORTUNITY . "</p><hr></div>");
echo (" <div><h4> IS MANUAL OPPORTUNITY:</h4><p>" . $data->result->IS_MANUAL_OPPORTUNITY . "</p><hr></div>");
echo (" <div><h4> HAS PHONE:</h4><p>" . $data->result->HAS_PHONE . "</p><hr></div>");
echo (" <div><h4> HAS EMAIL:</h4><p>" . $data->result->HAS_EMAIL . "</p><hr></div>");
echo (" <div><h4> HASIMOL:</h4><p>" . $data->result->HAS_IMOL . "</p><hr></div>");
echo (" <div><h4> ASSIGNED BY ID:</h4><p>" . $data->result->ASSIGNED_BY_ID . "</p><hr></div>");

echo (" <div><h4> CREATED BY ID:</h4><p>" . $data->result->CREATED_BY_ID . "</p><hr></div>");
echo (" <div><h4> MODIFY BY ID:</h4><p>" . $data->result->MODIFY_BY_ID . "</p><hr></div>");
echo (" <div><h4> DATE CREATE:</h4><p>" . $data->result->DATE_CREATE . "</p><hr></div>");
echo (" <div><h4> DATE MODIFY:</h4><p>" . $data->result->DATE_MODIFY . "</p><hr></div>");
echo (" <div><h4> DATE CLOSED:</h4><p>" . $data->result->DATE_CLOSED . "</p><hr></div>");
echo (" <div><h4> STATUS SEMANTIC ID:</h4><p>" . $data->result->STATUS_SEMANTIC_ID . "</p><hr></div>");
echo (" <div><h4> OPENED:</h4><p>" . $data->result->OPENED . "</p><hr></div>");
echo (" <div><h4> ORIGINATOR ID:</h4><p>" . $data->result->ORIGINATOR_ID . "</p><hr></div>");
echo (" <div><h4> ORIGIN ID:</h4><p>" . $data->result->ORIGIN_ID . "</p><hr></div>");
echo (" <div><h4> MOVED BY ID:</h4><p>" . $data->result->MOVED_BY_ID . "</p><hr></div>");

echo (" <div><h4> MOVED_TIME:</h4><p>" . $data->result->MOVED_TIME . "</p><hr></div>");
echo (" <div><h4> ADDRESS:</h4><p>" . $data->result->ADDRESS . "</p><hr></div>");
echo (" <div><h4> ADDRESS_2:</h4><p>" . $data->result->ADDRESS_2 . "</p><hr></div>");
echo (" <div><h4> ADDRESS_CITY:</h4><p>" . $data->result->ADDRESS_CITY . "</p><hr></div>");
echo (" <div><h4> ADDRESS_POSTAL_CODE:</h4><p>" . $data->result->ADDRESS_POSTAL_CODE . "</p><hr></div>");
echo (" <div><h4> ADDRESS_REGION:</h4><p>" . $data->result->ADDRESS_REGION . "</p><hr></div>");
echo (" <div><h4> ADDRESS_PROVINCE:</h4><p>" . $data->result->ADDRESS_PROVINCE . "</p><hr></div>");
echo (" <div><h4> ADDRESS_COUNTRY:</h4><p>" . $data->result->ADDRESS_COUNTRY . "</p><hr></div>");
echo (" <div><h4> ADDRESS_COUNTRY_CODE:</h4><p>" . $data->result->ADDRESS_COUNTRY_CODE . "</p><hr></div>");
echo (" <div><h4> ADDRESS_LOC_ADDR_ID:</h4><p>" . $data->result->ADDRESS_LOC_ADDR_ID . "</p><hr></div>");
echo (" <div><h4> UTM_SOURCE:</h4><p>" . $data->result->UTM_SOURCE . "</p><hr></div>");
echo (" <div><h4> UTM_MEDIUM:</h4><p>" . $data->result->UTM_MEDIUM . "</p><hr></div>");
echo (" <div><h4> UTM_CAMPAIGN:</h4><p>" . $data->result->UTM_CAMPAIGN . "</p><hr></div>");
echo (" <div><h4> UTM_CONTENT:</h4><p>" . $data->result->UTM_CONTENT . "</p><hr></div>");
echo (" <div><h4> UTM_TERM:</h4><p>" . $data->result->UTM_TERM . "</p><hr></div>");
echo (" <div><h4> UTM_CAMPAIGN:</h4><p>" . $data->result->UTM_CAMPAIGN . "</p><hr></div>");