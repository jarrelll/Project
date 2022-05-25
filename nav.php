<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<div id="banner"><img src="banner_project.gif" width="1500" height="220" alt="banner"/></div>

<link rel="stylesheet" href="./navbar.css" />
	
<center>
<ul>
    <a href="logcall.php"><li class="active">Log Call</li></a>
    <a href="update.php"><li>Update</li></a>
    <a href="#"><li>Report</li></a>
    <a href="#"><li>History</li></a>
</ul>
</center>
</div>
	


<body>
</body>
</html>

<script>
const items = document.querySelectorAll("ul li");
items.forEach((item) => {
  item.addEventListener("click", () => {
    document.querySelector("li.active").classList.remove("active");
    item.classList.add("active");
  });
});
</script>