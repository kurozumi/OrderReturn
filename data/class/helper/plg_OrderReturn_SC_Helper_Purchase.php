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

require_once CLASS_REALDIR . 'helper/SC_Helper_Purchase.php';

/**
 * 商品購入関連のヘルパークラス(拡張).
 *
 * LC_Helper_Purchase をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Helper
 * @author Kentaro Ohkouchi
 * @version $Id$
 */
class plg_OrderReturn_SC_Helper_Purchase extends SC_Helper_Purchase
{
    /**
     * ポイント使用するかの判定
     *
     * $status が null の場合は false を返す.
     *
     * @param  integer $status 対応状況
     * @return boolean 使用するか(会員テーブルから減算するか)
     */
    public function isUsePoint($status)
    {
        if ($status == null) {
            return false;
        }
        switch ($status) {
            case ORDER_CANCEL:      // キャンセル
            case PLG_ORDER_RETURN:  // 返品

                return false;
            default:
                break;
        }

        return true;
    }
}
