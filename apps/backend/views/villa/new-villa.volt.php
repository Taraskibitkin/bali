<form action="admin/createVilla" method="post" enctype="multipart/form-data">

    <table width="100%">
        <tr>
            <td align="left"><?php echo $this->tag->linkTo(array("/admin/villa/showVillas", "Go Back")) ?></td>
        </tr>
    </table>

    <div align="center">
        <h2>New Villa</h2>
    </div>

    <table class="create-table">


        <tr>
            <td align="right">
                <label for="room_price">Title</label>
            </td>
            <td align="left">
                <input type="text" name="room_name" value="">
            </td>
        </tr>

        <tr>
            <td align="right">
                <label for="room_price">Shrort Title</label>
            </td>
            <td align="left">
                <input type="text" name="room_short_title">
            </td>
        </tr>

        <tr>
            <td align="right">
                <label for="room_price">Description</label>
            </td>
            <td align="left">
                <textarea name="room_desc"></textarea>
            </td>
        </tr>


        <tr>
            <td align="right">
                <label for="room_price">Room Price </label>
            </td>
            <td align="left">
                <input type="text" name="room_price" value="">
            </td>
        </tr>


        <tr>
            <td align="right">
                <label for="main_img">Main Img</label>
            </td>
            <td align="left">
                <input type="file" name="main_img">
            </td>
        </tr>
        <tr>
            <td align="right">
                <label for="room_gallery">Room Gallery</label>
            </td>
            <td align="left">
                <?php echo $this->tag->textArea(array("room_gallery", "cols" => 30, "rows" => 4)) ?>
            </td>
        </tr>


        <tr>
            <td align="right">
                <label for="room_google_map">Room Google Map</label>
            </td>
            <td align="left">
                <?php echo $this->tag->textField(array("room_google_map", "size" => 30)) ?>
            </td>
        </tr>

        <tr>
            <td align="right">
                <label for="hoster_id">Hoster</label>
            </td>
            <td align="left">
                <?php echo $this->tag->textField(array("hoster_id", "type" => "number")) ?>
            </td>
        </tr>

        <tr>
            <td align="right">
                <label for="google_map_title">Google Map Title</label>
            </td>
            <td align="left">
                <?php echo $this->tag->textField(array("google_map_title", "size" => 30)) ?>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><?php echo $this->tag->submitButton("Save") ?></td>
        </tr>
    </table>

</form>
