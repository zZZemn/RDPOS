<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Form Select</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Baguhin ang style ng select para magkaruon ng fixed height */
    select.form-control {
      height: auto; /* I-reset ang height */
      min-height: 150px; /* Itakda ang minimum height, pwedeng ayusin base sa pangangailangan */
      white-space: pre-wrap; /* Para magkaron ng newline tulad ng paragraph */
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form>
        <div class="form-group">
        
          <select class="form-control">
            <option>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit aut velit numquam eos. Officiis quas deserunt commodi non quos animi aliquam quaerat ducimus quisquam eum, rem laudantium id. Temporibus, excepturi?</option>
            <option>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero quia architecto quis nam iusto quisquam commodi possimus! Provident ipsa blanditiis, illum doloribus reiciendis accusantium explicabo laudantium vitae. Debitis, consectetur quas?</option>
            <option>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione adipisci molestias explicabo, eaque quaerat amet, aliquam quisquam animi harum tempora, corrupti impedit? Ut deleniti atque earum autem laborum, nesciunt fugiat.</option>
          </select>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Include Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
