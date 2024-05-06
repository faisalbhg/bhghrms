<select class="form-select" name="userId[<?=$editId-1;?>]">
        <option value="">-Select-</option>
        <?php foreach($usersList as $userKey => $user)
        {
        ?>
                <option value="<?=$user['userId'];?>"><?=$user['fullName'];?></option>
        <?php
        }
        ?>
</select>