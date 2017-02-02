<!--{*
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
*}-->



<table class="form">
	<!--{foreach from=$arrMasterData item=val key=key}-->
	<tr>
		<!--{if $TPL_PLG_ORDER_RETURN !== null && $TPL_PLG_ORDER_RETURN == $key}-->
		<th>ID：<input type="text" name="id[]" value="<!--{$key|h}-->" size="6" readonly="readonly" style="background-color: #d5e2c7;" /></th>
		<!--{else}-->
		<th>ID：<input type="text" name="id[]" value="<!--{$key|h}-->" size="6" /></th>
		<!--{/if}-->
		<td>値：<input type="text" name="name[]" value="<!--{$val|h}-->" style="" size="60" class="box60" /></td>
	</tr>
	<!--{/foreach}-->
</table>

