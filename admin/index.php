<?php
session_start();
?>

<?php
include_once("dbh.inc.php");

$sql = array(
	"SELECT * FROM employee",
	"SELECT * FROM inventory",
	"SELECT COUNT(eid) FROM employee",
	"SELECT * FROM user WHERE type = 'user'",
	"SELECT * FROM user WHERE type = 'admin'",
	"SELECT * FROM products",
);

for ($i = 0; $i < 6; $i++) {
	if ($i == 0) {
		$result = mysqli_query($conn, $sql[$i]);
	}
	if ($i == 1) {
		$result2 = mysqli_query($conn, $sql[$i]);
	}
	if ($i == 2) {
		$result3 = mysqli_query($conn, $sql[$i]);
	}
	if ($i == 3) {
		$result4 = mysqli_query($conn, $sql[$i]);
	}
	if ($i == 4) {
		$result5 = mysqli_query($conn, $sql[$i]);
	}
	if ($i == 5) {
		$result6 = mysqli_query($conn, $sql[$i]);
	}
}

$rowcount = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Responsive Admin Dashboard</title>
	<!-- ======= Styles ====== -->
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<!-- =============== Navigation ================ -->
	<div class="container">
		<div class="navigation">
			<ul>
				<li>
					<a href="#">
						<span class="icon">
							<!-- logo -->
						</span>
						<span class="tit"></span>
					</a>
				</li>

				<li>
					<a href="#">
						<span class="icon">
							<ion-icon name="home-outline"></ion-icon>
						</span>
						<span class="title">Dashboard</span>
					</a>
				</li>

				<li>
					<a href="#recentProducts">
						<span class="icon">
							<ion-icon name="albums-outline"></ion-icon>

						</span>
						<span class="title">Recent Products</span>
					</a>
				</li>

				<li>
					<a href="#recentRes">
						<span class="icon">
							<ion-icon name="albums-outline"></ion-icon>

						</span>
						<span class="title">Recent Recipes</span>
					</a>
				</li>

				<li>
					<a href="#don">
						<span class="icon">
							<ion-icon name="card-outline"></ion-icon>
						</span>
						<span class="title">Donations</span>
					</a>
				</li>

				<li>
					<a href="#recentUsr">
						<span class="icon">
							<ion-icon name="people-outline"></ion-icon>
						</span>
						<span class="title">Recent Users</span>
					</a>
				</li>

				<li>
					<a href="#mngAdmin">
						<span class="icon">
							<ion-icon name="person-circle-outline"></ion-icon>
						</span>
						<span class="title">Manage Admin</span>
					</a>
				</li>

				<li>
					<a href="settings.php?updateaid=<?= $mysqli['A_ID'] ?>">
						<span class="icon">
							<ion-icon name="settings-outline"></ion-icon>
						</span>
						<span class="title">Settings</span>
					</a>
				</li>

				<li>
					<a href="#">
						<span class="icon">
							<ion-icon name="log-out-outline"></ion-icon>
						</span>
						<span class="title">Sign Out</span>
					</a>
				</li>
			</ul>
		</div>

		<!-- ========================= Main ==================== -->
		<div class="main">
			<div class="topbar">
				<div class="toggle">
					<ion-icon name="menu-outline"></ion-icon>
				</div>

				<div class="se">


				</div>

				<div class="user">

				</div>
			</div>

			<!-- ======================= Cards ================== -->
			<div class="cardBox">
				<div class="card">
					<div>
						<div class="numbers"><?php echo $rowcount; ?></div>
						<div class="cardName">Total Employees</div>
					</div>

					<div class="iconBx">
						<ion-icon name="eye-outline"></ion-icon>
					</div>
				</div>

				<div class="card">
					<div>

						<div class="numbers"></div>
						<div class="cardName">Registred Users</div>
					</div>

					<div class="iconBx">
						<ion-icon name="people-outline"></ion-icon>
					</div>
				</div>

				<div class="card">
					<div>

						<div class="numbers"><?php echo $rowcount; ?></div>
						<div class="cardName">Products</div>
					</div>

					<div class="iconBx">
						<ion-icon name="albums-outline"></ion-icon>
					</div>
				</div>

				<div class="card">
					<div>
						<div class="numbers"><?php echo $rowcount; ?></div>
						<div class="cardName">Donations</div>
					</div>

					<div class="iconBx">
						<ion-icon name="cash-outline"></ion-icon>
					</div>
				</div>
			</div>

			<!-- ================ Product Management ================= -->
			<div class="details">
				<div id="recentProducts">
					<div class="recentOrders">
						<div class="cardHeader">
							<h2>Product Management</h2>
							<a href="./../products/add.php" class="btn">Add New Products</a>
						</div>

						<table>
							<thead>
								<tr>
									<td>Product ID</td>
									<td>Product Name</td>
									<td>Category</td>
									<td>Quantity</td>
									<td>Price</td>
									<td>View</td>
								</tr>
							</thead>
							<tbody>
								<?php
								if (mysqli_num_rows($result6) > 0) {
									while ($row = mysqli_fetch_assoc($result6)) {
										echo      '<tr>';
										echo      '<td>' . $row['product_code'] . '</td>';
										echo      '<td>' . $row['product_name'] . '</td>';
										echo      '<td>' . $row['category'] . '</td>';
										echo      '<td>' . $row['quantity'] . '</td>';
										echo      '<td>' . $row['price'] . '</td>';
										echo '<td><a href="./../products/viewone.php?id=' . $row['id'] . '"><span class="status delivered">View</span></a></td>';

										echo      '</tr>';
									}
								};
								?>
							</tbody>
						</table>
					</div>
				</div>

				<!-- ================ Employee Management ================= -->
				<div class="details">
					<div id="recentRes">
						<div class="recentOrders">
							<div class="cardHeader">
								<h2>Employees Management</h2>
								<a href="addadmin.php" class="btn">Add New Employee</a>
							</div>

							<table>
								<thead>
									<tr>
										<td>Employee ID</td>
										<td>Employee Name</td>
										<td>Start Date</td>
										<td>Phone</td>
										<td>Department</td>
										<td>Status</td>
									</tr>
								</thead>
								<tbody>
									<?php
									if (mysqli_num_rows($result) > 0) {
										while ($row = mysqli_fetch_assoc($result)) {
											echo      '<tr>';
											echo      '<td>' . $row['eid'] . '</td>';
											echo      '<td>' . $row['name'] . '</td>';
											echo      '<td>' . $row['date'] . '</td>';
											echo      '<td>' . $row['phone'] . '</td>';
											echo      '<td>' . $row['department'] . '</td>';
											echo      '<td>' . '<span class="status delivered">' . 'Active' . '</span>' . '</td>';
											echo      '</tr>';
										}
									};
									?>
								</tbody>
							</table>
						</div>
					</div>

					<!-- ================ Inventory Levels ================= -->
					<div class="details">
						<div id="recentRes">
							<div class="recentOrders">
								<div class="cardHeader">
									<h2>Inventory Levels</h2>
									<a href="addinventory.php" class="btn">Add New Inventory</a>
								</div>

								<table>
									<thead>
										<tr>
											<td>Item ID</td>
											<td>Item Name</td>
											<td>Category</td>
											<td>Manufacture</td>
											<td>Location</td>
											<td>Manufa. Date</td>
											<td>Max. Qty</td>
											<td>Curr. Qty</td>
										</tr>
									</thead>
									<tbody>
										<?php
										if (mysqli_num_rows($result2) > 0) {
											while ($row = mysqli_fetch_assoc($result2)) {
												echo      '<tr>';
												echo      '<td>' . $row['pid'] . '</td>';
												echo      '<td>' . $row['name'] . '</td>';
												echo      '<td>' . $row['category'] . '</td>';
												echo      '<td>' . $row['manufactur'] . '</td>';
												echo      '<td>' . $row['location'] . '</td>';
												echo      '<td>' . $row['dop'] . '</td>';
												echo      '<td>' . $row['max'] . '</td>';
												echo      '<td>' . $row['qty'] . '</td>';
												echo      '<td>' . '<a href="updateinventory.php?id=' . $row['pid'] . '" class="btn">' . 'Update' . '</a>' . '</td>';
												echo      '</tr>';
											}
										};
										?>
									</tbody>
								</table>
							</div>
						</div>


						<!--recent users-->

						<div id="recentUsr">
							<div class="recentOrders">
								<div class="cardHeader">
									<h2>Recent Users</h2>
								</div>

								<table>
									<thead>
										<tr>
											<td>User ID</td>
											<td>User Name</td>
											<td>Email</td>
										</tr>
									</thead>

									<tbody>
										<?php
										if (mysqli_num_rows($result4) > 0) {
											while ($row = mysqli_fetch_assoc($result4)) {
												echo      '<tr>';
												echo      '<td>' . $row['uid'] . '</td>';
												echo      '<td>' . $row['name'] . '</td>';
												echo      '<td>' . $row['email'] . '</td>';
												echo      '</tr>';
											}
										};
										?>
									</tbody>
								</table>
							</div>
						</div>


						<!--Employees-->

						<div id="mngAdmin">
							<div class="recentOrders">
								<div class="cardHeader">
									<h2>Admins</h2>
									<a href="addadmin.php" class="btn">Add New Admin</a>
								</div>

								<table>
									<thead>
										<tr>
											<td>User ID</td>
											<td>User Name</td>
											<td>Date</td>
											<td>Phone</td>
											<td>Department</td>
										</tr>
									</thead>
									<tbody>
										<?php
										if (mysqli_num_rows($result5) > 0) {
											while ($row = mysqli_fetch_assoc($result5)) {
												echo      '<tr>';
												echo      '<td>' . $row['uid'] . '</td>';
												echo      '<td>' . $row['name'] . '</td>';
												echo      '<td>' . $row['email'] . '</td>';
												echo      '</tr>';
											}
										};
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- =========== Scripts =========  -->
				<script src="main.js"></script>

				<!-- ====== ionicons ======= -->
				<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
				<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>