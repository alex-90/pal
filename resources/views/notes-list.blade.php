<main class="notes-list">

<h1 class="h3 mb-3 fw-normal">Notes List</h1>

<table class="table table-striped table-hover table-bordered table-condenced" id="notes-list">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
</main>

<style>
body{
  background-color: #ccc;
}
.notes-list {
  width: 100%;
  /* max-width: 330px; */
  padding: 15px;
  margin: auto;
}
</style>

<script>
  function escapeHtml(text) {
    var map = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#039;'
    };
    
    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
  }

  const reloadPage = function () {
    $.ajax({
      url: '{{route('note.index')}}',
      dataType: 'json',
      success: function (data) {
        // console.log(obj)

        console.log('reload');

        let arr=[];
        for (let i=0; i<data.length; i++) {
          const obj  = data[i];
          const { id, title, content } = obj;

          const buttons = '<button type="button" class="btn btn-sm btn-primary me-1 edit">Edit</button>' + 
          '<button type="button" class="btn btn-sm btn-danger delete">Delete</button>';

          arr.push('<tr data-id="' + id + '"><td>' + id + '</td><td>' + escapeHtml(title) + '</td><td>' + escapeHtml(content) + '</td><td>' + buttons + '</td></tr>');
        }

        const str = arr.join('');
        $('#notes-list tbody').html(str);

      },
      error: function () {
        alert('Error');
      }
    })
  }

  let isEdit = 0;

  $(document).ready(function(){
    
    reloadPage();

    $('#submit').on('click', function(e){

      e.preventDefault();

      const title = $('#title').val();
      const content = $('#content').val();
      const data = { title, content, _token: '{{ csrf_token() }}' };

      if (isEdit) {

        const id = isEdit;
        
        $.ajax({
          url: 'note/' + id,
          type: 'PATCH',
          // dataType: 'json',
          data: data,
          success: function (data) {
            $('#title').val('');
            $('#content').val('');

            isEdit = 0;

            reloadPage();
          },
          error: function (request, status, error) {
              const obj = JSON.parse(request.responseText);
              alert(obj.message)
          }
        })
      } else {
        $.ajax({
          url: '{{route('note.index')}}',
          type: 'POST',
          dataType: 'json',
          data: data,
          success: function (data) {
            $('#title').val('');
            $('#content').val('');

            reloadPage();
          },
          error: function (request, status, error) {
              const obj = JSON.parse(request.responseText);
              alert(obj.message)
          }
        })
      }

    })


    $(document).on('click', '.edit', function(e){
      const id = $(this).closest('tr').data('id');

      const title = $(this).closest('tr').find('td').eq(1).text();
      const content = $(this).closest('tr').find('td').eq(2).text();

      $('#title').val(title);
      $('#content').val(content);

      isEdit = id;
    })

    $(document).on('click', '.delete', function(e){
      if (confirm('Are you sure?')) {
        const id = $(this).closest('tr').data('id');
        const data = { _token: '{{ csrf_token() }}' };

        $.ajax({
          url: 'note/' + id,
          type: 'DELETE',
          data: data,
          success: function (data) {
            reloadPage();
          },
          error: function (request, status, error) {
              const obj = JSON.parse(request.responseText);
              alert(obj.message !== '' ? obj.message : 'Error')
          }
        })
      }
    })

  })
</script>