<script language="javascript">
$(document).ready(function(){
   $( "#txtLastLoginFrom" ).datepicker({ dateFormat: "yy/mm/dd" });
   $( "#txtLastLoginTo" ).datepicker({ dateFormat: "yy/mm/dd" });
   $( "#scout_date_start" ).datepicker({ dateFormat: "yy/mm/dd" });
   $( "#scout_date_end" ).datepicker({ dateFormat: "yy/mm/dd" });
   pagingByAjax();
})
</script>
<?php
    $SystemID = $this->input->post("txtSystemID");
    $UserName =  $this->input->post('txtUserName');
    $EmailAddress = $this->input->post("txtEmailAddress");
    $StoreName = null;
    $LastLoginFrom = $this->input->post('txtLastLoginFrom');
    $LastLoginTo = $this->input->post('txtLastLoginTo');
    $Note = $this->input->post('txtNote');
    $arrayEmail = $this->input->post('');
    $userStatus = $this->input->post('');
    $searchStatus = $this->input->post('sltStatusOfRegistration');
    $scout_date_start = $this->input->post('scout_date_start');
    $scout_date_end = $this->input->post('scout_date_end');
    $rec_money_range_start = $this->input->post('rec_money_range_start');
    $rec_money_range_end = $this->input->post('rec_money_range_end');
echo'<center>
<p>ユーザー検索項目</p>
<form name="input" action="'.base_url().'admin/mail/searchNewUser_after" method="POST">
<table border="0" cellspacing="10">
<tr>
<td ><p>システムID&nbsp;
<input type="text" name="txtSystemID" id="txtSystemID" size="40" value="'.$SystemID.'" maxlength="100"></p></td>
<td><p>氏名　&nbsp;
<input type="text" name="txtUserName" id="txtUserName" value ="'.$UserName.'"size="40" maxlength="100"></p></td>
</tr>

<tr>
<td><p>アドレス　&nbsp;
<input type="text" name="txtEmailAddress" id="txtEmailAddress" value="'.$EmailAddress.'" size="40" maxlength="200"></p></td>
</tr>

</table>

<p>
    最終ログイン&nbsp;
    <input class="txtdatePicker" type="text" name="txtLastLoginFrom" id="txtLastLoginFrom" value="'.$LastLoginFrom.'" size="40" maxlength="100">　〜　<input type="text" class="txtdatePicker" name="txtLastLoginTo" id="txtLastLoginTo" value="'.$LastLoginTo.'" size="40" maxlength="100">
</p>
<p>
    ジョイスペ認証日
    <input class="txtdatePicker" type="text" name="scout_date_start" id="scout_date_start" value="'; echo $scout_date_start; echo '" size="40" maxlength="100">　〜　<input type="text" class="txtdatePicker" name="scout_date_end" id="scout_date_end" value="'; if (isset($scout_date_end) && $scout_date_end) echo $scout_date_end; echo '" size="40" maxlength="100">
</p>
<p>
    これまでの累計報酬獲得金額
    <input type="text" name="rec_money_range_start" id="rec_money_range_start" value="'; if(isset($rec_money_range_start) && $rec_money_range_start) echo $rec_money_range_start; echo '" size="20"> 円
    〜
    <input type="text" name="rec_money_range_end" id="rec_money_range_end" value="'; if (isset($rec_money_range_end) && $rec_money_range_end) echo $rec_money_range_end; echo '" size="20"> 円
