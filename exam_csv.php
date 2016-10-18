 <?php if($upload_data != ''):?>
    <?php var_dump($upload_data);?>

    </code>
   
    <?php endif;?>

    <?php echo form_open_multipart('exam/result_upload');?>

    <input type="file" name="userfile" size="20" />

    <br /><br />

    <input type="submit" value="upload" />

    </form>