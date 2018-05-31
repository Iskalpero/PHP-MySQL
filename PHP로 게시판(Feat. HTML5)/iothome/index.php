<?php
 session_start(); 
 //echo $_SESSION['userid'];
?>
<table xborder="1" width="90%" align="center">
	<tr><td><img src="images/ban_index.png"></td></tr> 
	<tr><td>
	         <table xborder="1" width="100%" align="center">
						<tr>
						  <td>
							  <a href="./index.php" target="_top">
								   <img src="images/btn_home.png">
								</a>
							</td>
<?php
if($_SESSION['userid']){
?>
              <td>
								<a href="./logout.php" target="main">
								<img src="images/btn_logout.png">
								</a>
							</td>
<?php	
}else {
?>	
							<td>
							  <a href="./login_form.html" target="main">
								<img src="images/btn_login.png">
								</a>
						  </td>
<?php } ?>
		
<?php
if($_SESSION['userid']){
?>
              <td>
								<a href="./member_mform.html" target="main">
								<img src="images/btn_modmem.png">
								</a>
							</td>
<?php
}else {
?>					 
						 <td>
							    <a href="./member_form.html" target="main">
										<img src="images/btn_addmem.png">
									</a>
							</td>
<?php } ?>							
						  <td>
								 <a href="./guestbook/guestbook.php" target="main">
									  <img src="images/btn_vbook.png">
								 </a>
							</td>
						  <td>
									<a href="./freeboard/list.php" target="main">
										 <img src="images/btn_board.png">
									</a>
							</td>
						  <td><img src="images/btn_notice.png"></td>
						  <td><img src="images/btn_qna.png"></td>
						  <td><img src="images/btn_dboard.png"></td>
						  <td><img src="images/btn_qboard.png"></td>							
						</tr>
					 </table>
	    </td>
	</tr>
	<tr>
			<td>
			    <iframe src="./init.php" name="main" width="100%" height="500px">
		      </iframe>
			</td>
	</tr>
</table>