<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div class="container">
    <div class="row justify-content-center  mt-3">
      <div class="col">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="search_input" placeholder="Search" aria-label="Search" aria-describedby="search_button">
          <button class="btn btn-outline-danger" type="button" id="search_button">Search</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal" id="exampleModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Search Result</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalBody">
          <!-- Content will be dynamically added here -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#search_button').click(function() {
        var searchTerm = $('#search_input').val();
        $('#exampleModal').modal('hide'); // Hide the modal before making the AJAX request
        $.ajax({
          url: 'search_output.php',
          type: 'GET',
          data: { search_input: searchTerm },
          success: function(response) {
            $('#modalBody').html(response);
            $('#exampleModal').modal('show'); // Show the modal after receiving the response
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      });
    });
  </script>

</body>
</html>
