<?php 
include('includes/header.php');
include('includes/navigation.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sender</title>

    <!-- Bootstrap -->
    <div class="form">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="ckeditor/ckeditor.js"></script>
      <script src="ckeditor/adapters/jquery.js"></script>
      <script src="editor.js"></script>
    <style type="text/css">
        .form{
    width:100% ;
    height: 250vh;
    background-image:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(bg-2.jpg) ;
    background-size:cover;
    background-position:center;
}
.row{
    opacity: 0.7;
}
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 mx-auto bg-white border p-5">
                <h2 class="text-center fw-bold text-dark mb-3">Email Sender</h2>
        <div class='alert alert-success' hidden="0">Email sent successfully.</div>
                <form action="mail.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="sender_name" class="form-label">Sender Name</label>
                            <input type="text" class="form-control" id="sender_name" name="sender_name" placeholder="John Doe" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="sender" class="form-label">Sender Email</label>
                            <input type="email" class="form-control" id="sender" name="sender" placeholder="name@example.com" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="How are you?" required>
                        </div>
                        <div class="col-6">
                            <label for="attachments" class="form-label">Attachments (Multiple)</label>
                            <input name="file[]" multiple="multiple" class="form-control" type="file" id="file">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="To" class="form-label">To Emails</label>
                        <textarea class="form-control" id="to" name="to" placeholder="example1@domain.com,"
                         rows="2" ></textarea>
                    <div class="mb-3">
                        <label for="cc" class="form-label">CC Emails</label>
                        <textarea class="form-control" id="cc" name="cc" placeholder="example1@domain.com,"
 rows="2" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="bcc" class="form-label">BCC Emails</label>
                        <textarea class="form-control" id="bcc" name="bcc" placeholder="example1@domain.com,"
 rows="2" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea class="ckeditor" id="body" name="body" placeholder="Hi, How are you?" rows="5" required></textarea>
                    </div>
                    <div>
                    </div>
                    <div>
                        
                        <button class="btn btn-primary me-2" name="send" type="submit">Send Email</button>
                        <button class="btn btn-danger" type="reset">Reset Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>

<?php 
include('includes/footer.php');
?>