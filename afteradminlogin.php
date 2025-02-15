<?php

$servername='localhost';
$username='root';
$password='';
$dbname='project';

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
	$query1="SELECT * FROM `complaints`";
	$result=mysqli_query($conn,$query1);
	$pend=0;
	$full=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			
				$cme=$row['pending'];
				if($cme=='1')
				{
					$pend++;
				}
			
		}
	}
	$full+=$pend;
	$query1="SELECT * FROM `completedcomp`";
	$result=mysqli_query($conn,$query1);
	$compl=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
					$full++;
					$compl++;	
			
		}
	}
	$query1="SELECT * FROM `inprogresscomp`";
	$result=mysqli_query($conn,$query1);
	$inpro=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
				
					$inpro++;	
					$full++;
			
		}
	}
}
?>
<html>
	<head>   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="main.css">
  <title>Complaint system</title>
  
  
  
  <style>
	/* General Styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    /* Input Fields */
    input {
        margin: 15px 0;
        padding: 10px;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Navbar */
    .nav-item {
        padding: 10px;
        width: 100%;
    }

    .navbar ul {
        padding: 0;
        border: 1px solid white;
        width: 100%;
    }

    /* Buttons */
    .btn1 {
        width: 200px;
        padding: 15px;
        text-align: center;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        transition: 0.3s;
    }

    .btn1:hover {
        background-color: #17a2b8;
        transform: scale(1.05);
    }

    /* File Icons */
    #file1, #file2, #file3 {
        display: inline-block;
        font-size: 100px;
        margin: 20px;
        color: #17a2b8;
        padding: 15px;
        transition: all 0.3s ease-in-out;
    }

    #file1:hover {
        border: 1px solid black;
        color: green;
    }

    #file2:hover {
        border: 1px solid black;
        color: blue;
    }

    #file3:hover {
        border: 1px solid black;
        color: black;
    }

    #file1:hover #pen,
    #file2:hover #pen2,
    #file3:hover #pen3 {
        display: block;
    }

    /* Hidden Pen Icons */
    #pen, #pen2, #pen3 {
        display: none;
        font-size: 16px;
        text-align: center;
        border-bottom: 1px solid black;
    }

    /* Special Checkbox */
    #specialchk {
        background-color: #007bff;
        color: white;
        float: right;
        border: 1px solid #007bff;
        border-radius: 5px;
        padding: 5px 10px;
        transition: 0.3s;
    }

    #specialchk:hover {
        background-color: #0056b3;
        border: 1px solid #0056b3;
        border-radius: 5px;
    }

    /* Table Styling */
    .tr {
        width: auto;
        border: 1px solid black;
        border-radius: 5px;

    }

    .thead {
        font-size: large;
        font-weight: bold;
        background-color: #28a745;
        color: white;
        text-align: center;
        padding: 10px;
    }

    /* Headings */
    h5 {
        padding: 15px;
    }

    h6 {
        padding: 10px;
        border: 1px solid black;
        background: #f8f9fa;
        text-align: center;
    }

    /* Remark Text */
    #remark {
        color: grey;
        font-size: 18px;
        font-style: italic;
    }

    /* Green Span */
    #span {
        color: green;
        font-weight: bold;
        padding: 5px;
    }

    /* Hide elements */
    .now {
        display: none;
    }

  </style>
  
  <script>
			function callsh()
			{
				if(document.getElementById("sh_menu").style.display=='block')
				{
					document.getElementById("sh_menu").style.display='none';
				}
				else {
					document.getElementById("sh_menu").style.display='block';
				}
			}
			function comp()
			{
				var p=document.getElementById("p_comp");
				var f=document.getElementById("f_comp");
				var i=document.getElementById("i_comp");
				if(document.getElementById('ccomp').style.display=='block')
				{
					p.style.display='none';
					document.getElementById('ccomp').style.display='none';
					f.style.display='none';
					i.style.display='none';
					
				}
				else
				{
					p.style.display='block';
					document.getElementById('ccomp').style.display='block';
					f.style.display='block';
					i.style.display='block';
					
				}
			}
			function manageuser(){
				var l=document.getElementById("l_user");
				if(l.style.display=='none')
				{
					l.style.display='block';
					document.getElementById('a_user').style.display='block';
				}
				else
				{
					l.style.display='none';
					document.getElementById('a_user').style.display='none';
					
				}
			}
			function dashboard()
			{
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				if(dash.style.display=='block')
				{
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
					pend.style.display='none';
				}
				else
				{
					dash.style.display='block';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
					pend.style.display='none';
				}
			}
			function pending()
			{
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				if(pend.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				else
				{
					
					pend.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				
			}
				function complcomp()
			{
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				if(comp.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					pend.style.display='none';
				}
				else
				{
					
					comp.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					pend.style.display='none';
				}
				
			}	
			function inpro()
			{
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				if(inpro.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					comp.style.display='none';
				}
				else
				{
					
					inpro.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					comp.style.display='none';
				}
				
			}
				
			function full()
			{
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				if(full.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				else
				{
					
					full.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				
			}
			function auser()
			{
				var auser=document.getElementById('alluser');
					var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				if(auser.style.display=='block')
				{
					
					dash.style.display='none';
					luser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				else
				{
					auser.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				
			}function luser()
			{
				var luser=document.getElementById('logindata');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var auser=document.getElementById('alluser');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				if(luser.style.display=='none')
				{
					dash.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					auser.style.display='none';
					comp.style.display='none';
					
					document.getElementById("logindata").style.display="block";
				}
				else
				{
					
					document.getElementById("logindata").style.display="block";
					
					dash.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				
			}
	</script>
  </head>
  <body>
  
  
		<nav class="navbar navbar-expand-sm bg-info d-flex align-items-center p-2">
            <!-- Menu Icon for Sidebar -->
            <i class="fa fa-bars text-white" onclick="callsh()" style="cursor:pointer; font-size:24px; margin:10px;"></i>

            <!-- Admin Profile Section -->
            <div class="d-flex align-items-center ml-3">
                <img src="admin.png" class="rounded-circle shadow" width="60px" height="60px" alt="Admin">
                <h3 class="ml-3 text-white font-weight-bold" style="cursor:pointer;">CS | Admin</h3>
            </div>

            <!-- Logout Button -->
            <div class="ml-auto">
                <a class="btn btn-danger px-4 py-2 font-weight-bold shadow-sm" href="adminlogin1.html">
                    Logout <i class="fa fa-sign-out"></i>
                </a>
            </div>
        </nav>

		<nav  class="navbar navbar1 bg-dark" style="float:left;margin:0px;display:block;padding:0px;box-shadow:.2px 1px 2px 1px; border-radius:5px;" id="sh_menu">
			<!-- Links -->
			<ul class="navbar-nav" style="width:100%;border-radius:5px;">



				<li class="nav-item" style="width:100%;border-bottom:2px solid white;border-radius:5px;" >
					<a class="btn btn-dark btn1" onclick="dashboard()" href="#">Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="btn btn-dark btn1" onclick="comp()" href="#">Manage Complaints</a>
				</li>
				<li class="nav-item"  id="p_comp" style="display:none;border-top:1.2px solid white;border-radius:5px;">
					<a class="btn btn-dark btn1" onclick="pending()" href="#">Pending <br />complaints<p id="specialchk"><?php echo $pend;?></p></a>
				</li>
				<li class="nav-item" id="i_comp"  style="display:none">
					<a class="btn btn-dark btn1" onclick="inpro()"  href="#">In progress<p id="specialchk"><?php echo $inpro;?></p></a>
				</li>
				<li class="nav-item" id="ccomp" style="display:none;">
					<a class="btn btn-dark btn1" onclick="complcomp()"href="#">Complete <br />Complaints<p id="specialchk"><?php echo $compl; ?></p></a>
				</li>
				<li class="nav-item" id="f_comp" style="display:none;">
					<a class="btn btn-dark btn1" onclick="full()"  href="#">Full Complaint<br /> history<p id="specialchk"><?php echo $full;?></p></a>
				</li>

				<li class="nav-item"  style="border-top:2px solid white;border-radius:5px;">
					<a class="btn btn-dark btn1" onclick="manageuser()" href="#">Manage Users</a>
				</li>
				<li class="nav-item" id="a_user" style="display:none;border-top:1.2px solid white;">
					<a class="btn btn-dark btn1" onclick="auser()"   href="#">All users data</a>
				</li>
				<li class="nav-item" id="l_user"  style="display:none">
					<a class="btn btn-dark btn1" onclick="luser()"   href="#">User Login info</a>
				</li>

			</ul>
		</nav>

		<div id="main" style="width:78%;float:left;" >
			<!----------------------------------------------------------------------------------------DASHBOARD-->
			
			<div id="dashboard" class="container-fluid p-4">
                <h4 class="mb-3 fw-bold text-white bg-primary p-2 rounded">Dashboard</h4>
                <hr />

                <div class="row text-center">
                    <!-- Pending Complaints -->
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 border-info" style="cursor:pointer;" onclick="pending()">
                            <i class="fa fa-file-text fa-3x text-info"></i>
                            <p class="mt-2 font-weight-bold">Pending Complaints</p>
                            <div id="pen" class="badge badge-warning p-2"><?php echo $pend; ?></div>
                        </div>
                    </div>

                    <!-- In Progress Complaints -->
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 border-primary" style="cursor:pointer;" onclick="inpro()">
                            <i class="fa fa-file-text fa-3x text-primary"></i>
                            <p class="mt-2 font-weight-bold">In Progress Complaints</p>
                            <div id="pen2" class="badge badge-info p-2"><?php echo $inpro; ?></div>
                        </div>
                    </div>

                    <!-- Completed Complaints -->
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 border-success" style="cursor:pointer;" onclick="complcomp()">
                            <i class="fa fa-file-text fa-3x text-success"></i>
                            <p class="mt-2 font-weight-bold">Completed Complaints</p>
                            <div id="pen3" class="badge badge-success p-2"><?php echo $compl; ?></div>
                        </div>
                    </div>
                </div>
            </div>

			<!----------------------------------------------------------------------------------------DASHBOARD-->
				
		
				<!----------------------------------------------------------------------------------------pending-->
			
			<div class="" id="pending" style="width:auto;display:none;border-radius:15px;padding:15px;margin:10px;background: linear-gradient(to bottom, #f0f0f0, #ffffff);border: 1px solid #ced4da;
                                                                                                                                                                           box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
			<div class="alert alert-warning font-weight-bold shadow-sm" role="alert">
                                ⏳ Pending Complaints
                            </div>
				<?php
					$query1="SELECT * FROM `complaints`";
					$result=mysqli_query($conn,$query1);
						$num=0;
				
						if($result)
						{
							while($row=mysqli_fetch_assoc($result))
								{
									
									$cme=$row['pending'];
									if($cme=='1')
									{
										
										$num++;
											$id=$row['id'];
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr' style='display: flex; justify-content: space-between; align-items: center;
                                                        border: 1px solid #ddd; padding: 10px; background: #f8f9fa; border-radius: 5px;'>

                                                    <span><strong>#{$num}</strong> - <span class='text-primary'>User: {$usr}</span></span>

                                                    <form method='POST' action='solvepend1.php' style='margin: 0;'>
                                                        <input type='hidden' name='user' value='{$usr}'>
                                                        <input type='hidden' name='compid' value='{$id}'>
                                                        <button type='submit' class='btn btn-info btn-sm'>Solve It</button>
                                                    </form>

                                                </h5>";

											echo "<h6 style='border: 1px solid #ddd; padding: 10px; background: #f8f9fa;
                                                        border-radius: 5px; line-height: 1.6;'>

                                                    <strong>File:</strong> ";

                                            if ($fil == "" || $fil == '0') {
                                                echo "<span id='span' class='text-danger'>No file</span><br />";
                                            } else {
                                                echo "<a href='{$fil}' target='_blank' class='text-primary font-weight-bold'>View File</a><br />";
                                            }

                                            echo "
                                                    <strong>Complaint Category:</strong> <span id='span' class='text-dark'>{$cate}</span><br />
                                                    <strong>Complaint Subcategory:</strong> <span id='span' class='text-dark'>{$subcate}</span><br />
                                                    <strong>Complaint Nature:</strong> <span id='span' class='text-dark'>{$nat}</span><br />
                                                    <strong>Complaint Date:</strong> <span id='span' class='text-dark'>{$da}</span><br />
                                                </h6>
                                                <hr style='border-top: 1px solid #ddd;'>";

										
									}
								}
						}
											
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------pending-->
			<!----------------------------------------------------------------------------------------inprogress-->
			
			<div class="" id="inprocomp" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background: linear-gradient(to bottom, #f0f0f0, #ffffff);border: 1px solid #ced4da;
                                                                                                                                                                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
            			<div class='alert alert-success font-weight-bold shadow-sm my-3' role='alert'>
                                                        🔄 In-progress Complaints
                                                      </div>
            			<?php
            				$num=0;
            				$query1="SELECT * FROM complaints";
            				$seee="SELECT * FROM inprogresscomp";
            				$reso=mysqli_query($conn,$seee);

            					if($reso)
            					{
            						while($inpro=mysqli_fetch_assoc($reso))
            						{
            							$inid=$inpro['compnum'];
            						$result=mysqli_query($conn,$query1);

            						if($result)
            							{
            							while($row=mysqli_fetch_assoc($result))
            								{
            										$id=$row['id'];
            										if($id==$inid)
            										{
            											$num++;
            											$usr=$row['user'];
            											$cate=$row['category'];
            											$subcate=$row['subcategory'];
            											$nat=$row['nature'];
            											$da=$row['date'];
            											$fil=$row['file'];
            											$co=$row['comp'];
            											 echo "<h5 class='tr' style='display: flex; justify-content: space-between; align-items: center;
                                                                     border: 1px solid #ddd; padding: 10px; background: #f8f9fa; border-radius: 5px; margin-bottom: 10px;'>

                                                                     <span><strong>#{$num}</strong> - <span class='text-primary'>User: {$usr}</span></span>

                                                                     <form method='POST' action='solveinpro1.php' style='margin: 0;'>
                                                                         <input type='hidden' name='user' value='{$usr}'>
                                                                         <input type='hidden' name='compid' value='{$id}'>
                                                                         <button type='submit' class='btn btn-success btn-sm'>Complete It</button>
                                                                     </form>

                                                                 </h5>";
            											echo "
                                                        <div class='card border-info shadow-sm mb-3'>
                                                            <div class='card-header bg-primary text-white font-weight-bold'>
                                                                Complaint Details
                                                            </div>
                                                            <div class='card-body'>

                                                                <p><strong>File Attachment:</strong> ";
                                                        if (empty($fil) || $fil == '0') {
                                                            echo "<span class='text-danger'>No file available</span>";
                                                        } else {
                                                            echo "<a href='$fil' target='_blank' class='btn btn-sm btn-outline-info'>View File</a>";
                                                        }
                                                        echo "</p>

                                                                <ul class='list-group list-group-flush'>
                                                                    <li class='list-group-item'><strong>Complaint Category:</strong> <span class='text-info'>$cate</span></li>
                                                                    <li class='list-group-item'><strong>Complaint Subcategory:</strong> <span class='text-info'>$subcate</span></li>
                                                                    <li class='list-group-item'><strong>Complaint Nature:</strong> <span class='text-warning'>$nat</span></li>
                                                                    <li class='list-group-item'><strong>Complaint Date:</strong> <span class='text-success'>$da</span></li>
                                                                    <li class='list-group-item'><strong>Complaint Description:</strong> <p class='mt-2 text-muted'>$co</p></li>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                        ";

            										}


            								}
            							}
            						}
            					}
            				?>
            			</div>

			<!----------------------------------------------------------------------------------------inprogress-->
			<!----------------------------------------------------------------------------------------completed-->
			
			<div class="" id="complcomp" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background: linear-gradient(to bottom, #f0f0f0, #ffffff);border: 1px solid #ced4da;
                                                                                                                                                                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
			<div class='alert alert-success font-weight-bold shadow-sm my-3' role='alert'>
                                            ✅ Completed Complaints
                                          </div>
				<?php
				$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `completedcomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($coomp=mysqli_fetch_assoc($reso))
						{
							$cid=$coomp['compnum'];
							$remark=$coomp['remark'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$cid)
										{
											$num++;
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "
                                            <div class='card shadow-sm mb-3'>
                                                <div class='card-header bg-info text-white font-weight-bold'>
                                                    <span class='mr-3'>Complaint #{$num}</span>
                                                    <span class='text-warning'>User: {$usr}</span>
                                                </div>
                                                <div class='card-body'>

                                                    <p><strong>Remark:</strong> <span class='badge badge-secondary p-2'>$remark</span></p>

                                                    <p><strong>File:</strong> ";
                                            if ($fil == "" || $fil == '0') {
                                                echo "<span class='text-danger'>No file available</span>";
                                            } else {
                                                echo "<a href='$fil' target='_blank' class='btn btn-sm btn-primary'>View File</a>";
                                            }
                                            echo "</p>

                                                    <ul class='list-group list-group-flush'>
                                                        <li class='list-group-item'><strong>Complaint Category:</strong> <span class='text-info'>$cate</span></li>
                                                        <li class='list-group-item'><strong>Complaint Subcategory:</strong> <span class='text-info'>$subcate</span></li>
                                                        <li class='list-group-item'><strong>Complaint Nature:</strong> <span class='text-info'>$nat</span></li>
                                                        <li class='list-group-item'><strong>Complaint Date:</strong> <span class='text-success'>$da</span></li>
                                                        <li class='list-group-item'><strong>Complaint Description:</strong> <p class='mt-2 text-muted'>$co</p></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            ";

										}
										
									
								}
							}
						}
					}
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------inprogress-->
			<!----------------------------------------------------------------------------------------full-->
			
			<div class="" id="fullhistory" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background: linear-gradient(to bottom, #f0f0f0, #ffffff);border: 1px solid #ced4da;
                                                                                                                                                                              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
			<div class="container my-4">
                <div class="alert alert-primary text-center font-weight-bold shadow-sm" role="alert">
                    📜 Full History of Complaints
                </div>

                <div class="alert alert-warning font-weight-bold shadow-sm" role="alert">
                    ⏳ Pending Complaints
                </div>
            </div>

				<?php
					$query1="SELECT * FROM `complaints`";
					$result=mysqli_query($conn,$query1);
						$num=0;
				
						if($result)
						{
							while($row=mysqli_fetch_assoc($result))
								{
									
									$cme=$row['pending'];
									if($cme=='1')
									{
										
										$num++;
											$id=$row['id'];
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "
                                            <div class='card border-info shadow-sm mb-3'>
                                                <div class='card-header bg-primary text-white font-weight-bold d-flex justify-content-between align-items-center'>
                                                    <span>Complaint #$num</span>
                                                    <form method='POST' action='solvepend1.php' class='m-0'>
                                                        <input type='hidden' name='user' value='$usr'>
                                                        <input type='hidden' name='compid' value='$id'>
                                                        <button type='submit' class='btn btn-sm btn-light font-weight-bold'>Solve It</button>
                                                    </form>
                                                </div>
                                                <div class='card-body'>

                                                    <p><strong>User:</strong> <span class='text-info'>$usr</span></p>

                                                    <p><strong>File Attachment:</strong> ";
                                            if (empty($fil) || $fil == '0') {
                                                echo "<span class='text-danger'>No file available</span>";
                                            } else {
                                                echo "<a href='$fil' target='_blank' class='btn btn-sm btn-outline-info'>View File</a>";
                                            }
                                            echo "</p>

                                                    <ul class='list-group list-group-flush'>
                                                        <li class='list-group-item'><strong>Complaint Category:</strong> <span class='text-info'>$cate</span></li>
                                                        <li class='list-group-item'><strong>Complaint Subcategory:</strong> <span class='text-info'>$subcate</span></li>
                                                        <li class='list-group-item'><strong>Complaint Nature:</strong> <span class='text-warning'>$nat</span></li>
                                                        <li class='list-group-item'><strong>Complaint Date:</strong> <span class='text-success'>$da</span></li>
                                                        <li class='list-group-item'><strong>Complaint Description:</strong> <p class='mt-2 text-muted'>$co</p></li>
                                                    </ul>

                                                </div>
                                            </div>
                                            ";

										
									}
								}
						}
						
						
						//////////////////////////////////////////////////////////////////////////////////////////////////////////////
						echo "<div class='alert alert-info font-weight-bold shadow-sm my-3' role='alert'>
                                🔄 In-progress Complaints
                              </div>";

						$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `inprogresscomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($inpro=mysqli_fetch_assoc($reso))
						{
							$inid=$inpro['compnum'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$inid)
										{
											$num++;
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "
                                            <div class='card border-secondary shadow-sm mb-3'>
                                                <div class='card-header bg-primary text-white font-weight-bold d-flex justify-content-between align-items-center'>
                                                    <span>Complaint #$num</span>
                                                    <form method='POST' action='solveinpro1.php' class='m-0'>
                                                        <input type='hidden' name='user' value='$usr'>
                                                        <input type='hidden' name='compid' value='$id'>
                                                        <button type='submit' class='btn btn-sm btn-light font-weight-bold'>Complete It</button>
                                                    </form>
                                                </div>
                                                <div class='card-body'>

                                                    <p><strong>User:</strong> <span class='text-info'>$usr</span></p>

                                                    <p><strong>File Attachment:</strong> ";
                                            if (empty($fil) || $fil == '0') {
                                                echo "<span class='text-danger'>No file available</span>";
                                            } else {
                                                echo "<a href='$fil' target='_blank' class='btn btn-sm btn-outline-secondary'>View File</a>";
                                            }
                                            echo "</p>

                                                    <ul class='list-group list-group-flush'>
                                                        <li class='list-group-item'><strong>Complaint Category:</strong> <span class='text-info'>$cate</span></li>
                                                        <li class='list-group-item'><strong>Complaint Subcategory:</strong> <span class='text-info'>$subcate</span></li>
                                                        <li class='list-group-item'><strong>Complaint Nature:</strong> <span class='text-warning'>$nat</span></li>
                                                        <li class='list-group-item'><strong>Complaint Date:</strong> <span class='text-success'>$da</span></li>
                                                        <li class='list-group-item'><strong>Complaint Description:</strong> <p class='mt-2 text-muted'>$co</p></li>
                                                    </ul>

                                                </div>
                                            </div>
                                            ";

										}
										
									
								}
							}
						}
					}
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						//////////////////////////////////////////////////////////////////////////////////////////////////////////////
						echo "<div class='alert alert-success font-weight-bold shadow-sm my-3' role='alert'>
                                ✅ Completed Complaints
                              </div>";


				$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `completedcomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($coomp=mysqli_fetch_assoc($reso))
						{
							$cid=$coomp['compnum'];
							$remark=$coomp['remark'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$cid)
										{
											$num++;
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "
                                            <div class='card border-info shadow-sm mb-3'>
                                                <div class='card-header bg-primary text-white font-weight-bold'>
                                                    Complaint #$num - <span class='text-warning'>User: $usr</span>
                                                </div>
                                                <div class='card-body'>

                                                    <p><strong>Remark:</strong> <span class='text-muted'>$remark</span></p>

                                                    <p><strong>File Attachment:</strong> ";
                                            if (empty($fil) || $fil == '0') {
                                                echo "<span class='text-danger'>No file available</span>";
                                            } else {
                                                echo "<a href='$fil' target='_blank' class='btn btn-sm btn-outline-secondary'>View File</a>";
                                            }
                                            echo "</p>

                                                    <ul class='list-group list-group-flush'>
                                                        <li class='list-group-item'><strong>Complaint Category:</strong> <span class='text-info'>$cate</span></li>
                                                        <li class='list-group-item'><strong>Complaint Subcategory:</strong> <span class='text-info'>$subcate</span></li>
                                                        <li class='list-group-item'><strong>Complaint Nature:</strong> <span class='text-warning'>$nat</span></li>
                                                        <li class='list-group-item'><strong>Complaint Date:</strong> <span class='text-success'>$da</span></li>
                                                        <li class='list-group-item'><strong>Complaint Description:</strong> <p class='mt-2 text-muted'>$co</p></li>
                                                    </ul>

                                                </div>
                                            </div>
                                            ";

										}
										
									
								}
							}
						}
					}						
					////////////////////////////////////////////////////////
			?>
			</div>
			
			<!----------------------------------------------------------------------------------------full-->
		
			<!----------------------------------------------------------------------------------------all-user-->
			
			<div class="" id="alluser" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background: linear-gradient(to bottom, #f0f0f0, #ffffff);border: 1px solid #ced4da;
                                                                                                                                                                          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
			<div class="alert alert-primary font-weight-bold shadow-sm my-3" role="alert">
                📊 All Users Data
            </div>

				<?php
					$num=0;
					$userss="SELECT * FROM `userregistration`";
					$result786=mysqli_query($conn,$userss);
					if($result786)
					{
						while($rowuser=mysqli_fetch_assoc($result786))
						{$num++;
							$fnamen=$rowuser['fname'];
							$lnamen=$rowuser['lname'];
							$usern=$rowuser['username'];
							$mailn=$rowuser['email'];
							$phonen=$rowuser['phone'];
							$gendern=$rowuser['gender'];
							$daten=$rowuser['date'];
							echo "
                            <div class='container mt-4'>
                                <div class='card shadow'>
                                    <div class='card-header bg-info text-white'> User Details </div>
                                    <div class='card-body'>
                                        <table class='table table-borderless'>
                                            <tbody>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>Number</th>
                                                    <td><span class='badge bg-secondary'>$num</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>First Name</th>
                                                    <td>$fnamen</td>
                                                </tr>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>Last Name</th>
                                                    <td>$lnamen</td>
                                                </tr>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>Username</th>
                                                    <td><span class='text-primary fw-bold'>$usern</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>Email</th>
                                                    <td><a href='mailto:$mailn'>$mailn</a></td> </tr>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>Phone Number</th>
                                                    <td><a href='tel:$phonen'>$phonen</a></td>
                                                </tr>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>Gender</th>
                                                    <td>$gendern</td>
                                                </tr>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>Date</th>
                                                    <td>$daten</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr class='mt-4' />
                            </div>
                            ";

						}
					}
				
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------all-user-->
					<!----------------------------------------------------------------------------------------Login-->	
		<div class="" id="logindata" style="width:97%;float:left;display:none;border-radius:15px;padding:15px;margin:10px;background: linear-gradient(to bottom, #f0f0f0, #ffffff);border: 1px solid #ced4da;
                                                                                                                                                                                   box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
			<div class="alert alert-primary font-weight-bold shadow-sm my-3" role="alert">
                            📊 Login Data
                        </div>
				<?php
					$num=0;
					$users="SELECT * FROM `userloginfo`";
					$result78=mysqli_query($conn,$users);
					if($result78)
					{
						while($rowuser=mysqli_fetch_assoc($result78))
						{$num++;
							$fnamen=$rowuser['fname'];
							$lnamen=$rowuser['lname'];
							$usern=$rowuser['user'];
							$daten=$rowuser['date'];
							echo "
                            <div class='container mt-4'>
                                <div class='card shadow'>  <div class='card-header bg-primary text-white'> User Details
                                    </div>
                                    <div class='card-body'>
                                        <table class='table table-borderless'> <tbody>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>Number</th> <td><span class='badge bg-secondary'>$num</span></td> </tr>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>First Name</th>
                                                    <td>$fnamen</td>
                                                </tr>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>Last Name</th>
                                                    <td>$lnamen</td>
                                                </tr>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>Username</th>
                                                    <td><span class='text-primary fw-bold'>$usern</span></td> </tr>
                                                <tr>
                                                    <th scope='row' class='text-nowrap'>Date</th>
                                                    <td>$daten</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr class='mt-4' /> </div>
                            ";

						}
					}
					
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------Login-->
			
			</div>

		
	</body>
</html>