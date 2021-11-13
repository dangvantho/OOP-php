<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
<form id="form-create-table">
    <div class="create-form">
        <input type="text" placeholder="Tên bảng">
        <div class="" id="add_table_field">
            <div class="icon">
                <i class="fas fa-plus"></i>
            </div>
            <span onclick="createField()">Thêm trường mới</span>
        </div>
    </div>
    <ul class="fields"></ul>
    <input type="submit" value="Gửi thông tin">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function createField() {
        const contentHtml = `
           <li>
              <input type="text" placeholder="Tên field" class="name-field">
              <input type="text" placeholder="Ràng buộc" class="contraint-field">
           </li>
        `
        const ul = $('#form-create-table .fields').append(contentHtml)
    }
    $('#form-create-table').submit((e) => {
        e.preventDefault();
        const fields = []
        const table_name = $('#form-create-table .create-form input').val()
        $('#form-create-table .fields').find('li').each((index, el)=>{
            const nameField = $(el).find('.name-field').val();
            const contraintField = $(el).find('.contraint-field').val();
            fields.push(`${nameField} ${contraintField}`)
        })
        $.ajax('', {
            type: 'POST',
            url: '/OOP/Db_demo/ajax.php',
            data: {
                type: 'create_table',
                data: {
                    table_name,
                    fields,
                },
            },
            success: (res) => {
                alert(res);
            },
            error: function(xhr, status, error) {
                var err = xhr.responseText
                alert(err);
            }
        })
        e.target.reset()
    })
</script>