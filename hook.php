<?php


function plugin_meuplugin_item_update($item)
{

    if ($item instanceof Ticket) {
        $oldvalues = $item->oldvalues ?? [];
        if (isset($oldvalues['status']) && $item->fields['status'] != $oldvalues['status']) {

            $data = [
                'ticket_id'   => $item->fields['id'],
                'old_status'  => $oldvalues['status'],
                'new_status'  => $item->fields['status'],
                'updated_at'  => date('c'),
            ];

            $json = json_encode($data);

            $ch = curl_init(''); //YOUR URL WEBHOOK HERE
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json)
            ]);

            curl_exec($ch);
            curl_close($ch);
        }
    }
    return true;
}
