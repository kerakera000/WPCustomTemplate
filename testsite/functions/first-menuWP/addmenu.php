<?php
    add_action('admin_menu', 'custom_menu_page');
    function custom_menu_page()
    {
        add_menu_page('共通設定画面', '共通設定', 'manage_options', 'custom_menu_page', 'add_custom_menu_page', 'dashicons-admin-generic', 4);
        add_action('admin_init', 'register_custom_setting');
    }
    function add_custom_menu_page()
    {
?>
<div class="wrap">
  <h2>設定画面</h2>
  <form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>
    <div class="metabox-holder" style="width: 100%;">
        <div class="postbox">
            <h3 class='hndle'>
                <span class="title">KV</span>
            </h3>
            <div class="inside">
                <div class="main" style="display: flex; width: 100%; gap:2rem;">
                    <div class="col50">
                        <h4 class="sub-title">サブタイトル(1行目)</h4>
                        <textarea style="width: 100%;height: 3rem; font-size: 1.1rem; margin: 1em 0;" id="textbox" class="regular-text" name="subtext1" rows="10" cols="60"><?php echo get_option('subtext1'); ?></textarea>
                    </div>
                    <div class="col50">
                        <h4 class="sub-title">サブタイトル(2行目)</h4>
                        <textarea style="width: 100%;height: 3rem; font-size: 1.1rem; margin: 1em 0;" id="textbox" class="regular-text" name="subtext2" rows="10" cols="60"><?php echo get_option('subtext2'); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="postbox ">
            <h3 class='hndle'>
                <span class="title">会社概要</span>
            </h3>
            <div class="inside">
            <div class="main-colmn">
                <div style="display: flex; width: 100%; gap:2rem;">
                    <div class="col50">
                        <h4 class="sub-title">会社名</h4>
                        <p><input style="width: 100%;height: 3rem; font-size: 1.1rem;" type="text" id="text" name="text1" value="<?php echo get_option('text1'); ?>"></p>
                    </div>

                    <div class="col50">
                        <h4 class="sub-title">代表取締役</h4>
                        <p><input style="width: 100%;height: 3rem; font-size: 1.1rem;" type="text" id="text" name="text4" value="<?php echo get_option('text4'); ?>"></p>
                    </div>
                </div>
                <div style="display: flex; width: 100%; gap:2rem;">
                    <div class="col33">
                        <h4 class="sub-title">設立</h4>
                        <p><input style="width: 100%;height: 3rem; font-size: 1.1rem;" type="text" id="text" name="text2" value="<?php echo get_option('text2'); ?>"></p>
                    </div>

                    <div class="col33">
                        <h4 class="sub-title">資本金</h4>
                        <p><input style="width: 100%;height: 3rem; font-size: 1.1rem;" type="text" id="text" name="text3" value="<?php echo get_option('text3'); ?>"></p>
                    </div>

                    <div class="col33">
                        <h4 class="sub-title">取引銀行</h4>
                        <p><input style="width: 100%;height: 3rem; font-size: 1.1rem;" type="text" id="text" name="text6" value="<?php echo get_option('text6'); ?>"></p>
                    </div>
                </div>

                <div>
                    <h4 class="sub-title">事業内容</h4>
                    <textarea style="width: 100%; font-size: 1.1rem; margin: 1em 0;" id="textbox" class="regular-text" name="text5" rows="4" cols="60"><?php echo get_option('text5'); ?></textarea>
                </div>

                <div>
                    <div>
                        <h4 class="sub-title">所在地(本社)</h4>
                        <p><input style="width: 100%;height: 3rem; font-size: 1.1rem;" type="text" id="text" name="text7" value="<?php echo get_option('text7'); ?>"></p>
                    </div>
                    <div>
                        <h4 class="sub-title">所在地(支社)</h4>
                        <p><input style="width: 100%;height: 3rem; font-size: 1.1rem;" type="text" id="text" name="text8" value="<?php echo get_option('text8'); ?>"></p>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="postbox">
            <h3 class='hndle'>
                <span class="title">代表メッセージ</span>
            </h3>
            <div class="inside">
                <div class="main-colmn">
                    <div style="display: flex; width: 100%; gap:2rem;">
                        <div class="col50">
                            <h4 class="sub-title">タイトル(1行目)</h4>
                            <textarea style="width: 100%;height: 3rem; font-size: 1.1rem; margin: 1em 0;" id="textbox" class="regular-text" name="ceotitle1" rows="10" cols="60"><?php echo get_option('ceotitle1'); ?></textarea>
                        </div>

                        <div class="col50">
                            <h4 class="sub-title">タイトル(2行目)</h4>
                            <textarea style="width: 100%;height: 3rem; font-size: 1.1rem; margin: 1em 0;" id="textbox" class="regular-text" name="ceotitle2" rows="10" cols="60"><?php echo get_option('ceotitle2'); ?></textarea>
                        </div>
                    </div>
                    <h4 style="font-size: 1.3rem; margin: 0rem 0 0 0;">本文</h4>
                    <textarea  id="textbox" class="text-area" name="ceomessage" rows="10" cols="60"><?php echo get_option('ceomessage'); ?></textarea>
                </div>
            </div>
        </div>

        <div class="postbox">
            <div style="display: flex; width: 100%; gap:2rem;">
                <div style="width: 100%; padding:1rem">
                    <h4 class="sub-title">お問い合わせ種別</h4>
                    <div id="inquiry-options-container" style="margin-top:1rem">
                        <?php
                        $inquiry_options = get_option('inquiry_options', array());
                        foreach ($inquiry_options as $index => $option) { ?>
                        <div class="inquiry-option" style="display: flex; margin-bottom: 1rem;">
                            <input style="width:40rem; height:2.5rem;" type="text" name="inquiry_options[]" value="<?php echo esc_attr($option); ?>" />
                            <button style="width:10rem; height:2.5rem; background-color: rgb(156, 26, 26); color:white;" class="inquiry-option-remove" type="button">削除</button>
                        </div>
                        <?php } ?>
                    </div>
                    <button style="width:10rem; height:2.5rem; background-color: rgb(0, 140, 255); color:white;" id="add-inquiry-option" type="button">追加</button>
                </div>
            </div>
        </div>

    </div>
        <?php submit_button(); ?>
  </form>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var addInquiryOptionButton = document.getElementById("add-inquiry-option");
    var inquiryOptionsContainer = document.getElementById("inquiry-options-container");

    addInquiryOptionButton.addEventListener("click", function() {
      var optionDiv = document.createElement("div");
      optionDiv.classList.add("inquiry-option");

      var optionInput = document.createElement("input");
      optionInput.setAttribute("type", "text");
      optionInput.setAttribute("name", "inquiry_options[]");

      var removeButton = document.createElement("button");
      removeButton.classList.add("inquiry-option-remove");
      removeButton.setAttribute("type", "button");
      removeButton.textContent = "削除";

      removeButton.addEventListener("click", function() {
        optionDiv.remove();
      });

      optionDiv.appendChild(optionInput);
      optionDiv.appendChild(removeButton);
      inquiryOptionsContainer.appendChild(optionDiv);
    });

    var removeButtons = document.getElementsByClassName("inquiry-option-remove");
    for (var i = 0; i < removeButtons.length; i++) {
      removeButtons[i].addEventListener("click", function() {
        this.parentNode.remove();
      });
    }
  });
</script>


<?php
}
//出力の構築
function register_custom_setting(){

    register_setting('custom-menu-group', 'text1');
    register_setting('custom-menu-group', 'text2');
    register_setting('custom-menu-group', 'text3');
    register_setting('custom-menu-group', 'text4');
    register_setting('custom-menu-group', 'text5');
    register_setting('custom-menu-group', 'text6');
    register_setting('custom-menu-group', 'text7');
    register_setting('custom-menu-group', 'text8');
    register_setting('custom-menu-group', 'subtext1');
    register_setting('custom-menu-group', 'subtext2');
    register_setting('custom-menu-group', 'ceotitle1');
    register_setting('custom-menu-group', 'ceotitle2');
    register_setting('custom-menu-group', 'ceomessage');
    register_setting('custom-menu-group', 'inquiry_options');
}
