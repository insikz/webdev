<?php $this->load->view('user/pc/header/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>public/user/js/denial.js?v=20150511" ></script>
<form method="post" action="<?php echo base_url().'user/denial/denial_complete'?>" enctype="multipart/form-data" id="form_denial">
    <section class="section--main_content_area">
        <input type="hidden" name="ors_id" value="<?php echo $ors_id;?>"/>
        <div class="container cf">
            <div class="box_white">
                <section class="section--denial">
                    <div class="denial">
                        <h2 class="ttl_style_1">スカウトメール受信拒否設定</h2>
                        <p class="confirmation"><?php echo $storename; ?>を拒否しますか？</p>
                    </div>
                    <div class="select_btn">
                        <ul>
                            <li> <a class="ui_btn ui_btn--large ui_btn--line ui_btn--line_gray ui_btn--c_gray" href="javascript:void(0)" id="denial"><i class="fa fa-ban"></i> 拒否する</a> </li>
                            <li> <a class="ui_btn ui_btn--large ui_btn--line ui_btn--line_magenta ui_btn--c_magenta" href="javascript:void(0)" onClick="location.href='javascript:history.go(-1)'">やめる</a> </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </section>
</form>
