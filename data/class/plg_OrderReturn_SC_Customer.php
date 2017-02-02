<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2014 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

require_once CLASS_REALDIR . 'SC_Customer.php';

class plg_OrderReturn_SC_Customer extends SC_Customer
{
    /**
     * 受注関連の会員情報を更新
     * 
     * @param type $customer_id
     */
    public function updateOrderSummary($customer_id)
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();

        $col = <<< __EOS__
            SUM( payment_total) AS buy_total,
            COUNT(order_id) AS buy_times,
            MAX( create_date) AS last_buy_date,
            MIN(create_date) AS first_buy_date
__EOS__;
        $table = 'dtb_order';
        $where = 'customer_id = ? AND del_flg = 0 AND status NOT IN (?, ?)';
        $arrWhereVal = array($customer_id, ORDER_CANCEL, PLG_ORDER_RETURN);
        $arrOrderSummary = $objQuery->getRow($col, $table, $where, $arrWhereVal);

        $objQuery->update('dtb_customer', $arrOrderSummary, 'customer_id = ?', array($customer_id));
    }
}
