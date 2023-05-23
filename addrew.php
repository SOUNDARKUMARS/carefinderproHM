

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_review</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">

</head>
<body>
<div id="rewContainer" class="rewContainer">
  <div class="addRew">


  <div class="Rewcard">
  <span class="Rewtitle">Leave a Comment</span>
  <form class="Rewform" method="post">
    <div class="Rewgroup">
    <input name="commentor" placeholder="‎" type="text" required="">
    <label for="name">Name</label>
    </div>
  <div class="Rewgroup">
    <input placeholder="‎" type="text" name="rating" required="">
    <label for="rating">Rate for 5</label>
    </div>
  <div class="Rewgroup">
    <textarea placeholder="‎" id="comment" name="comment" rows="5" required=""></textarea>
    <label for="comment">Comment</label>
  </div>
    <button name="submit"type="submit"required="" >Submit</button>
  </form>
</div>


  </div>
</div>
</body>
</html>