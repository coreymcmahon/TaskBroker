<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_register') ?>" method="post">
  <table>
    <?php echo $form ?>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" name="register" value="<?php echo __('Register', null, 'sf_guard') ?>" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>

<script>
    $("#sf_guard_user_phone").parent().parent().css("display","none");

    $("#sf_guard_user_status").bind("change",function() {
        if ($("#sf_guard_user_status option:selected").attr("value") > 0)
            $("#sf_guard_user_phone").parent().parent().css("display","table-row");
        else
            $("#sf_guard_user_phone").parent().parent().css("display","none");
    });
    $("#sf_guard_user_phone").tipsy({ gravity: "w", fallback: "We may need this to verify you're a real person"});
</script>