</p>
<p>メモ&nbsp;<input type="text" name="txtNote" id="txtNote" value="'.$Note.'" size="80" maxlength="200"></p>
登録状態　：
<select name="sltStatusOfRegistration" id="sltStatusOfRegistration">
<option value=""';if($searchStatus==null) echo 'selected="selected"'; echo '>選択して下さい</option>
<option value="0"';if($searchStatus!=null&&$searchStatus==0) echo 'selected="selected"'; echo '>仮登録</option>
<option value="1"';if($searchStatus!=null&&$searchStatus==1) echo 'selected="selected"'; echo '>本登録</option>
<option value="2"';if($searchStatus!=null&&$searchStatus==2) echo 'selected="selected"'; echo '>無効</option>
<option value="3"';if($searchStatus!=null&&$searchStatus==3) echo 'selected="selected"'; echo '>ステルス</option>
</select>
<p>ボーナス付与: 未 <input type="checkbox" name="bonus_grant" '; if(isset($bonus_grant) && $bonus_grant) echo  'checked'; echo '></p>
<p>まだログインしませんでした。: <input type="checkbox" name="last_login" '; if ($_POST) { echo $last_login ? 'checked' : ''; } echo '></p>
<p>ユーザー属性：Joyspe <input type="checkbox" value="0" name="user_from_site[]" '; if ($_POST) { if(isset($joyspe) && $joyspe == 0) { echo  'checked'; } } else { echo 'unchecked'; } echo '>
    マシェモバ <input type="checkbox" value="1" name="user_from_site[]" '; if ($_POST) { if(isset($machemobile) && $machemobile == 1) { echo  'checked'; } } else { echo 'checked'; } echo '>
    マキア  <input type="checkbox" value="2" name="user_from_site[]" '; if ($_POST) { if(isset($makia) && $makia == 2) { echo  'checked'; } } else { echo 'checked'; } echo '>
    あるある <input type="checkbox" value="3" name="user_from_site[]" '; if ($_POST) { if(isset($aruaru) && $aruaru == 3) { echo  'checked'; } } else { echo 'checked'; } echo '>
</p>
<p>※日付・入力形式（YYYY/MM/DD）※項目が空白の場合、全件表示が問題なければ全件表示</p>
<p>※検索後の結果は「配信OK」のみ表示される</p>
<p><input type="submit" name="btnSearchEmailUser" id="btnSearchEmailUser" value="   検索   " /></p>
<p><input type="hidden" name="new_newsletter_flag" value="true" /></p>';
echo'</form></center>';
echo'<form name="sendMail" action="'.base_url().'index.php/admin/mail/sendEmailUsersNew" method="POST">';
if(isset($info)){
    echo'<center>';
    echo '<p>合計件数：'.$totalRows.'</p>';
    echo '<input type="submit" name="btnSendEmail" id="btnSendEmail" value="メルマガ作成"';
    if ($totalRows ==0){
        echo 'disabled="disabled"';
    }
    echo '/><br><br>';
    echo'<table class="template1">';
      echo '<tr>
            <th width="15%">システムID </th>
            <th width="20%">状態</th>
            <th width="25%">氏名</th>
            <th width="13%">登録サイト</th>
            <th width="27%">アドレス</th>
        </tr>';
    foreach($info as $k=>$item){
        echo '<tr>
            <td>'.$item["unique_id"].'</td>';
        if($item["user_status"]==0){$userStatus="仮登録";}
        else if($item["user_status"]==1){$userStatus="本登録";}
        else if($item["user_status"]==2){$userStatus="無効";}
        else if($item["user_status"]==3){$userStatus="ステルス(非表示)";}
        echo '<td>'.$userStatus.'</td>
            <td>'.$item["userName"].'</td>
            <td>'.$item["websiteName"].'</td>
            <td>'.$item["email_address"].'</td>
        </tr>';
      }
        echo'</table>';
        echo '<div id="jquery_link_user" align="center">';
	echo $this->pagination->create_links();
	echo '</div>';
        echo'</center>';

}
if($listEmail!=null){
    foreach($listEmail as $k=>$item){
        if($k==0)$arrayEmail = $item["email_address"];
        else $arrayEmail = $arrayEmail.','.$item["email_address"];
    }
    echo '<input type="hidden" value="'.$arrayEmail.'" name="arrayEmail" />';
}
echo'</center>';
echo '</form>';
?>
