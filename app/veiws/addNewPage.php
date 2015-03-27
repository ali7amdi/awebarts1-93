<!--
 `pages` :: `id`, `page_name`, `page_content`, `page_status`, `page_visits`, `sectionId`, `page_image`, `page_date`, `createdBy`
-->
<form class="mainSettingsForm add newPage" action="" method="post" enctype="multipart/form-data">
    <h1>Add new Page:</h1>

    <label>New Page Name</label>
    <input type="text" name="page_name" placeholder="plese write the page name here">
    
    <label>The Content</label>
    <textarea name="page_content" placeholder="plese write the page content here"></textarea>
    
    <p>
    <label>Page Status</label>
    <select name="page_status">
        <option value="active">Active</option>
        <option value="disActive">Disactive</option>
    </select>
    </p>
    
    <p>
    <label>Page Section</label>
    <select name="sectionId">
        <option value="active">Choose a Section Name: </option>
        <?php
        for ($i = 0; $i < count($PageDataDisplay); $i++)
        {
            //$SecDataDisplay[$i]['sectionName'];
            echo "<option value='{$PageDataDisplay[$i]['id']}'>{$PageDataDisplay[$i]['sectionName']}</option>";
        }
        ?>
    </select>
    </p>
    
    <p>
    <label>Page Image</label>
    <input type="file" name="page_image[]" multiple="" />    
    </p>
    <input type="hidden" name="page_date" value="<?php echo date('d-m-y');?>" >
    
    <input type="submit" name="submit" value="Add">           
     
</form>