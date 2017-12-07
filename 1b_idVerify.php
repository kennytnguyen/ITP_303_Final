<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Upload Driver ID</title>
  <link rel="stylesheet" href="css/setup.css">
</head>

<body>

  <header>
    <div class="text-vcenter">
      Upload Driver's License
    </div>
  </header>

  <div class="login-page">
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <div class="file-upload">
      <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

      <div class="image-upload-wrap">
        <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
        <div class="drag-text">
          <h3>Drag and drop a file or select add Image</h3>
        </div>
      </div>

      <div class="file-upload-content">
        <img class="file-upload-image" src="#" alt="your image" />
        <div class="image-title-wrap">
          <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
        </div>
      </div>
      <br>
      <button class="file-upload-btn" type="button" onclick="document.location.href='1b_success.php'">Submit</button>
    </div>
  </div>
  
  <script  src="js/image.js"></script>

</body>
</html>
